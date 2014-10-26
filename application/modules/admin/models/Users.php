<?php

class Admin_Model_Users extends Zend_Db_Table
{

    protected $_name = 'tbl_users';
    protected $_primary = 'user_id';

    public function login($email, $pass)
    {
        $pass = Password_Generator($pass . $email);
        $where = "user_email = '$email' AND user_password = '$pass' AND user_status = 1";
        $column = array('user_id', 'user_email', 'user_name');
        $select = $this->select()
                ->from($this->_name, $column)
                ->where($where);
        $result = $this->fetchRow($select);
        if (count($result))
        {
            $result = $result->toArray();
        }
        return $result;
    }

    public function createToken($user_email)
    {
        $session_token = new Zend_Session_Namespace('ns_token');
        if (empty($session_token->token))
        {
            $token = sha1(md5(rand(999999, 99999999999) . '_' . date('Ymdhs') . $user_email));
            $session_token->token = $token;
            $session_token->lock();
            Zend_Registry::set('token', $token);
        }
    }

}
