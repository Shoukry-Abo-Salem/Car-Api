<?php

use App\Models\Merchant;
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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('fullName',150);
            $table->string('year');
            $table->string('manufacturerType');
            $table->enum('carModel',['سيدان','بيك أب','كوبيه','هاتش باك','دفع رباعي','واجن','تجارية','فان'])->default('سيدان');
            $table->enum('typeOfFuel',['بنزين','ديزل','كهرباء','هجين'])->default('بنزين');
            $table->enum('typeOfGears',['اوتوماتيك','عادي'])->default('عادي');
            $table->enum('isCarNew',['جديدة','مستعملة'])->default('مستعملة');
            $table->string('countryOfOrigin',100)->nullable();
            $table->enum('numberOfDoers',[2,3,4,5,6])->default(4);
            $table->string('location',70)->default('غزة');
            $table->enum('numberOfCylinders',[2,3,4,5,6,8,10,12,'كهرباء'])->default(4);
            $table->string('engineCapacity');
            $table->string('price');

            //Table for store photos.
//            $table->string('photo')->default('No Photos found');
            $table->string('description')->default('No Description');
            $table->string('mileage');
            $table->string('color')->default('white');

            //Trying add foreign key.
//            $table->foreignIdFor(Merchant::class)->constrained();
//            $table->foreignId('merchant_id')->constrained();
//            $table->foreignId('merchant_id')->constrained()->restrictOnDelete();

            $table->foreignId('merchant_id')->nullable();
            $table->foreign('merchant_id')->references('id')->on('merchants')->onDelete('cascade');
            $table->foreignId('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
