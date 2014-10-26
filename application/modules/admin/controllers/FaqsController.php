<?php

class Admin_FaqsController extends FTeam_Controller_AdminAction {

    protected $model_faqs;

    public function init() {
        parent::init();
        $this->model_faqs = new Admin_Model_Faqs();
    }

    public function indexAction() {
       $pagination = new FTeam_Paginator();
       $this->view->pagination = $pagination->createPaginator($this->model_faqs->getCountRow(), $this->_paginator);
       $this->view->faqs = $this->model_faqs->getFaqs($this->_request->getParam('page',1));
    }

    public function editAction() {
        $id = $this->_request->getParam('id', 0);
        if ($id) {
            $this->view->items = $this->model_faqs->getById($id);
        }
    }
    public function addAction() {
        
    }
    public function saveAction() {

        if ($this->_request->isPost()) {
            $error = array();
            $validate = new Zend_Validate_NotEmpty();
            $val_num = new Zend_Validate_Int();
            if (!$validate->isValid($this->_request->getParam('faq_question'))) {
                $error[]= "Question not empty";
            }
            if (!$validate->isValid($this->_request->getParam('faq_answer'))) {
                $error[] = 'Answer not empty';
            }
            if (!$validate->isValid($this->_request->getParam('faq_status'))) {
                $error[] = 'Status not empty';
            }
            if(!$val_num->isValid($this->_request->getParam('faq_sort'))){
                $error[] = 'Position is numberic';
            }
            $id = $this->_request->getParam('id',0);
            if (count($error) > 0) {
                foreach ($error as $err){
                    $this->_helper->FlashMessenger()->setNamespace('fail')->addMessage($err . '<br/>');
                }
                if ($id > 0) {
                   $this->_redirect("admin/faqs/edit/id/$id");
                }
                else{
                    $this->_redirect("admin/faqs/add");
                }
            } else {
                if ($id > 0) {
                    $data = array(
                        'faq_question' => $this->_request->getParam('faq_question'),
                        'faq_answer' => trim($this->_request->getParam('faq_answer')),
                        'faq_status' => $this->_request->getParam('faq_status'),
                        'faq_order' => $this->_request->getParam('faq_sort'),
                        'faq_lang' => $this->languages
                    );
                    $result= $this->model_faqs->saveFaqs($data,$id);
                    if($result > 0){
                        $this->_helper->FlashMessenger()->setNamespace('success')->addMessage('updated successfully!');
                    }else{
                        $this->_helper->FlashMessenger()->setNamespace('fail')->addMessage('updated fail!'); 
                    }
                    $this->_redirect("admin/faqs/edit/id/$id");
                } else {
                    $data = array(
                        'faq_question' => $this->_request->getParam('faq_question'),
                        'faq_answer' => trim($this->_request->getParam('faq_answer')),
                        'faq_status' => $this->_request->getParam('faq_status'),
                        'faq_order' => $this->_request->getParam('faq_sort'),
                        'faq_lang' => $this->languages
                    );
                    $result= $this->model_faqs->saveFaqs($data);
                    if($result){
                        $this->_helper->FlashMessenger()->setNamespace('success')->addMessage('add successfully!');
                    }else{
                        $this->_helper->FlashMessenger()->setNamespace('fail')->addMessage('add fail!'); 
                    }
                    $this->_redirect("admin/faqs/add");
                }
            }
        }
    }

    public function deleteAction() {
        $id = $this->_request->getParam('id',0);
        if ($id) {
            $result = $this->model_faqs->deleteFaqs($id);
            if ($result) {
                $this->_helper->FlashMessenger()->setNamespace('success')->addMessage('delete successfully!');
            } else {
                $this->_helper->FlashMessenger()->setNamespace('fail')->addMessage('delete fail!');
            }
        }
        $this->_helper->redirector('index', 'faqs');
    }

    public function updatestatusAction() {
        $faq_id = $this->getRequest()->getParam('id', 0);
        $status = $this->getRequest()->getParam('status', -1);
        $result = $this->model_faqs->update_status_faq($faq_id, $status);
        if ($result) {
            $this->_helper->FlashMessenger()->setNamespace('success')->addMessage('updated successfully!');
        } else {
            $this->_helper->FlashMessenger()->setNamespace('fail')->addMessage('updated fail!');
        }
        $this->_helper->redirector('index', 'faqs');
    }

}
