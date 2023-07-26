<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->tinyInteger("status");
            $table->integer('user_id')->foreign('user_id')->reference('id')->on('users')->onDelete('CASCADE');
            $table->integer('category_id')->foreign('category_id')->reference('id')->on('categories')->onDelete('CASCADE');
            $table->integer('emotion_id')->foreign('emotion_id')->reference('id')->on('emotions')->onDelete('CASCADE')->nullable();
            $table->double('score')->nullable();
            $table->double('magnitude')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
