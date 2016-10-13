<?php namespace peterhegman\slickslider\components;

use peterhegman\slickslider\models\SlideShows;
use Symfony\Component\HttpFoundation\Request;

class Slider extends \Cms\Classes\ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Slider',
            'description' => 'Displays a slider choosen from the dropdown'
        ];
    }

    public function defineProperties()
    {
        $slideShows = SlideShows::all();
        if (!$slideShows->isEmpty()) {
            $optionsArray =  array();
            foreach ($slideShows as $slideShow) {
                $optionsArray[$slideShow->attributes['id']] = $slideShow->attributes['slide_show_title'];
            }
            return [
                'slide_show_id' => [
                    'title'       => 'Slide Show',
                    'type'        => 'dropdown',
                    'default'     => $slideShows->first()->attributes['id'],
                    'placeholder' => 'Select units',
                    'options'     => $optionsArray
                ]
            ];
        }
    }

    public function onRun()
    {
        $this->addJs('assets/jquery-3.1.1.min.js');
        $this->addJs('assets/slick/slick.min.js');
        $this->addCss('assets/slick/slick.css');
        $this->addCss('assets/slick/slick-theme.css');
    }

    // This array becomes available on the page as {{ component.slides }}
    public function slides()
    {
        $slideShowId = $this->property('slide_show_id');
        $slideShows = SlideShows::where('id', '=', $slideShowId)->first();
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
    }
}
