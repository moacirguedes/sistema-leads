<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomFieldValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_field_values', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value')->nullable();
            $table->integer('lead_id')->unsigned();
            $table->integer('custom_field_id')->unsigned();
            $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');
            $table->foreign('custom_field_id')->references('id')->on('custom_fields')->onDelete('cascade');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_field_values');
    }
}
