<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->string('kategori')->nullable();
            $table->integer('stok')->default(0);
            $table->decimal('harga_beli', 12, 2)->nullable();
            $table->decimal('harga_jual', 12, 2)->nullable();
            $table->text('deskripsi')->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->date('tanggal_kadaluarsa')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
}
