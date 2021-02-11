<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('counselor_id')->nullable();
            $table->unsignedBigInteger('program_id')->nullable();
            $table->string('phone_home')->nullable();
            $table->integer('student_code')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('f_name')->nullable();
            $table->string('f_profession')->nullable();
            $table->string('f_contact')->nullable();
            $table->string('m_name')->nullable();
            $table->string('m_profession')->nullable();
            $table->string('m_contact')->nullable();
            $table->string('passport_no')->nullable();
            $table->json('ssc')->nullable();
            $table->json('hsc')->nullable();
            $table->json('hons')->nullable();+
            $table->json('masters')->nullable();
            $table->json('others')->nullable();

            $table->string('additional_skill')->nullable();
            $table->string('additional_skill_score')->nullable();
            $table->string('nid')->nullable();
            $table->string('b_reg_no')->nullable();
            $table->boolean('is_deleted')->default(0);
            $table->longText('remarks')->nullable();
            $table->date('schedule')->nullable();
            $table->longText('status')->default('new_leads');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
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
        Schema::dropIfExists('student_lists');
    }
}
