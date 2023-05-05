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
            $table->bigInteger('year')->default(2000);
            $table->string('manufacturerType');
            $table->enum('carModel',['سيدان','بيك أب','كوبيه','هاتش باك','دفع رباعي','واجن','تجارية','فان'])->default('سيدان');
            $table->enum('typeOfFuel',['بنزين','ديزل','كهرباء','هجين'])->default('بنزين');
            $table->enum('typeOfGears',['اوتوماتيك','عادي'])->default('عادي');
            $table->enum('isCarNew',['جديدة','مستعملة'])->default('مستعملة');
            $table->string('countryOfOrigin',100)->nullable();
            $table->enum('numberOfDoers',[2,3,4,5,6])->default(4);
            $table->enum('numberOfCylinders',[2,3,4,5,6,8,10,12,'كهرباء'])->default(4);
            $table->double('engineCapacity')->default(0.0);
            $table->float('price')->default(0.001);
            $table->string('description')->default('No Description');
            $table->double('mileage')->default(0.001);
            $table->string('color')->default('white');

//            $table->foreignIdFor(Merchant::class)->constrained();
//            $table->foreignId('merchant_id')->constrained();
//            $table->foreignId('merchant_id')->constrained()->restrictOnDelete();
//            $table->foreign('merchant_id')->on('merchants')->references('id');

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
