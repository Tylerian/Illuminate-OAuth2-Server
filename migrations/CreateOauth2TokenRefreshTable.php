<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOauth2TokenRefreshTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oauth2_tokens_refresh', function (Blueprint $table)
        {
            // fields
            $table->string('id', 128);
            $table->string('id_access_token', 128);
            $table->integer('exipres_at')->unsigned();

            // Indexes
            $table->primary('id');

            // Foreign Keys
            $table->foreign('id_access_token')->references('id')->on('oauth2_tokens_access');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('oauth2_tokens_refresh');
    }
}