<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailInboxAssociation extends Model
{
    protected $fillable = ['host', 'mail_inboxes_id', 'inbox_association'];
}
