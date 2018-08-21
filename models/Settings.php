<?php namespace PeterHegman\SlickSlider\Models;

use Model;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // Unique code
    public $settingsCode = 'slick_slider_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';
}
