<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        if (Schema::hasTable('members')) {
            return;
        }
        
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->string('nickname')->nullable();
            $table->string('en_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('facebook')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('members');
    }

}
