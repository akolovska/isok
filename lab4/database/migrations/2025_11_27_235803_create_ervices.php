<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// composer create-project laravel/laravel lab4
// php artisan make:migration create_services
// php artisan migrate
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ervices', function (Blueprint $table) {
            $table->id();
            $table->string('mechanic');
            $table->string('clients');
            $table->string('model');
            $table->string('registration');
            $table->text('description');
            $table->float('price');
            $table->date('begin');
            $table->date('end')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ervices');
    }
};
