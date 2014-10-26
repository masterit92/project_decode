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
    }

    protected function check_login()
    {
        $this->changLanguages();
        $login = new Zend_Session_Namespace('login_admin');
        if (empty($login->user_info))
        {
            $this->_helper->redirector('index', 'system');
        }
    }

}
