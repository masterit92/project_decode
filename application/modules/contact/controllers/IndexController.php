<?php

class Contact_IndexController extends FTeam_Controller_Action
{

    protected $class_body = 'contact';

    public function init()
    {
        parent::init();
    }

    public function indexAction()
    {
        $option = new Admin_Model_Options();
        $this->view->options_contact_add = $option->get_options_fontend(CONTACT_ADDRESS);
        $this->view->options_contact_email = $option->get_options_fontend(CONTACT_EMAIL);
        $this->view->options_contact_phone = $option->get_options_fontend(CONTACT_PHONE);
        $this->view->options_contact_facebook = $option->get_options_fontend(CONTACT_FACEBOOK);
        if($this->_request->isPost()) {
            $errors = array();
            $validate = new Zend_Validate_NotEmpty();
            if(!$validate->isValid($this->_request->getParam('contacts_ten'))){
                $errors[] = "firstname is not empty";
            }
            if(!$validate->isValid($this->_request->getParam('contacts_email'))){
                $errors[] = "email is not empty";
            }
            if(!$validate->isValid($this->_request->getParam('contacts_tinnhan'))){
                $errors[] = "msg is not empty";
            }

            if(count($errors) > 0) {
                $this->view->items = $errors;
            } else {
                $data = array(
                    'contacts_ho' => $this->_request->getParam('contacts_ho'),
                    'contacts_ten' => trim($this->_request->getParam('contacts_ten')),
                    'contacts_diachi' => $this->_request->getParam('contacts_diachi'),
                    'contacts_email' => $this->_request->getParam('contacts_email'),
                    'contacts_tinnhan' => $this->_request->getParam('contacts_tinnhan'),
                );
                $faqModel = new Contact_Model_Test();
                $faqModel->saveFaqs($data);
                $this->_helper->redirector('index', 'contact');
            }

        }
    }
}
