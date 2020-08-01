<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeferredBindingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deferred_bindings', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_bind')->default(true);
            $table->string('master_field')->index();
            $table->string('master_type')->index();
            $table->string('session_key')->index();
            $table->string('slave_id')->index();
            $table->string('slave_type')->index();
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
        Schema::dropIfExists('deferred_bindings');
    }
}
