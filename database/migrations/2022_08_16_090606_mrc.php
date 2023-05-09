<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mrc', function (Blueprint $table) {
          $table->id();
          $table->longtext('produk');
          $table->longtext('slug');
          $table->longtext('gambar')->nullable();
          $table->longtext('harga');
          $table->longtext('diskon')->nullable();
          $table->string('status')->default ('Stock Ada');
          $table->text('cp');
          $table->text('desc');
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
        Schema::dropIfExists('mrc');
    }
};
