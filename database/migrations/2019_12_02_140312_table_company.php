<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Utils\MyBlueprint;

class TableCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $bp) {
            $table = new MyBlueprint($bp);
            $table->string( 'phone', 15);
            $table->string( 'fax', 15);
            $table->string( 'mobilePhone', 15);
            $table->json( 'concatUser');
            $table->string( 'email', 20);
            $table->json( 'address');
            $table->string( 'logo', 100);
            $table->json( 'briefIntroduction');
            $table->json( 'latLng');
            $table->common();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company');
    }
}
