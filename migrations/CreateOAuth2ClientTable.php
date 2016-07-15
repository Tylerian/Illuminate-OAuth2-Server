<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOAuth2ClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oauth2_clients', function (Blueprint $table)
        {
            // fields
            $table->string('id', 128);
            $table->string('name', 32);
            $table->string('password', 128);
            $table->string('redirect_url', 512);

            // Indexes
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('oauth2_clients');
    }
}