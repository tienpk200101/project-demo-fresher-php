<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->string('username', 255)->unique();
            $table->string('email', 255)->unique();
            $table->string('avatar', 255)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->string('address', 255)->nullable();
            $table->enum('gender', [0, 1, 2])->nullable()->comment('0 - male , 1 - female, 2 - other'); // 0 - male , 1 - female, 2 - other
            $table->string('phone', 15)->nullable();
            $table->enum('is_active', [0, 1])->default(1)->comment('0 - unactive, 1 - active');
            $table->rememberToken();
            $table->timestamps();
            $table->enum('role', [0, 1, 2])->default(2); //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
