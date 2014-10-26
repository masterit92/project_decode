<?php

class Admin_SystemController extends FTeam_Controller_Action
{

    public function init()
    {
        parent::init();
        $template_path = TEMPLATE_PATH . "/admin/login";
        $this->loadTemplate($template_path);
    }

    public function indexAction()
    {
        $login = new Zend_Session_Namespace('login_admin');
        if (!empty($login->user_info))
        {
            $this->_helper->redirector('index', 'index');
        }
        
        if ($this->getRequest()->isPost())
        {
            $email_validate = array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_EmailAddress()
            );

            $arr_messages = array(
                'email' => array(
                    Zend_Validate_NotEmpty::IS_EMPTY => 'email not empty',
                    Zend_Validate_EmailAddress::INVALID_FORMAT => 'email is not a valid email address'
                ),
                'password' => array(
                    Zend_Validate_NotEmpty::IS_EMPTY => 'password not empty'
                )
            );
            $arr_validate = array(
                'email' => $email_validate,
                'password' => new Zend_Validate_NotEmpty()
            );

            $validate = new FTeam_Validate_MyValidate();
            if ($validate->isValid($arr_validate, $arr_messages))
            {
                $login_user = new Admin_Model_Users();
                $arr_value = $validate->getValue();
                $result = $login_user->login($arr_value['email'], $arr_value['password']);
                if (count($result) > 0)
                {
                    $login = new Zend_Session_Namespace('login_admin');
                    $login->user_info = $result;
                    $login->lock();
                    $login_user->createToken($arr_value['email']);
                    $this->_helper->redirector('index', 'index');
                }else{
                     $this->view->messages = __('email or password not correct');
                }
            }
            else
            {
                $this->view->messages = $validate->getMessages();
                $this->view->value = $validate->getValue();
            }
        }
    }
    public function logoutAction()
    {
        $login = new Zend_Session_Namespace('login_admin');
        $login->unsetAll();
        $this->_helper->redirector('index', 'system');
    }

}
