<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("service_id")->nullable();
            $table->string("service_name",200)->nullable();
            $table->double("service_price")->default(0.00);
            $table->integer("provider_id")->default(0);
            $table->integer("customer_id")->default(0);
            $table->string("current_situation_img",255)->nullable();
            $table->string("after_work_img",255)->nullable();
            $table->integer("customer_approval")->default(0);
            $table->integer("job_status")->default(1);
            $table->double("lat")->default(0.00);
            $table->double("lng")->default(0.00);
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
        Schema::dropIfExists('jobs');
    }
}
