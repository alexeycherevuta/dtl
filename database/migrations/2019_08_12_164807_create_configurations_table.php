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
            $table->timestamps();
            $table->string('device_type')->nullable()->default(null);
            $table->string('device_vendor')->nullable()->default(null);
            $table->string('device_model')->nullable()->default(null);
            $table->string('processor_vendor')->nullable()->default(null);
            $table->string('processor_model')->nullable()->default(null);
            $table->string('distribution')->nullable()->default(null);
            $table->string('kernel')->nullable()->default(null);
            $table->mediumText('comment')->nullable()->default(null);
            $table->string('key')->nullable()->default(null);
        });
    }
    public function down()
    {
        Schema::dropIfExists('configurations');
    }
}
