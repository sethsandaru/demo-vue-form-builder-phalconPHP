<?php
/**
 * Created by PhpStorm.
 * User: Seth Phat
 * Date: 12/7/2018
 * Time: 11:54 AM
 */
use Phalcon\Http\Request;

class VueFormAPIController extends BaseController
{
    public function getFormDataAction() {
        $rq = new Request();
        if (!$rq->isAjax()) {
            echo "Only allowed Ajax Request";
            return;
        }

        // get id
        $id = $this->dispatcher->getParam('form_id');

        // ok find
        $form = VueForm::findFirst($id);
        if (empty($form)) {
            return $this->json(['error' => 'form_not_existed']);
        }

        $last_data = $form->vueFormData->getLast();

        return $this->json([
            'Title' => $form->Title,
            'Version' => $form->Version,
            'Data' => $last_data->getData()
        ]);
    }

    public function getAllFormAction() {
        $rq = new Request();
        if (!$rq->isAjax()) {
            echo "Only allowed Ajax Request";
            return;
        }

        $allForm = VueForm::query()->execute();
        $result = [];
        foreach ($allForm as $form) {
            $result[] = [
                'id' => $form->ID,
                'text' => $form->Title,
                'version' => $form->Version,
            ];
        }

        return $this->json($result);
    }

    public function insertFormAction() {
        $rq = new Request();
        if (!$rq->isAjax()) {
            echo "Only allowed Ajax Request";
            return;
        }

        // time
        $now = date($this->config->site_info->date_format);

        // create a new vue form config
        $form = new VueForm();
        $form->Title = $rq->getPost('title');
        $form->Version = 1;
        $form->CreatedDate = $now;
        $form->ModifiedDate = $now;

        if ($form->save() === false) {
            return $this->_parse_error($form->getMessages());
        }

        // ok, we insert the VueFormData
        $formData = new VueFormData();
        $formData->setVueFormID($form->ID)
                ->setVersion(1)
                ->setData($rq->getPost('formData'))
                ->save();

        return $this->json(['success' => 'Insert success']);
    }

    public function updateFormAction() {
        $rq = new Request();
        if (!$rq->isAjax()) {
            echo "Only allowed Ajax Request";
            return;
        }

        // get id
        $id = $this->dispatcher->getParam('form_id');

        // ok find
        $form = VueForm::findFirst($id);
        if (empty($form)) {
            return $this->json(['error' => 'form_not_existed']);
        }

        // ok edit now
        $form->Title = $rq->getPost('title');
        $form->Version++;
        $form->ModifiedDate = date($this->config->site_info->date_format);
        $form->save();

        // now insert a brand new vue form data version
        $formData = new VueFormData();
        $formData->setVueFormID($form->ID)
            ->setVersion($form->Version)
            ->setData($rq->getPost('formData'))
            ->save();

        return $this->json(['success' => 'Update success']);
    }

    private function _parse_error($errors){
        $mess = "";
        foreach ($errors as $message) {
            $mess .= $message . "\n";
        }

        return $this->json(['error' => $mess]);
    }
}