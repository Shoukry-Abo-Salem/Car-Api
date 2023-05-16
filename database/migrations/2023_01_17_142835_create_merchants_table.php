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
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string('firstName',60);
//            $table->string('middleName',60);
            $table->string('lastName',60);
            $table->bigInteger('phoneNumber')->default(0);
            $table->bigInteger("telefon")->nullable();
            $table->string('email');
            $table->string('password');
            $table->enum('address',['غزة','رفح','خان يونس','شمال غزة','','وسطى','جنوب غزة'])->default('غزة');
            $table->enum('gender',['ذكر','أنثى'])->default('ذكر');
            $table->enum('typeOfMerchant',['وكيل','معرض'])->default('معرض');
            $table->string('image')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchants');
    }
};
