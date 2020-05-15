<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->tinyInteger('role')->default(0);
            $table->string('full_name')->nullable();
            $table->string('email');
            $table->text('image')->nullable();
            $table->tinyInteger('gender');
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->integer('project_id');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('members');
    }
}
