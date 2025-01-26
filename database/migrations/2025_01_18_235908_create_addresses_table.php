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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('street', 100);
            $table->integer('internal_num')->unsigned()->nullable();
            $table->integer('external_num')->unsigned()->nullable();
            $table->string('neighborhood', 50)->nullable();
            $table->string('town', 50);
            $table->string('state', 50);
            $table->string('country', 50);
            $table->integer('postal_code')->unsigned();
            $table->string('references', 100)->nullable();
            $table->foreignId('client_id')->unsigned();

            $table->foreign('client_id')->references('id')->on('clients')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
