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
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('code',20)->nullable();
            $table->enum('gender',['men','woman','other'])->default('other');
            $table->dateTime('birthdate')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('national')->nullable();
            $table->string('religion')->nullable();
            $table->string('hometown')->nullable();
            $table->string('identily')->nullable();
            $table->dateTime('identily_date')->nullable();
            $table->string('identily_place')->nullable();
            $table->string('tax_code')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('household')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('bank')->nullable();
            $table->dateTime('start_working_date')->nullable();
            $table->string('working_place')->nullable();
            $table->string('note')->nullable();
            $table->string('company_name')->nullable();
            $table->string('department')->nullable();
            $table->string('unit_name')->nullable();
            $table->string('headquater_name')->nullable();
            $table->string('position_name')->nullable();
            $table->string('concurent_position_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_infos');
    }
};
