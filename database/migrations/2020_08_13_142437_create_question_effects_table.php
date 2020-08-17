<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionEffectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_effects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('axis_id')->constrained()->onDelete('cascade');
            $table->integer('magnitude_agree')->default(0);
            $table->integer('magnitude_disagree')->default(0);
            $table->integer('magnitude_neutral')->default(0);
            $table->integer('magnitude_strongly_agree')->default(0);
            $table->integer('magnitude_strongly_disagree')->default(0);
            $table->foreignId('question_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('question_effects');
    }
}
