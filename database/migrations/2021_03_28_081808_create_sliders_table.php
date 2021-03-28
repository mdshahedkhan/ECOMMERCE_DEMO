<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('create_by');
            $table->string('title', 30);
            $table->string('sub_title', 60);
            $table->string('url', 255)->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('image');
            $table->enum('status', ['active', 'inactive']);
            $table->foreign('create_by')->on('users')->references('id')->cascadeOnDelete();
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
        Schema::dropIfExists('sliders');
    }
}
