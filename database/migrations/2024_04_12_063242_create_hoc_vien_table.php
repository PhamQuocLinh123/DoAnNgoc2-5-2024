<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHocVienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoc_vien', function (Blueprint $table) {
            $table->increments('id_hoc_vien');
            $table->string('ho_ten', 255);
            $table->string('anh_3_4', 255)->nullable();
            $table->string('so_can_cuoc', 20);
            $table->date('ngay_cap_can_cuoc')->nullable();
            $table->string('noi_cap_can_cuoc', 255)->nullable();
            $table->date('ngay_sinh')->nullable();
            $table->string('noi_sinh', 255)->nullable();
            $table->string('dan_toc', 50)->nullable();
            $table->string('so_dien_thoai', 15)->nullable();
            $table->integer('id_khoa_hoc')->unsigned()->nullable();
            $table->integer('id_nganh')->unsigned()->nullable();
            $table->string('ngay_dang_ky')->nullable();
            $table->enum('gioi_tinh', ['Nam', 'Nữ', 'Khác'])->nullable();
            $table->string('ung_dung_cntt', 255)->nullable();
            $table->text('ghi_chu')->nullable();
            $table->timestamps();
            
            // Foreign keys
            $table->foreign('id_khoa_hoc')->references('id_khoa_hoc')->on('khoa_hoc')->onDelete('cascade');
            $table->foreign('id_nganh')->references('id_nganh')->on('nganh')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoc_vien');
    }
}
