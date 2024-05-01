<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDangKyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dang_ky', function (Blueprint $table) {
            $table->integer('id_hoc_vien')->unsigned();
            $table->integer('id_lop')->unsigned();
            $table->string('trang_thai_phi', 50)->nullable();
            $table->timestamps();
            
            // Foreign keys
            $table->foreign('id_hoc_vien')->references('id_hoc_vien')->on('hoc_vien')->onDelete('cascade');
            $table->foreign('id_lop')->references('id_lop')->on('lop_chung_chi')->onDelete('cascade');
            
            // Primary key
            $table->primary(['id_hoc_vien', 'id_lop']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dang_ky');
    }
}
