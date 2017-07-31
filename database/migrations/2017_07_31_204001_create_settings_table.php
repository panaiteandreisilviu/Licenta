<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->text('TWITTER_CONSUMER_KEY');
            $table->text('TWITTER_CONSUMER_SECRET');
            $table->text('TWITTER_ACCESS_TOKEN');
            $table->text('TWITTER_ACCESS_SECRET');
            $table->text('FACEBOOK_APP_ID');
            $table->text('FACEBOOK_APP_SECRET');
            $table->text('FACEBOOK_ACCESS_TOKEN');
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
        Schema::dropIfExists('settings');
    }
}
