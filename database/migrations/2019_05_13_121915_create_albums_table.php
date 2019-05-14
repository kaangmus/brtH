<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('reporter_id');
            $table->string('album');
            $table->text('deskripsi')->nullable();
            $table->string('slug')->nullable();
            $table->string('kategori')->nullable();
            $table->enum('publish', ['Public', 'Private'])->default('Private');
            $table->enum('status', ['Verifikasi', 'Block', 'Pengajuan'])->default('Pengajuan');
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
        Schema::dropIfExists('albums');
    }
}
