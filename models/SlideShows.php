<?php namespace PeterHegman\SlickSlider\Models;

use Model;
use Input;

/**
 * Model
 */
class SlideShows extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Validation
     */
    public $rules = [

    ];

    public $customMessages = [
    ];

    public function afterValidate()
    {
        $numeric_fields = [
            'autoplay_speed'    =>  'Autoplay Speed',
            'edge_friction'     =>  'Edge Friction',
            'initial_slide'     =>  'Initial Slide',
            'rows'              =>  'Rows',
            'slides_per_row'    =>  'Slides Per Row',
            'slides_to_show'    =>  'Slides To Show',
            'slides_to_scroll'  =>  'Slides To Scroll',
            'speed'             =>  'Speed',
            'touch_threshold'   =>  'Touch Threshold',
            'z_index'           =>  'z-index',

        ];
        foreach ($numeric_fields as $numeric_field => $numeric_field_label) {
            $field_value = Input::get('SlideShows.' . $numeric_field);
            if (!is_numeric($field_value) && $field_value != '') {
                throw new \ValidationException(['not_numeric' =>  $numeric_field_label . ' needs to be a number']);
            }
        }

        $breakpoints = Input::get('SlideShows.responsive');
        $numeric_repeater_fields = [
            'responsive_rows'               =>  'Breakpoint Rows',
            'responsive_slides_per_row'     =>  'Breakpoint Slides Per Row',
            'responsive_slides_to_show'     =>  'Breakpoint Slides to Show',
            'responsive_slides_to_scroll'   =>  'Breakpoint Slides to Scroll'
        ];
        if ($breakpoints) {
            foreach ($breakpoints as $breakpoint) {
                if (!is_numeric($breakpoint['breakpoint']) && $breakpoint['breakpoint'] != '') {
                    throw new \ValidationException(['not_numeric' =>  'Breakpoint needs to be a number']);
                }
                if ($breakpoint['breakpoint'] == '') {
                    throw new \ValidationException(['required' =>  'Breakpoint is required']);
                }

                foreach ($numeric_repeater_fields as $numeric_repeater_field => $numeric_repeater_field_label) {
                    $repeater_field_value = $breakpoint[$numeric_repeater_field];
                    if (!is_numeric($repeater_field_value) && $repeater_field_value != '') {
                        throw new \ValidationException(['not_numeric' =>  $numeric_repeater_field_label . ' needs to be a number']);
                    }
                }
            }
        }
    }

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'peterhegman_slickslider_slide_shows';

    protected $jsonable = ['slide_show_content', 'responsive'];
}
