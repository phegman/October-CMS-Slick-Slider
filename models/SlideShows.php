<?php namespace PeterHegman\SlickSlider\Models;

use Model;
use Input;
use BackendAuth;
use Log;
use peterhegman\slickslider\Models\Settings;

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
    /**
      * Softly implement the TranslatableModel behavior.
      */
    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];
    /*
     * @var array Attributes that support translation, if available.
     */
    public $translatable = ['slide_show_content'];

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

    /**
     * Generate a URL slug for this model
     */
    public function beforeCreate()
    {
        $backendUser = BackendAuth::getUser();
        $isSuperUser = $backendUser->is_superuser;
        if (!$backendUser->hasPermission([
            'peterhegman.slickslider.manage_slide_shows'
        ]) && !$isSuperUser) {
            $defaultFields = Settings::instance()->toArray();
            $defaultValues = [
                'autoplay' => '0',
                'accessibility' => '1',
                'arrows' => '1',
                'adaptive_height' => '0',
                'center_mode' => '0',
                'dots' => '0',
                'draggable' => '1',
                'fade' => '0',
                'focus_on_select' => '0',
                'pause_on_focus' => '1',
                'pause_on_dots_hover' => '1',
                'pause_on_hover' => '1',
                'infinite' => '1',
                'swipe' => '1',
                'touch_move' => '1',
                'use_transform' => '1',
                'use_css' => '1',
                'vertical' => '0',
                'vertical_swiping' => '0',
                'rtl' => '0',
                'wait_for_animate' => '1',
                'include_jquery' => '1',
                'autoplay_speed' => '3000',
                'slide_show_height' => '500px',
                'prev_arrow' => '<button type="button" class="slick-prev">Previous</button>',
                'next_arrow' => '<button type="button" class="slick-next">Next</button>',
                'center_padding' => '50px',
                'css_ease' => 'ease',
                'easing' => 'linear',
                'edge_friction' => '0.15',
                'initial_slide' => '0',
                'lazy_load' => 'ondemand',
                'rows' => '1',
                'slides_per_row' => '1',
                'slides_to_show' => '1',
                'slides_to_scroll' => '1',
                'speed' => '300',
                'touch_threshold' => '5',
                'z_index' => '1000',
                'responsive' => array (
                ),
            ];
            $notFields = [
                'id',
                'item',
                'value'
            ];
            if (empty($defaultFields)) {
                foreach ($defaultValues as $key => $defaultValue) {
                    $this->$key = $defaultValue;
                }
            } else {
                foreach ($defaultFields as $key => $defaultField) {
                    if (!in_array($key, $notFields)) {
                        $this->$key = $defaultField;
                    }
                }
            }
        }
    }
}
