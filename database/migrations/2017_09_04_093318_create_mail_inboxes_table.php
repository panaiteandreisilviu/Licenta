<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailInboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_inboxes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('host');
            $table->string('host_username');
            $table->string('host_password');
            $table->string('type')->default('IMAP');
            $table->string('label_name');
            $table->string('label_color');
            $table->smallInteger('active')->default(1);
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
        Schema::dropIfExists('mail_inboxes');
    }
}
