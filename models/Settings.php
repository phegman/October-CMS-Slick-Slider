<?php namespace peterhegman\slickslider\Models;

use Model;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'slick_slider_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';
}
