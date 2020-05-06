<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIklansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iklans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('reporter_id');
            $table->string('foto');
            $table->string('slug');
            $table->text('deskripsi')->nullable();
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
        Schema::dropIfExists('iklans');
    }
}
