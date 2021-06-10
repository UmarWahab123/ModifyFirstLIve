<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id');
            $table->integer('section_type');
            $table->string('section_heading')->nullable();
            $table->string('section_sub_heading')->nullable();
            $table->string('section_description')->nullable();
            $table->string('section_image')->nullable();
            $table->string('section_btn_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('section_alert')->nullable();
            $table->integer('section_status');
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
        Schema::dropIfExists('page_sections');
    }
}
