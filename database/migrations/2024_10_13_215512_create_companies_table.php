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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->text('legal_name');
            $table->text('fantasy_name');
            $table->string('document')->unique();
            $table->text('email');
            $table->text('phone');
            $table->integer('type'); // PF or PJ
            $table->foreignId('id_owner');
            $table->foreign('id_owner')->references('id')->on('users');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
