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
        Schema::create('shortcodes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('user_id')->constrained();
            $table->string('filename')->unique();
            $table->boolean('cdn')->default(false);
            $table->string('ext')->default('txt');

            /**
             * Access
             * 1 - любой человек (cdn работает)
             * 2 - только я (cdn не работает)
             * 3 - никто (даже я) (cdn не работает) (на случай блокировки)
             */

            $table->unsignedTinyInteger('access')->default(1);
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
        Schema::dropIfExists('shortcodes');
    }
};
