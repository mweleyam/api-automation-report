<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create("automations", function (Blueprint $table) {
            $table->increments("id");
            $table->string("squad");
            $table->string("service");
            $table->string("environment");
            $table->integer("total_feature");
            $table->integer("total_scenario");
            $table->integer("total_success");
            $table->integer("total_pending");
            $table->integer("total_failed");
            $table->decimal("sucess_rate", 10,2);
            $table->integer("duration");
            $table->string("url_report");
            $table->dateTime("created_at");
            $table->dateTime("updated_at");
            $table->dateTime("deleted_at")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
