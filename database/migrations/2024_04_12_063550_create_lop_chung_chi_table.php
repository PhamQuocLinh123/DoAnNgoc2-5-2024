<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLopChungChiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lop_chung_chi', function (Blueprint $table) {
            $table->increments('id_lop');
            $table->string('ten_lop');
            $table->integer('so_tiet')->nullable();
            $table->decimal('hoc_phi', 10, 2)->nullable();
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
        Schema::dropIfExists('lop_chung_chi');
    }
}
