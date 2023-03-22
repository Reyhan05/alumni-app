<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bios', function (Blueprint $table) {
            $table->id();
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
        Schema::create('bios', function (Blueprint $table) {
            $table->id();
            $table->string('agama',20);
            $table->bigInteger('nohp');
            $table->enum('status',['nikah','belum menikah']);
            $table->text('sekolah',255);
            $table->timestamps();
        });
    }
}
