<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOverviewParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('overview_params', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->uuid('module_license')->nullable()->default(NULL);
            
            $table->longText('name');
            
            $table->longText('meta_description')->nullable()->default(NULL);;
            $table->longText('meta_keywords')->nullable()->default(NULL);;
            $table->longText('short_desc')->nullable()->default(NULL);;
            $table->longText('long_desc')->nullable()->default(NULL);;
            
            $table->boolean('has_interactive_map')->default(FALSE);
            $table->boolean('has_interactive_visit')->default(FALSE);
            
            $table->longText('image_bg_url')->default('dummy-photo-bg.jpg')->nullable()->default(NULL);
            $table->longText('video_bg_url')->default('dummy-video-bg.jpg')->nullable()->default(NULL);
            $table->longText('img_url')->default('dummy-photo.jpg')->nullable()->default(NULL);
            $table->longText('video_url')->default('dummy-video.mp4')->nullable()->default(NULL);

            $table->longText('who_we_are_short_desc')->nullable()->default(NULL);
            $table->longText('who_we_are_long_desc')->nullable()->default(NULL);

            $table->longText('our_space_short_desc')->nullable()->default(NULL);
            $table->longText('our_space_long_desc')->nullable()->default(NULL);

            $table->nullableTimestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('overview_params');
    }
}
