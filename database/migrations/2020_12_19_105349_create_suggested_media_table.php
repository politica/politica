<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuggestedMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suggested_media', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->foreignId('ideology_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('thumbnail')->nullable();
            $table->string('type')->nullable();
            $table->text('url')->nullable();
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
        Schema::dropIfExists('suggested_media');
    }
}
