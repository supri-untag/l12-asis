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
            $table->text("title_final")->nullable();
            $table->string("smt")->nullable();
            $table->string("year")->nullable();
            $table->text("das_sein")->nullable();
            $table->text("das_sollen")->nullable();
            $table->text("gaps")->nullable();
            $table->text("formulation")->nullable();
            $table->text("title_promise")->nullable();
            $table->text("title_proposal")->nullable();
            $table->text("title_shp")->nullable();
            $table->text("title_thesis")->nullable();
            $table->string("status_promise")->nullable();
            $table->string("status_proposal")->nullable();
            $table->string("status_shp")->nullable();
            $table->string("status_thesis")->nullable();
            $table->string("disabled_promise")->nullable();
            $table->string("disabled_proposal")->nullable();
            $table->string("disabled_shp")->nullable();
            $table->string("disabled_thesis")->nullable();
            $table->string("student_id")->nullable();
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
