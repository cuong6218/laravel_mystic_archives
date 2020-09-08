<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_type', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id')->nullable();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('type_id')->references('id')->on('types');
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
        Schema::dropIfExists('book_type');
    }
}
