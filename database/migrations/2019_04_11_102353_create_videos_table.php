<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('reporter_id')->default(0);
            $table->string('judul');
            $table->string('slug');
            $table->string('url');
            $table->text('deskripsi')->nullable();
            $table->string('kategori')->nullable();
            $table->enum('publish', ['Public', 'Private'])->default('Private');
            $table->enum('status', ['Verifikasi', 'Block', 'Pengajuan'])->default('Pengajuan');
            $table->integer('dilihat');
            $table->string('thumbnail');
            $table->longText('data')->nullable();
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
        Schema::dropIfExists('videos');
    }
}
