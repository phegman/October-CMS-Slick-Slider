<?php namespace PeterHegman\SlickSlider\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePeterhegmanSlicksliderSlideShows5 extends Migration
{
    public function up()
    {
        Schema::table('peterhegman_slickslider_slide_shows', function($table)
        {
            $table->boolean('dots')->nullable();
            $table->string('dots_class')->nullable();
            $table->boolean('draggable')->nullable();
            $table->boolean('fade')->nullable();
            $table->boolean('focus_on_select')->nullable();
            $table->string('easing')->nullable();
            $table->double('edge_friction', 10, 0)->nullable();
            $table->boolean('infinite')->nullable();
            $table->integer('initial_slide')->nullable();
            $table->string('lazy_load')->nullable();
            $table->boolean('pause_on_focus')->nullable();
            $table->boolean('pause_on_hover')->nullable();
            $table->boolean('pause_on_dots_hover')->nullable();
            $table->json('responsive')->nullable();
            $table->integer('rows')->nullable();
            $table->integer('slides_per_row')->nullable();
            $table->integer('slides_to_show')->nullable();
            $table->integer('slides_to_scroll')->nullable();
            $table->integer('speed')->nullable();
            $table->boolean('swipe')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('peterhegman_slickslider_slide_shows', function($table)
        {
            $table->dropColumn('dots');
            $table->dropColumn('dots_class');
            $table->dropColumn('draggable');
            $table->dropColumn('fade');
            $table->dropColumn('focus_on_select');
            $table->dropColumn('easing');
            $table->dropColumn('edge_friction');
            $table->dropColumn('infinite');
            $table->dropColumn('initial_slide');
            $table->dropColumn('lazy_load');
            $table->dropColumn('pause_on_focus');
            $table->dropColumn('pause_on_hover');
            $table->dropColumn('pause_on_dots_hover');
            $table->dropColumn('responsive');
            $table->dropColumn('rows');
            $table->dropColumn('slides_per_row');
            $table->dropColumn('slides_to_show');
            $table->dropColumn('slides_to_scroll');
            $table->dropColumn('speed');
            $table->dropColumn('swipe');
        });
    }
}
