<?php

class Admin_UsersController extends FTeam_Controller_AdminAction
{

    public function init()
    {
        parent::init();
    }

    public function indexAction()
    {
        $paginator = new FTeam_Paginator();
        $totalItem = 20;
       $this->view->panigator = $paginator->createPaginator($totalItem, $this->_paginator);
    }

}
