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
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // AutoIncrementing id
            $table->string('name'); // String Name
            $table->string('email')->unique(); // Unique Sting email
            $table->string('phone'); // String phone number
            $table->date('dob'); // Date date of birth
            $table->foreignId('college_id')->constrained()->onDelete('cascade'); // A college_id as the foreign id with cascade enabled to delete the students when a college is deleted
            $table->timestamps(); // Timestamps for auditing
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
