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
        Schema::create('repository_folders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->boolean('main')->default(false);
            $table->foreignId('repository_id')->constrained();
            $table->foreignId('folder_id')->nullable()->references('id')->on('repository_folders')->onDelete('cascade');

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
        Schema::dropIfExists('repository_folders');
    }
};
