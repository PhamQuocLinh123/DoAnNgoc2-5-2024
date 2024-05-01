<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatKhauThiSinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mat_khau_thi_sinh', function (Blueprint $table) {
            $table->increments('id_mat_khau');
            $table->unsignedInteger('id_hoc_vien');
            $table->string('mat_khau');
            $table->timestamps();

            // Indexes
            
            $table->unique('id_hoc_vien');

            // Foreign key constraint
            $table->foreign('id_hoc_vien')
                  ->references('id_hoc_vien')
                  ->on('hoc_vien')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mat_khau_thi_sinh');
    }
}
