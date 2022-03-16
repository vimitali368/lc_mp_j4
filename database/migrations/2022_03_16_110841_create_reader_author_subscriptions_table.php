<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReaderAuthorSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reader_author_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reader_id');
            $table->unsignedBigInteger('author_id');
            $table->timestamps();

            // IDX
            $table->index('reader_id', 'ras_reader_idx');
            $table->index('author_id', 'ras_author_idx');

            // FK
            $table->foreign('reader_id', 'ras_reader_fk')->on('users')->references('id');
            $table->foreign('author_id', 'ras_author_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reader_author_subscriptions');
    }
}
