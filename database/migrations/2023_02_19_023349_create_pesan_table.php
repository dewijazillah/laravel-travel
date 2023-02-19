<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesan', function (Blueprint $table) {
            $table->increments('id_pesan');
            $table->integer('id_user')->unsigned()->nullable();
            $table->foreign('id_user')->references('id_user')->on('user');
            $table->string('email_pemesan');
            $table->string('nama_paket');            
            $table->string('penginapan');
            $table->integer('jumlah_orang');
            $table->string('transportasi');
            $table->timestamp('tanggal_berangkat');
            $table->bigInteger('total_harga');
            $table->timestamp('tanggal')->useCurrent();
            $table->integer('status')->default(0);

            $table->smallInteger('soft_delete')->default(0);
            $table->timestamps(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesan');
    }
}
