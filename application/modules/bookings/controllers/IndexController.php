<?php

class Bookings_IndexController extends FTeam_Controller_Action {

    protected $class_body = 'booking';

    public function init() {
        parent::init();
    }

    public function indexAction() {
        $game_model = new Admin_Model_Games();
        $pagination = new FTeam_Paginator();
        $price_model = new Admin_Model_Prices();
        $this->view->pagination = $pagination->createPaginator($game_model->getCountRow(), $this->_paginator);
        $this->view->list_game = $game_model->getAllGames($this->_request->getParam('page', 1), 1);
        $this->view->list_price = $price_model->getAllPrices(1);
    }

    public function bookingAction() {
        $id_game = $this->_request->getParam('id', 0);
        if ($id_game > 0) {
            $game_model = new Admin_Model_Games();
            $time_model = new Admin_Model_Times();
            $bookings_model = new Bookings_Model_Bookings();
            $game = $game_model->getSingleGame($id_game);
            if (count($game) > 0) {
                $this->view->game = $game;
                $this->view->list_time = $time_model->getAllTimes(1, 1, FALSE);
                $list_wekk_date =  $this->getWeekDate();
                $this->view->week_date = $list_wekk_date;
                $this->view->list_bookings = $bookings_model->getBookingsCurentDateTime($list_wekk_date[__('Mon')], $list_wekk_date[__('Sun')]);
                $this->view->class_body = 'booking-detail';
            } else {
                $this->redirect('bookings');
            }
        } else {
            $this->redirect('bookings');
        }
    }
    public function weektimeAction(){
        $this->_helper->layout()->disableLayout();
        $date = $this->_request->getParam('date','now');
        $action = $this->_request->getParam('action_event','next');
        $time_model = new Admin_Model_Times();
        $bookings_model = new Bookings_Model_Bookings();
        $this->view->list_time = $time_model->getAllTimes(1, 1, FALSE);
        $list_wekk_date =  $this->getWeekDate($date,$action);
        $this->view->week_date = $list_wekk_date;
        $this->view->list_bookings = $bookings_model->getBookingsCurentDateTime($list_wekk_date[__('Mon')], $list_wekk_date[__('Sun')]);
    }

    protected function getWeekDate($date = 'now',$action='next') {
        $arr_date_key = array(
            __('Mon'),
            __('Tue'),
            __('Wed'),
            __('Thu'),
            __('Fri'),
            __('Sat'),
            __('Sun')
        );
        $arr_date = array();
        if($action === 'next' && $date !== 'now' ){
            $date.='+1 day';
        }
        else if($date !== 'now' && $action === 'prev'){
            $date.='-1 day';
        }
        $ts = strtotime($date);
        $year = date('o', $ts);
        $week = date('W', $ts);
        for ($i = 1; $i <= 7; $i++) {
            $ts = strtotime($year . 'W' . $week . $i);
            $arr_date[$arr_date_key[$i - 1]] = date('m/d/Y', $ts);
        }
        return $arr_date;
    }

}
