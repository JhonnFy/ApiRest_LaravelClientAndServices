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
            $table->increments('id');
            
            # fk_client
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');
        
            # fk_services
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services');

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
