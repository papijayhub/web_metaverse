<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopkeepersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopkeepers', function (Blueprint $table) {
            $table->id();
            $table->string('Firstname', 50);
            $table->string('Middlename', 50);
            $table->string('Lastname', 50);
            $table->string('Gender', 12);
            $table->date('Birthdate');
            $table->string('Address', 50)->nullable();
            $table->string('Citizenship', 50);
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
        Schema::dropIfExists('shopkeepers');
    }
}
