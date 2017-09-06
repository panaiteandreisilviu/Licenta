<?php

use Illuminate\Database\Seeder;

class MailInboxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $mailInboxYahoo = new \App\MailInbox();
        $mailInboxYahoo->user_id = 1;
        $mailInboxYahoo->host = "imap.mail.yahoo.com:993/imap/ssl";
        $mailInboxYahoo->host_username = "panaite.test@yahoo.com";
        $mailInboxYahoo->host_password = "#Microsoft1";
        $mailInboxYahoo->type = "IMAP";
        $mailInboxYahoo->label_name = "Yahoo! Mail";
        $mailInboxYahoo->label_color = "#a00085";
        $mailInboxYahoo->active = 1;
        $mailInboxYahoo->save();

        $mailInboxGmail = new \App\MailInbox();
        $mailInboxGmail->user_id = 1;
        $mailInboxGmail->host = "imap.gmail.com:993/imap/ssl";
        $mailInboxGmail->host_username = "panaite.test@gmail.com";
        $mailInboxGmail->host_password = "#Microsoft1";
        $mailInboxGmail->type = "IMAP";
        $mailInboxGmail->label_name = "Gmail";
        $mailInboxGmail->label_color = "#c30024";
        $mailInboxGmail->active = 1;
        $mailInboxGmail->save();

    }
}
