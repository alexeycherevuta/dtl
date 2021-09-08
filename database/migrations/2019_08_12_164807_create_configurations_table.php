<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateConfigurationsTable extends Migration
{
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('device_type')->nullable()->default(null);
            $table->index('device_type');
            $table->string('device_manufacturer')->nullable()->default(null);
            $table->index('device_manufacturer');
            $table->string('device_model')->nullable()->default(null);
            $table->index('device_model');
            $table->string('cpu_manufacturer')->nullable()->default(null);
            $table->index('cpu_manufacturer');
            $table->string('cpu_model')->nullable()->default(null);
            $table->index('cpu_model');
            $table->string('gpu_manufacturer')->nullable()->default(null);
            $table->index('gpu_manufacturer');
            $table->string('gpu_model')->nullable()->default(null);
            $table->index('gpu_model');
            $table->string('gpu_driver')->nullable()->default(null);
            $table->index('gpu_driver');
            $table->string('distribution')->nullable()->default(null);
            $table->index('distribution');
            $table->string('kernel')->nullable()->default(null);
            $table->index('kernel');
            $table->mediumText('comment')->nullable()->default(null);
            $table->string('key')->nullable()->default(null);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('configurations');
    }
}
