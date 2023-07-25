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
        Schema::create('tbl_study_group', function (Blueprint $table) {
            $table->id();
            $table -> string('group_name');
            $table -> string('group_link');
            $table -> string('description');
            $table -> integer('number_memebers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_study_group');
    }
};
