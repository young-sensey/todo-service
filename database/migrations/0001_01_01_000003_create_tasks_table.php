<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('name', 63);
            $table->text('description')->nullable();
            $table->string('status', 31)->default('pending');
            $table->string('repeat', 31)->nullable();
            $table->integer('priority')->default(0);
            $table->integer('complexity')->default(0);
            $table->timestamp('execution_time')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
