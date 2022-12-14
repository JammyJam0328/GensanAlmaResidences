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
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->string('qr_code');
            $table->string('name');
            $table->string('contact_number');
            $table->boolean('is_out_of_the_building')->default(false);
            $table->boolean('is_checked_in')->default(false);
            $table->string('check_in_at')->nullable();
            $table->boolean('totaly_checked_out')->default(false);
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
        Schema::dropIfExists('guests');
    }
};
