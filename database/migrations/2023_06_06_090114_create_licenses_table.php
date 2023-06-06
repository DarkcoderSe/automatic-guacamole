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
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();

            $table->string('license_type')->nullable();
            $table->string('license_status')->nullable();
            $table->string('expiration_date')->nullable();
            $table->string('date_first_license')->nullable();
            $table->string('name')->nullable();
            $table->string('reference_no')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('address')->nullable();
            $table->string('licensee_name')->nullable();

            $table->boolean('is_sent')->default(false);
            $table->integer('status')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licenses');
    }
};
