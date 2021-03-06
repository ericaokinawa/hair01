<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->string('image_path')->nullable();
            $table->string('gender');
            $table->string('hair_type');
            $table->string('hair_volume');
            $table->string('hair_length');
            $table->string('hair_color');
            $table->boolean('straighte')->nullable();
            $table->boolean('perm')->nullable();
            $table->text('hair_style');
            $table->text('hair_care')->nullable();
            $table->text('other')->nullable();
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
        Schema::dropIfExists('portfolios');
    }
}
