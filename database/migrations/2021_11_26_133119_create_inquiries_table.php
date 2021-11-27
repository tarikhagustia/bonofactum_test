<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->foreignId('country_id');
            $table->integer('zip_code');
            $table->integer('min_order');
            $table->integer('acceptable_lead_time');
            $table->foreignId('type_id');
            $table->foreignId('material_id');
            $table->text('description')->nullable();
            $table->text('references')->nullable();
            $table->ipAddress('ip_address');
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
        Schema::dropIfExists('inquiries');
    }
}
