<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAxisRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('axis_regions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('axis_id')->constrained()->onDelete('cascade');
            $table->string('label');
            $table->integer('min')->default(0);
            $table->integer('max')->default(100);
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
        Schema::dropIfExists('axis_regions');
    }
}
