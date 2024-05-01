<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLichThiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lich_thi', function (Blueprint $table) {
            $table->increments('id_lich_thi');
            $table->integer('id_dot_thi')->unsigned()->nullable();
            $table->integer('id_gio_thi')->unsigned()->nullable();
            $table->integer('id_phong_thi')->unsigned()->nullable();
            $table->integer('so_luong')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_dot_thi')->references('id_dot_thi')->on('dot_thi')->onDelete('cascade');
            $table->foreign('id_gio_thi')->references('id_gio_thi')->on('gio_thi')->onDelete('cascade');
            $table->foreign('id_phong_thi')->references('id_phong_thi')->on('phong_thi')->onDelete('cascade');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lich_thi');
    }
}
