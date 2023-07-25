<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_questions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('body');
            $table -> integer('upvotes')->default(0);
            $table -> integer('downvotes')->default(0);
            $table->timestamps();
            $table->unsignedBigInteger('asked_by');

            $table->foreign('asked_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_questions');
    }
};
