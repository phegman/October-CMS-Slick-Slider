<?php namespace PeterHegman\SlickSlider\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class SlideShows extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController'];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'peterhegman.slickslider.manage_slide_shows'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('PeterHegman.SlickSlider', 'slide_shows');
    }
}
