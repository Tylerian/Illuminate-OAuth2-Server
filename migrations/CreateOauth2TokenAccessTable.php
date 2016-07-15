<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOAuth2TokenAccessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oauth2_tokens_access', function (Blueprint $table)
        {
            // fields
            $table->string('id', 128);
            $table->string('id_client', 128);
            $table->integer('id_account')->unsigned();
            $table->integer('expires_at')->unsigned();

            // Indexes
            $table->primary('id');

            // Foreign Keys
            $table->foreign('id_client')->references('id')->on('oauth2_clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('oauth2_tokens_access');
    }
}