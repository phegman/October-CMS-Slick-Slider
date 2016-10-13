<?php namespace PeterHegman\SlickSlider\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePeterhegmanSlicksliderSlideShows3 extends Migration
{
    public function up()
    {
        Schema::table('peterhegman_slickslider_slide_shows', function($table)
        {
            $table->dropColumn('slug');
        });
    }
    
    public function down()
    {
        Schema::table('peterhegman_slickslider_slide_shows', function($table)
        {
            $table->string('slug', 255)->nullable();
        });
    }
}
