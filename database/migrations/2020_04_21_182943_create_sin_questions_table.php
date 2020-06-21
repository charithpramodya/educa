<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sin_questions', function (Blueprint $table) {
            $table->id();
            $table->string('fid');
            $table->string("question");
            $table->string("ans1");
            $table->string("ans2");
            $table->string("ans3");
            $table->string("ans4");
            $table->string("ans5")->nullable();
            $table->string("correct_and");
            $table->string("img_url")->nullable();
            $table->string("review")->nullable();
            $table->string("review_img")->nullable();
            $table->integer("module_id")->nullable();
            $table->integer("quiz_id");
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
        Schema::dropIfExists('sin_questions');
    }
}
