<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('message');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('article_id');

            $table->timestamps();
            $table->softDeletes();

            $table->index('user_id', 'comments_user_idx');
            $table->index('article_id', 'comments_article_idx');

            $table->foreign('user_id', 'comments_user_fk')->on('users')->references('id');
            $table->foreign('article_id', 'comments_article_fk')->on('articles')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
