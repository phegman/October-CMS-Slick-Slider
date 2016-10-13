<?php namespace PeterHegman\SlickSlider;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{

    public function registerComponents()
    {
        return [
            'PeterHegman\SlickSlider\Components\Slider' => 'slider'
        ];
    }

    public function registerMarkupTags()
    {
        return [
            'functions' => [
                // Using an inline closure
                'numberToBoolean' => [$this, 'numberToBoolean']
            ]
        ];
    }

    public function numberToBoolean($number)
    {
        
        if ($number == 1) {
            return 'true';
        } else {
            return 'false';
        }
    }

    public function registerSettings()
    {
    }
}
