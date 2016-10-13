<?php namespace PeterHegman\SlickSlider\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePeterhegmanSlicksliderSlideShows6 extends Migration
{
    public function up()
    {
        Schema::table('peterhegman_slickslider_slide_shows', function($table)
        {
            $table->boolean('touch_move')->nullable();
            $table->integer('touch_threshold')->nullable();
            $table->boolean('use_css')->nullable();
            $table->boolean('use_transform')->nullable();
            $table->boolean('vertical')->nullable();
            $table->boolean('vertical_swiping')->nullable();
            $table->boolean('rtl')->nullable();
            $table->boolean('wait_for_animate')->nullable();
            $table->integer('z_index')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('peterhegman_slickslider_slide_shows', function($table)
        {
            $table->dropColumn('touch_move');
            $table->dropColumn('touch_threshold');
            $table->dropColumn('use_css');
            $table->dropColumn('use_transform');
            $table->dropColumn('vertical');
            $table->dropColumn('vertical_swiping');
            $table->dropColumn('rtl');
            $table->dropColumn('wait_for_animate');
            $table->dropColumn('z_index');
        });
    }
}
