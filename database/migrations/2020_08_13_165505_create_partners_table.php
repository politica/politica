<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->text('feature_1_description');
            $table->string('feature_1_icon');
            $table->string('feature_1_label');
            $table->text('feature_2_description');
            $table->string('feature_2_icon');
            $table->string('feature_2_label');
            $table->text('feature_3_description');
            $table->string('feature_3_icon');
            $table->string('feature_3_label');
            $table->text('feature_4_description');
            $table->string('feature_4_icon');
            $table->string('feature_4_label');
            $table->string('invite');
            $table->boolean('is_primary')->default(0);
            $table->string('logo');
            $table->string('name');
            $table->text('review');
            $table->string('reviewer_name');
            $table->string('reviewer_avatar');
            $table->integer('sort_order')->default(0);
            $table->string('slug');
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
        Schema::dropIfExists('partners');
    }
}
