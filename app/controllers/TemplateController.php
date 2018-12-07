<?php
/**
 * Created by PhpStorm.
 * User: Seth Phat
 * Date: 12/6/2018
 * Time: 4:20 PM
 */
//use app\models\VueForm;

class TemplateController extends BaseController
{
    public function indexAction() {
        $this->renderView('template/index');
    }
}