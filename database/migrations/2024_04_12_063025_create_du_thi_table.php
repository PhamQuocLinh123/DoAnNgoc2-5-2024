<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDuThiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('du_thi', function (Blueprint $table) {
            $table->integer('id_hoc_vien')->unsigned()->nullable();
            $table->integer('id_lich_thi')->unsigned()->nullable();
            $table->string('trang_thai', 50)->nullable();
            $table->decimal('diem_ly_thuyet', 5, 2)->nullable();
            $table->decimal('diem_thuc_hanh', 5, 2)->nullable();
            $table->string('So_bao_danh', 20)->nullable();
            $table->timestamps();
            
            // Tạo ràng buộc khóa ngoại với bảng hoc_vien
            $table->foreign('id_hoc_vien')->references('id_hoc_vien')->on('hoc_vien')->onDelete('cascade');
            
            // Tạo ràng buộc khóa ngoại với bảng lich_thi
            $table->foreign('id_lich_thi')->references('id_lich_thi')->on('lich_thi')->onDelete('cascade');
            
            // Thiết lập khóa chính
            $table->primary(['id_hoc_vien', 'id_lich_thi']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('du_thi');
    }
}
