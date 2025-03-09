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
        Schema::create('theses', function (Blueprint $table) {
            $table->uuid("id");
            $table->string("title_final")->nullable();
            $table->string("smt")->nullable();
            $table->string("year")->nullable();
            $table->string("das_sein")->nullable();
            $table->string("das_sollen")->nullable();
            $table->string("gaps")->nullable();
            $table->string("formulation")->nullable();
            $table->string("title_promise")->nullable();
            $table->string("title_proposal")->nullable();
            $table->string("title_shp")->nullable();
            $table->string("title_thesis")->nullable();
            $table->string("status_promise")->nullable();
            $table->string("status_proposal")->nullable();
            $table->string("status_shp")->nullable();
            $table->string("status_thesis")->nullable();
            $table->string("disabled_promise")->nullable();
            $table->string("disabled_proposal")->nullable();
            $table->string("disabled_shp")->nullable();
            $table->string("disabled_thesis")->nullable();
            $table->string("student_id")->unique()->nullable();
            $table->string("leader")->nullable();
            $table->string("promotor")->nullable();
            $table->string("method")->nullable();
            $table->string("moderator")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theses');
    }
};
