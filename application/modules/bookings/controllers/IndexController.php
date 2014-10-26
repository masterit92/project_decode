<?php

class Bookings_IndexController extends FTeam_Controller_Action
{

    protected $class_body = 'booking';

    public function init()
    {
        parent::init();
    }
    
    public function indexAction()
    {
        $game_model = new Admin_Model_Games();
        $pagination = new FTeam_Paginator();
        $price_model = new Admin_Model_Prices();
        $this->view->pagination = $pagination->createPaginator($game_model->getCountRow(), $this->_paginator);
        $this->view->list_game = $game_model->getAllGames($this->_request->getParam('page',1), 1);
        $this->view->list_price = $price_model->getAllPrices(1);
    }
    public function bookingAction(){
        $id_game = $this->_request->getParam('id',0);
        if($id_game > 0){
            $game_model = new Admin_Model_Games();
            $time_model = new Admin_Model_Times();
            $this->view->game = $game_model->getSingleGame($id_game);
            $this->view->list_time = $time_model->getAllTimes(1, 1, FALSE);
            $this->view->class_body = 'booking-detail';
        }else{
            $this->redirect('bookings');
        }
    }
}