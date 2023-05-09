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
        Schema::create('pemberitahuan', function (Blueprint $table) {
          $table->id();
          $table->text('judulpem');
          $table->text('gambar')->nullable();
          $table->text('slug');
          $table->longtext('body');
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
        Schema::dropIfExists('pemberitahuan');
    }
};
