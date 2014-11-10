<?php

class FTeam_Controller_AdminAction extends FTeam_Controller_Action
{

    protected $_paginator = array(
        'itemCountPerPage' => ITEM_COUNT_PER_PAGE,
        'pageRange' => PAGE_RANGE,
    );

    public function init()
    {
        $template_path = TEMPLATE_PATH . "/admin/default";
        $this->loadTemplate($template_path);
        $this->_paginator['currentPage'] = $this->_request->getParam('page', 1);
        $this->_arrParam = $this->_request->getParams();
        $this->_currentController = '/' . $this->_arrParam['module'] . '/' . $this->_arrParam['controller'];
        $this->view->currentController = $this->_currentController;
        $this->check_login();
        $this->check_permissions($this->_arrParam['controller']);
    }

    protected function check_login()
    {
        $this->changLanguages();
        $login = new Zend_Session_Namespace('login_admin');
        $user_info = $login->user_info;
        if (empty($user_info))
        {
            $this->_helper->redirector('index', 'system');
        }
    }
    protected function check_permissions($controler){
        $login = new Zend_Session_Namespace('login_admin');
        $user_info = $login->user_info;
        if($user_info['user_status'] == 1 && $controler !== 'bookings'){
            $this->redirect('admin/bookings');
        }
    }
}
