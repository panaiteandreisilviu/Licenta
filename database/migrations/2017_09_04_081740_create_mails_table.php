<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mails', function (Blueprint $table) {
            $table->increments('id');
            $table->text('from_email');
            $table->text('from_name')->nullable();
            $table->text('to_email');
            $table->text('subject');
            $table->text('body');
            $table->text('unseen')->default('0');
            $table->dateTime('sent_on');
            $table->integer('mail_remote_id')->nullable();
            $table->integer('mail_inboxes_id');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mails');
    }
}
