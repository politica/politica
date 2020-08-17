<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            $table->text('description_agree')->nullable();
            $table->text('description_disagree')->nullable();
            $table->text('description_neutral')->nullable();
            $table->text('description_strongly_agree')->nullable();
            $table->text('description_strongly_disagree')->nullable();
            $table->boolean('is_required')->default(0);
            $table->text('more_information')->nullable();
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
        Schema::dropIfExists('questions');
    }
}
