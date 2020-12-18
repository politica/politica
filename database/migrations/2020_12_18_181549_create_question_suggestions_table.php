<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionSuggestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_suggestions', function (Blueprint $table) {
            $table->id();
            $table->text('body')->nullable();
            $table->text('description_agree')->nullable();
            $table->text('description_disagree')->nullable();
            $table->text('description_neutral')->nullable();
            $table->text('description_strongly_agree')->nullable();
            $table->text('description_strongly_disagree')->nullable();
            $table->text('more_information')->nullable();
            $table->foreignId('question_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
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
        Schema::dropIfExists('question_suggestions');
    }
}
