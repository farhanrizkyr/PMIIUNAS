<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Tahun;
use App\Models\Progdi;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penguruses', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('status')->default('active');
            $table->string('tempat');
            $table->date('tanggallahir');
            $table->string('email');
            $table->string('hp');
            $table->string('alamat');
            $table->foreignIDFor(Tahun::class);
            $table->foreignIDFor(Progdi::class);

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
        Schema::dropIfExists('penguruses');
    }
};
