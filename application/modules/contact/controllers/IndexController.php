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
            $email_vail = new Zend_Validate_EmailAddress();
            if(!$validate->isValid($this->_request->getParam('first_name'))){
                $errors[] = __("first name is not empty");
            }
            if(!$validate->isValid($this->_request->getParam('last_name'))){
                $errors[] = __("last name is not empty");
            }
            if(!$validate->isValid($this->_request->getParam('email'))){
                $errors[] = __("email is not empty");
            }
            if(!$email_vail->isValid($this->_request->getParam('email'))){
                $errors[] = __("email not format email.");
            }
            if(!$validate->isValid($this->_request->getParam('mesages'))){
                $errors[] = __("mesages is not empty");
            }
            if(count($errors) > 0) {
                $this->view->error = $errors;
            } else {
                $send_mail = new FTeam_SendMail();
                $email = $this->_request->getParam('email');
                $last_name = $this->_request->getParam('last_name');
                $first_name = $this->_request->getParam('first_name');
                $mess = $this->_request->getParam('mesages');
                $title = 'Contact';
                $html = "Contact". date('d-m-Y',  strtotime('now')). "<br/>"
                        . "Name: $first_name  $last_name" . '<br/>'
                        . "SĐT: {$this->_request->getParam('phone')} <br/>"
                        . "Messgaes: $mess" ;
                $send_mail->send_mail($email, $title, $html);
                $this->_helper->FlashMessenger()->setNamespace('success')->addMessage('contact success');
                $this->redirect('/');
            }
        }
    }
}
