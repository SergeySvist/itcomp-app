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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('title', 64);
            $table->string('description');
            $table->unsignedBigInteger('relation_id');
            $table->unsignedBigInteger('type_id');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('work_time');

            $table->foreign('relation_id')->references('id')->on('relations');
            $table->foreign('type_id')->references('id')->on('report_types');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
