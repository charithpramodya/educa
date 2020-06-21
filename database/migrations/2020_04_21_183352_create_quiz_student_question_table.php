<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizStudentQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_student_question', function (Blueprint $table) {
            $table->id();
            $table->integer("student_id");
            $table->integer("quiz_student_id");
            $table->integer("question_id");
            $table->boolean("correct");
            $table->integer("module_id")->nullable;
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
        Schema::dropIfExists('quiz_student_question');
    }
}
