<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestStatusTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        if (Schema::hasTable('guest_status')) {
            return;
        }

        Schema::create('guest_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('guest_status')->insert([
            array('name' => 'invited', 'description' => 'invited from facebook'),
            array('name' => 'registered', 'description' => 'register from facebook'),
            array('name' => 'attended', 'description' => ''),
            array('name' => 'paid', 'description' => ''),
        ]);
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
