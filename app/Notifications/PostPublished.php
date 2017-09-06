<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use NotificationChannels\Twitter\TwitterChannel;
use NotificationChannels\Twitter\TwitterStatusUpdate;

use NotificationChannels\FacebookPoster\FacebookPosterChannel;
use NotificationChannels\FacebookPoster\FacebookPosterPost;


class PostPublished extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
//        return ['mail'];
        return [TwitterChannel::class /*,FacebookPosterChannel::class*/];
    }

    public function toTwitter($post) {
//        return new TwitterStatusUpdate($post->title .' https://laravel-news.com/'. $post->uri, [$post->featured_image]);
        if($post->image_path) {
            return (new TwitterStatusUpdate($post->title . " www.panaiteandrei.ml/post/" . $post->id , $post->body))
                ->withImage(public_path('storage/post_images/' . $post->image_path));
        } else {
            return (new TwitterStatusUpdate($post->title . " www.panaiteandrei.ml/post/" . $post->id, $post->body));
        }
    }

    public function toFacebookPoster($notifiable) {
        return new FacebookPosterPost('Laravel notifications are awesome!');
    }


    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
