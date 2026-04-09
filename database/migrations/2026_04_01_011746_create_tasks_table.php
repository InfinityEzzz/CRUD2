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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id()->primary_key();
<<<<<<< HEAD
            $table->string('tasks_name');
=======
<<<<<<< HEAD
            $table->string('name');
>>>>>>> 3ead3e5 (Actualizacion)
            $table->string('description');
            $table->date('date');
            $table->tinyInteger('completed')->default(0);
<<<<<<< HEAD
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('status')->default(1);
=======
            $table->foreignId('user_id')->deafult(NULL);
=======
            $table->string('tasks_name');
            $table->string('description');
            $table->date('date');
            $table->tinyInteger('completed')->default(0);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('status')->default(1);
>>>>>>> 0b79563 (Segunda version)
>>>>>>> 3ead3e5 (Actualizacion)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
