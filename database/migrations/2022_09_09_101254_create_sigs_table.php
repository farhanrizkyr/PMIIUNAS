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
        Schema::create('sigs', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('status')->default ('Belum Divalidasi');
            $table->string('email1');
            $table->string('email2');
            $table->string('hp');
            $table->string('asalrayon');
            $table->text('pasangan')->nullable();
            $table->string('bukti1')->nullable();
            $table->string('bukti2')->nullable();
            $table->string('bukti3')->nullable();
            $table->string('sertifat')->nullable();
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
        Schema::dropIfExists('sigs');
    }
};
