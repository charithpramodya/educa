<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->integer("author_id");
            $table->integer("subject_id");
            $table->integer("module_id")->nullable();
            $table->string("name");
            $table->string("type");
            $table->string("privacy");
            $table->float("price")->default(0);
            $table->integer("class_id")->nullable();
            $table->time("duration")->default("01:00:00");
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
        Schema::dropIfExists('quizzes');
    }
}
