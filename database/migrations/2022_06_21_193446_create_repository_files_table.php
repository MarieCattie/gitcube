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
        Schema::create('repository_files', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('folder_id')->references('id')->on('repository_folders');
            $table->foreignId('repository_id')->references('id')->on('repositories');
            $table->string('type')->default('text');
            $table->unsignedTinyInteger('access')->default(3);
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
        Schema::dropIfExists('repository_files');
    }
};
