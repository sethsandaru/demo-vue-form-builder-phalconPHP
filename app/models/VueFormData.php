<?php
/**
 * Created by PhpStorm.
 * User: Seth Phat
 * Date: 12/6/2018
 * Time: 5:32 PM
 */

use Phalcon\Mvc\Model;

class VueFormData extends Model
{
    // properties
    protected $ID;
    protected $VueFormID;
    protected $Version;
    protected $Data;

    // methods
    public function initialize()
    {
        $this->setSource('VueFormData');
        $this->skipAttributesOnCreate(
            [
                "ID",
            ]
        );
        $this->belongsTo("VueFormID", VueForm::class, "ID");
    }

    // getter
    public function getID() {
        return $this->ID;
    }

    public function getVueFormID() {
        return $this->VueFormID;
    }

    public function getVersion() {
        return $this->Version;
    }

    public function getData($parse_json = false) {
        if ($parse_json) {
            return json_decode($this->Data);
        }
        return $this->Data;
    }

    // setter
    public function setVueFormID($val) {
        $this->VueFormID = $val;
        return $this;
    }

    public function setVersion($val) {
        $this->Version = $val;
        return $this;
    }

    public function setData($val) {
        $this->Data = $val;
        return $this;
    }
}