<?php

class Admin_IndexController extends FTeam_Controller_AdminAction
{

    public function init()
    {
        parent::init();
    }

    public function indexAction()
    {
        $this->_helper->redirector('index', 'settings');
    }

}
