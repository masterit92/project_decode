<?php

class Admin_SystemController extends FTeam_Controller_Action {

    public function init() {
        parent::init();
        $template_path = TEMPLATE_PATH . "/admin/login";
        $this->loadTemplate($template_path);
    }

    public function indexAction() {
        $login = new Zend_Session_Namespace('login_admin');
        if (!empty($login->user_info)) {
            $this->_helper->redirector('index', 'index');
        }

        if ($this->getRequest()->isPost()) {
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
            if ($validate->isValid($arr_validate, $arr_messages)) {
                $login_user = new Admin_Model_Users();
                $arr_value = $validate->getValue();
                $result = $login_user->login($arr_value['email'], $arr_value['password']);
                if (count($result) > 0) {
                    $login = new Zend_Session_Namespace('login_admin');
                    $login->user_info = $result;
                    $login->lock();
                    $login_user->createToken($arr_value['email']);
                    $this->_helper->redirector('index', 'index');
                } else {
                    $this->view->messages = __('email or password not correct');
                }
            } else {
                $this->view->messages = $validate->getMessages();
                $this->view->value = $validate->getValue();
            }
        }
    }

    public function logoutAction() {
        $login = new Zend_Session_Namespace('login_admin');
        $login->unsetAll();
        $this->_helper->redirector('index', 'system');
    }

    public function profileAction() {
        if ($this->getRequest()->isPost()) {
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
                ),
                're_password' => array(
                    Zend_Validate_NotEmpty::IS_EMPTY => 're-password not empty'
                ),
                'new_password' => array(
                    Zend_Validate_NotEmpty::IS_EMPTY => 'new-password not empty'
                ),
            );
            $arr_validate = array(
                'email' => $email_validate,
                'password' => new Zend_Validate_NotEmpty(),
                're_password' => new Zend_Validate_NotEmpty(),
                'new_password' => new Zend_Validate_NotEmpty(),
            );

            $validate = new FTeam_Validate_MyValidate();
            if ($validate->isValid($arr_validate, $arr_messages)) {
                $value = $validate->getValue();
                $email = $value['email'];
                $pass = $value['password'];
                $new_pass = $value['new_password'];
                $re_pass = $value['re_password'];
                if (strcmp($new_pass, $re_pass) === 0) {
                    $login_user = new Admin_Model_Users();
                    $check = $login_user->login($email, $pass);
                    if (count($check) > 0) {
                        $arr_data = array(
                            'user_password' => Password_Generator($new_pass . $email)
                        );
                        $result = $login_user->updateProfile($email, $arr_data);
                        if ($result) {
                            $this->redirect('/admin/system/logout');
                        } else {
                            $this->view->messages = array(
                                'fail' => array(__('Update fail'))
                            );
                        }
                    } else {
                        $this->view->messages = array(
                            'error' => array(__('email or password not correct'))
                        );
                    }
                } else {
                    $this->view->messages = array(
                        'equel' => array(__('password and re-password is same'))
                    );
                }
            } else {
                $this->view->messages = $validate->getMessages();
            }
        }
    }

    public function forgotAction() {
        if ($this->getRequest()->isPost()) {
            $email_validate = array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_EmailAddress()
            );

            $arr_messages = array(
                'email' => array(
                    Zend_Validate_NotEmpty::IS_EMPTY => 'email not empty',
                    Zend_Validate_EmailAddress::INVALID_FORMAT => 'email is not a valid email address'
                )
            );
            $arr_validate = array(
                'email' => $email_validate
            );

            $validate = new FTeam_Validate_MyValidate();
            if ($validate->isValid($arr_validate, $arr_messages)) {
                $user_model = new Admin_Model_Users();
                $value = $validate->getValue();
                $email = $value['email'];
                $check = $user_model->checkEmailExits($email);
                if (count($check) > 0) {
                    $send_mail = New FTeam_SendMail();
                    $title = "DECODE for got password";
                    $new_pass = sha1(md5(rand(999, 99999) . '_' . date('Ymdhs') . $email));
                    $html = __("new-password") . " : $new_pass";
                    $arrData = array(
                        'user_password' => Password_Generator($new_pass . $email)
                    );
                    $result = $user_model->updateProfile($email, $arrData);
                    if ($result > 0) {
                        $send_mail->send_mail($email, $title, $html);
                        $this->view->messages = array(
                            'success' => array(__('send for got password success'))
                        );
                    } else {
                        $this->view->messages = array(
                            'fail' => array(__('Update fail'))
                        );
                    }
                } else {
                    $this->view->messages = array(
                        'error' => array(__('email not correct'))
                    );
                }
            } else {
                $this->view->messages = $validate->getMessages();
            }
        }
    }

}
