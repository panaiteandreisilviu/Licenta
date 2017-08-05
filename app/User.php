<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use SammyK\LaravelFacebookSdk\SyncableGraphNodeTrait;

use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable; // Twitter, facebook notifications
    use SyncableGraphNodeTrait; // Facebook login
    use EntrustUserTrait; // Zizaco permissions
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'active', 'password', 'facebook_user_id', 'picture_url'
    ];

    protected static $graph_node_fillable_fields = ['id', 'name', 'email', 'start_time'];

    protected static $graph_node_field_aliases = [
        'id' => 'facebook_user_id',
        'name' => 'name',
        'email' => 'email',
//        'graph_node_field_name' => 'database_column_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile(){
        return $this->hasOne(UserProfile::class);
    }


}
