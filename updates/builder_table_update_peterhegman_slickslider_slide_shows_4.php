<?php namespace PeterHegman\SlickSlider\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePeterhegmanSlicksliderSlideShows4 extends Migration
{
    public function up()
    {
        Schema::table('peterhegman_slickslider_slide_shows', function($table)
        {
            $table->boolean('accessibility')->nullable();
            $table->boolean('adaptive_height')->nullable();
            $table->integer('autoplay_speed')->nullable();
            $table->boolean('arrows')->nullable();
            $table->string('prev_arrow')->nullable();
            $table->string('next_arrow')->nullable();
            $table->boolean('center_mode')->nullable();
            $table->integer('center_padding')->nullable();
            $table->string('css_ease')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('peterhegman_slickslider_slide_shows', function($table)
        {
            $table->dropColumn('accessibility');
            $table->dropColumn('adaptive_height');
            $table->dropColumn('autoplay_speed');
            $table->dropColumn('arrows');
            $table->dropColumn('prev_arrow');
            $table->dropColumn('next_arrow');
            $table->dropColumn('center_mode');
            $table->dropColumn('center_padding');
            $table->dropColumn('css_ease');
        });
    }
}
