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
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('picture', 255)->nullable(false);
            $table->string('header', 255)->nullable(false);
            $table->text('descrip', 3000)->nullable(false); 
            $table->unsignedTinyInteger('members')->nullable(true);
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
