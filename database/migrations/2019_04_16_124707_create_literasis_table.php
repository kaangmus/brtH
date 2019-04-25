<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiterasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('literasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('reporter_id')->default(0);
            $table->string('judul');
            $table->string('gambar');
            $table->longText('artikel');
            $table->integer('dilihat');
            $table->string('kategori')->nullable();
            $table->enum('publish', ['Public', 'Private'])->default('Private');
            $table->enum('status', ['Verifikasi', 'Block', 'Pengajuan'])->default('Pengajuan');
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
        Schema::dropIfExists('literasis');
    }
}
