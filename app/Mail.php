<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    protected $fillable = ['from_email', 'from_name',  'to_email', 'subject', 'body', 'unseen', 'sent_on', 'mail_id', 'mail_remote_id', 'mail_inboxes_id', 'user_id'];

    public static function syncAllEmails()
    {
        Mail::truncate();
        $mailInboxes = MailInbox::where('active', 1)->get();
        foreach ($mailInboxes as $mailInbox) {
            self::syncInbox($mailInbox);
        }
    }

    /*-----------------------------------------------------------------*/

    public static function syncInbox(MailInbox $mailInbox)
    {
        $hostname = "{" . "{$mailInbox->host}" . "}" . "INBOX";
        $username = $mailInbox->host_username;
        $password = $mailInbox->host_password;

        $inbox = imap_open($hostname, $username, $password) or die('Cannot connect: ' . imap_last_error());

        $emails = imap_search($inbox, 'ALL');

        if ($emails) {
            rsort($emails);

            echo "\n" . print_r("Syncronizing" . ' - ' . $mailInbox->label_name,1) . "\n";
            foreach ($emails as $email_number) {
                $header = imap_headerinfo($inbox, $email_number);

                //echo "\n" . print_r($header,1) . "\n";
                $from = $header->from[0]->mailbox . "@" . $header->from[0]->host;
                $from_name = isset($header->from[0]->personal) ? $header->from[0]->personal : null;
                $to_email = $header->toaddress;
                $subject = $header->subject;
                $body = quoted_printable_decode(imap_fetchbody($inbox, $email_number, 1));
                $unseen = $header->Unseen == "U" ? 1 : 0;

                //echo "\n" . print_r($header,1) . "\n";

                echo 'MAIL - ' . imap_utf8($subject) . "\n";

                Mail::create([
                    'from_email' => imap_utf8($from),
                    'from_name' => imap_utf8($from_name),
                    'to_email' => imap_utf8($to_email),
                    'subject' => imap_utf8(quoted_printable_decode($subject)),
                    'body' => imap_utf8($body),
                    'unseen' => $unseen,
                    'sent_on' => Carbon::parse($header->date),
                    'mail_remote_id' => $email_number,
                    'mail_inboxes_id' => $mailInbox->id,
                    'user_id' => $mailInbox->user_id,
                ]);
            }
        }
    }

    /*-----------------------------------------------------------------*/

    public function mailInbox(){
        return MailInbox::find($this->mail_inboxes_id);
    }
    /*-----------------------------------------------------------------*/
}
