<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdeologyRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ideology_requirements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('axis_id')->constrained()->onDelete('cascade');
            $table->foreignId('ideology_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('ideology_requirements');
    }
}
