<?php namespace peterhegman\slickslider\components;

use peterhegman\slickslider\models\SlideShows;
use Symfony\Component\HttpFoundation\Request;
use Log;

class Slider extends \Cms\Classes\ComponentBase
{
    public function componentDetails()
    {
        $slideShows = SlideShows::all();
        if (count($slideShows) > 0) {
            return [
                'name' => 'Slider',
                'description' => 'Displays a slider chosen from the dropdown'
            ];
        } else {
            return [
                'name' => 'Slider',
                'description' => 'Please create a slideshow in the "Slideshow" menu'
            ];
        }
    }

    public function defineProperties()
    {
        $slideShows = SlideShows::all();
        if (count($slideShows) > 0) {
            $optionsArray =  array();
            foreach ($slideShows as $slideShow) {
                $optionsArray[$slideShow->attributes['id']] = $slideShow->attributes['slide_show_title'];
            }
            return [
                'slide_show_id' => [
                    'title'       => 'Slideshow',
                    'type'        => 'dropdown',
                    'default'     => $slideShows->first()->attributes['id'],
                    'placeholder' => 'Select slideshow',
                    'options'     => $optionsArray
                ]
            ];
        } else {
            return [
            ];
        }
    }

    public function onRun()
    {
        $slideShowId = $this->property('slide_show_id');
        $slideShows = SlideShows::where('id', '=', $slideShowId)->first();
        if ($slideShows !== null && $slideShows->attributes['include_jquery']) {
            $this->addJs('assets/jquery-3.1.1.min.js');
        }
        $this->addJs('assets/slick/slick.min.js');
        $this->addCss('assets/slick/slick.css');
        $this->addCss('assets/slick/slick-theme.css');
    }

    // This array becomes available on the page as {{ component.slides }}
    public function slides()
    {
        $slideShowId = $this->property('slide_show_id');
        $slideShows = SlideShows::where('id', '=', $slideShowId)->first();
        if ($slideShows !== null) {
            $breakpoints = json_decode($slideShows->attributes['responsive']);
            //Create Responsive Array
            $breakpointArray = array();
            $i = 0;
            foreach ($breakpoints as $breakpoint) {
                $breakpointArray[$i]['breakpoint'] = (int)$breakpoint->breakpoint;
                $breakpointArray[$i]['settings']['slidesToShow'] = ( $breakpoint->responsive_slides_to_show ? (int)$breakpoint->responsive_slides_to_show : 1 );
                $breakpointArray[$i]['settings']['slidesToScroll'] = ( $breakpoint->responsive_slides_to_scroll ? (int)$breakpoint->responsive_slides_to_scroll : 1 );
                $breakpointArray[$i]['settings']['rows'] = ( $breakpoint->responsive_rows ? (int)$breakpoint->responsive_rows : 1 );
                $breakpointArray[$i]['settings']['slidesPerRow'] = ( $breakpoint->responsive_slides_per_row ? (int)$breakpoint->responsive_slides_per_row : 1 );
                $i++;
            }
            $breakpointJson = json_encode($breakpointArray);
            return compact('slideShows', 'breakpointJson');
        } else {
            $slideShows = 'no_slider';
            return compact('slideShows');
        }
    }
}
