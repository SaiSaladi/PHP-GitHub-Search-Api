<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApiValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Values', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name');
            $table->string('html_url');
            $table->string('made_at');
            $table->string('pushed_at')->nullable();
            $table->string('description')->nullable();
            $table->integer('stargazers_count')->nullable();
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Values');
    }
}
