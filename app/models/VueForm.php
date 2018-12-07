<?php
/**
 * Created by PhpStorm.
 * User: Seth Phat
 * Date: 12/6/2018
 * Time: 5:25 PM
 */
//namespace app\models;
use Phalcon\Mvc\Model;

class VueForm extends Model
{
    // properties
    public $ID;
    public $Title;
    public $Version;
    public $CreatedDate;
    public $ModifiedDate;

    // methods
    public function initialize()
    {
        $this->setSource('VueForm');
        $this->skipAttributesOnCreate(
            [
                "ID",
            ]
        );
        $this->hasMany('ID',VueFormData::class,'VueFormID');
    }
}