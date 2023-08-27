<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*
    * Run the migrations.
    */
    public function up(): void
    {
        

        # clients
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
     
            $table->timestamps();
        });

        # services
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable;
            $table->float('price');
        
            $table->timestamps();
        });


        # pivot
        Schema::create('clients_services', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /*
    * Reverse the migrations.
    */
    public function down(): void
    {
        Schema::dropIfExists('clients');
        Schema::dropIfExists('services');
        Schema::dropIfExists('clients_services');
    }
};
