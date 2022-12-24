<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToDirectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('directions', function (Blueprint $table) {
            $table->enum('type',['federal_district', 'region']);
            $table->foreignId('federal_district_id')
                ->nullable()
                ->constrained()
                ->references('id')
                ->on('federal_districts');

            $table->foreignId('region_id')
                ->nullable()
                ->constrained()
                ->references('id')
                ->on('regions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('directions', function (Blueprint $table) {
            //
        });
    }
}
