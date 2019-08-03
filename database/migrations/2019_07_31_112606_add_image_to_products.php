<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function($table){
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->string('image4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function($table){
            $table->dropColumn('image1')->after('quantity');
            $table->dropColumn('image2')->after('image1');
            $table->dropColumn('image3')->after('image2');
            $table->dropColumn('image4')->after('image3');
        });
    }
}
