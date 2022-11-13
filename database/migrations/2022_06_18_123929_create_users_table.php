<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('login')->unique();

            /**
             * Roles:
             * user - 1
             * moderator - 2 
             * admin - 3
             * root - 4
             */
            $table->unsignedTinyInteger('power')->default(1);
            $table->string('photo_src')->nullable()->default(null);
            $table->timestamp('last_seen')->nullable()->default(null);
            $table->rememberToken();

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
        Schema::dropIfExists('users');
    }
};
