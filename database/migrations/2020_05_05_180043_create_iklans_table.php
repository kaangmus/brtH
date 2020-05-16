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
            $table->string('spase');
            $table->string('foto');
            $table->string('link')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('publish', ['Public', 'Private'])->default('Private');
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
