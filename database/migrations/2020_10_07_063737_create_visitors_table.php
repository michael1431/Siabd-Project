<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('guardian');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('guardian_phone');
            $table->string('subject')->nullable();
            $table->json('ssc')->nullable();
            $table->json('hsc')->nullable();
            $table->json('hons')->nullable();
            $table->json('masters')->nullable();
            $table->json('others')->nullable();
            $table->string('additional_skill')->nullable();
            $table->string('additional_skill_score')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('degree_type_id')->nullable();
            $table->unsignedBigInteger('university_id')->nullable();
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
        Schema::dropIfExists('visitors');
    }
}
