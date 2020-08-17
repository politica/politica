<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultAxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_axes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('axis_id')->constrained()->onDelete('cascade');
            $table->foreignId('result_id')->constrained()->onDelete('cascade');
            $table->integer('value')->default(50);
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
        Schema::dropIfExists('result_axes');
    }
}
