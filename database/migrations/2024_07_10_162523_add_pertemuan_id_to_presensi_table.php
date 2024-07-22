<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPertemuanIdToPresensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('presensi', function (Blueprint $table) {
            $table->unsignedBigInteger('pertemuan_id')->after('id'); // Sesuaikan dengan posisi kolom yang diinginkan

            // Jika Anda ingin menambahkan foreign key constraint, tambahkan baris ini
            // $table->foreign('pertemuan_id')->references('id')->on('pertemuans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('presensi', function (Blueprint $table) {
            $table->dropColumn('pertemuan_id');

            // Jika Anda menambahkan foreign key constraint, hapus baris ini
            // $table->dropForeign(['pertemuan_id']);
        });
    }
}
