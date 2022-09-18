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
        Schema::create('repositories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('user_id')->constrained();
            $table->string('lang');
            $table->boolean('status')->default(true);

            /*
             * 0 - только я
             * 1 - друзья
             * 2 - друзья и друзья друзей
             * 3 - все
             * */
            $table->unsignedTinyInteger('access')->default(3);
            $table->unsignedInteger('watches')->default(0);
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
        Schema::dropIfExists('repositories');
    }
};
