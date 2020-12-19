<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignificantPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('significant_people', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->foreignId('ideology_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('portrait')->nullable();
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
        Schema::dropIfExists('significant_people');
    }
}
