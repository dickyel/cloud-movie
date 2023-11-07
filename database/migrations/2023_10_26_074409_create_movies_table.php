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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tahun');
            $table->text('deskripsi');
            $table->string('studio');
            $table->string('studio_slug');
            $table->string('slug');
            $table->integer('link_id');
            $table->integer('category_id');
            $table->integer('genre_id');
            $table->string('gallery_id');
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
        Schema::dropIfExists('movies');
    }
};
