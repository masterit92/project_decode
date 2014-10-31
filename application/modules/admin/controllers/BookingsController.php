<?php

class Admin_BookingsController extends FTeam_Controller_AdminAction{
    protected $model_bookings;

    public function init() {
        parent::init();
        $this->model_bookings = new Admin_Model_Bookings();
    }
    public function indexAction(){
        $model_game = new Admin_Model_Games();
        $list_bookings = $this->model_bookings->getListBooking($this->_request->getParam('page',1));
        $row_count = $this->model_bookings->getCountRow();
        $pagination = new FTeam_Paginator();
        $this->view->pagination = $pagination->createPaginator($row_count, $this->_paginator);
        $this->view->list_bookings = $list_bookings; 
        $this->view->list_game = $model_game->getAllGames(1, 1, FALSE);
    }
    public function bookingAction(){
        
    }
}
