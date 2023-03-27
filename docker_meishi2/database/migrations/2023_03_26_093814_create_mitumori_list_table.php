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
        Schema::create('mitumori_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num');
            $table->string('date');
            $table->string('corp');
            for($i=1;$i<=10;$i++){
                $table->string('tekiyo'.$i);
                $table->string('suryo'.$i);
                $table->string('tanka'.$i);
                $table->string('kingaku'.$i);
                $table->string('biko'.$i);
            }
            for($i=1;$i<=7;$i++){
                $table->string('hosoku'.$i);
            }
            $table->string('total_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitumori_list');
    }
};
