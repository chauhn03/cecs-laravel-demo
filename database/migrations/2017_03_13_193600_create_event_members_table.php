<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventMembersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        if (Schema::hasTable('event_members')) {
            return;
        }

        Schema::create('event_members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('eventId');
            $table->boolean('memberId');
            $table->boolean('invited')->nullable();
            $table->boolean('registered')->nullable();
            $table->boolean('attended')->nullable();
            $table->boolean('paid')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
