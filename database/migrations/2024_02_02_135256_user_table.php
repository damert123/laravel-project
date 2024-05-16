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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255)->nullable(false);
            $table->string('second_name', 255)->nullable(false);
            $table->string('groupp', 255)->nullable(false);
            $table->date('date', 255)->nullable(false);
            $table->string('phone', 255)->nullable(false);
            $table->string('pass', 255)->nullable(false);
            $table->string('email', 255)->nullable(false)->unique('email');
            $table->text('about', 1000)->nullable(true); 
            $table->string('avatar', 255)->nullable(true);
            $table->unsignedSmallInteger('role')->nullable();
            $table->string('remember_token', 100)->nullable(true);
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
