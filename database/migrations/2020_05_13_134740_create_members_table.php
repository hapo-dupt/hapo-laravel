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
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->tinyInteger('role')->default(0);
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->text('image')->nullable();
            $table->tinyInteger('gender')->default(0);
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
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
