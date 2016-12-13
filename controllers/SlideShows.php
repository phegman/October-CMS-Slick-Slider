<?php namespace PeterHegman\SlickSlider\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use BackendAuth;

class SlideShows extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController'];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'peterhegman.slickslider.*'
    ];

    public function formExtendFields($form)
    {
        $backendUser = BackendAuth::getUser();
        $isSuperUser = $backendUser->is_superuser;
        $fieldsToRemove = $this->formGetWidget()
        ->getTab('primary')
        ->fields['peterhegman.slickslider::lang.slickslider.settings'];
        //dd($fieldsToRemove);
        if (!$this->user->hasPermission([
            'peterhegman.slickslider.manage_slide_shows'
        ]) && !$isSuperUser) {
            foreach ($fieldsToRemove as $fieldToRemove) {
                $form->removeField($fieldToRemove->fieldName);
            }
        }
    }

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('PeterHegman.SlickSlider', 'slide_shows');
    }
}
