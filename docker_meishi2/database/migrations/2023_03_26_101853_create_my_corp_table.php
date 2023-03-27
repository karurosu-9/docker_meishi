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
        Schema::create('my_corp', function (Blueprint $table) {
            $table->string('corp');
            $table->string('postal');
            $table->string('address');
            $table->string('tel');
            $table->string('fax');
            $table->string('place');
            $table->string('conditions');
            $table->string('deadline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_corp');
    }
};
