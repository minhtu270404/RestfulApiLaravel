<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('google_id')->nullable();
            $table->text('google_access_token')->nullable();
            $table->text('google_refresh_token')->nullable();
            $table->longText('google_scopes')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('point')->nullable();
            $table->integer('contribution_points')->nullable();
            $table->integer('check_first_login')->nullable();
            $table->enum('level', ['Vip', 'Medium', 'Normal'])->default('Normal');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
