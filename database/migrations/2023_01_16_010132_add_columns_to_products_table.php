<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('weight')->nullable();
            $table->string('cake_text')->nullable();
            $table->string('need_stick')->nullable();
            $table->string('ingradients')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('weight')->nullable();
            $table->string('cake_text')->nullable();
            $table->string('need_stick')->nullable();
            $table->string('ingradients')->nullable();
        });
    }
};
