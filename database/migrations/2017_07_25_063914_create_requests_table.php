<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('book');
            $table->integer('bookid')->unsigned();
            $table->foreign('bookid')->references('id')->on('books');
            $table->integer('ownerid')->unsigned();
            $table->foreign('ownerid')->references('id')->on('users');
            $table->integer('requesterid')->unsigned();
            $table->foreign('requesterid')->references('id')->on('users');
            $table->boolean('approved')->default(false);
            $table->boolean('active')->default(false);
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
        Schema::dropIfExists('requests');
    }
}
