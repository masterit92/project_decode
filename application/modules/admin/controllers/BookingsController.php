<?php

class Admin_BookingsController extends FTeam_Controller_AdminAction {

    protected $model_bookings;

    public function init() {
        parent::init();
        $this->model_bookings = new Admin_Model_Bookings();
    }

    public function indexAction() {
        $arr_condition_where = array();
        $arr_condition_datetime = array();
        if ($this->getRequest()->isGet()) {
            $status = $this->_request->getParam('status', -1);
            $game = $this->_request->getParam('game', -1);
            $participants = $this->_request->getParam('participants', -1);
            $date_booking_start = $this->_request->getParam('date_booking_start', '');
            $date_log_start = $this->_request->getParam('date_log_start', '');
            $date_booking_end = $this->_request->getParam('date_booking_end', '');
            $date_log_end = $this->_request->getParam('date_log_end', '');
            $time_start = $this->_request->getParam('time_start', '');
            $time_end = $this->_request->getParam('time_end', '');
            if ($status > -1) {
                $arr_condition_where['b.booking_status'] = array($status, '=');
            }
            $this->view->status = $status;
            if ($game > 0) {
                $arr_condition_where['b.game_id'] = array($game, '=');
            }
            $this->view->game = $game;
            if ($participants > -1) {
                $arr_condition_where['b.participants'] = array($participants, '=');
            }
            $this->view->participants = $participants;
            if ($date_booking_start !== '' && $date_booking_end !== '') {
                $arr_condition_datetime['b.date'] = array(date('Y-m-d', strtotime($date_booking_start)), date('Y-m-d', strtotime($date_booking_end)));
            }
            $this->view->date_booking_start = $date_booking_start;
            $this->view->date_booking_end = $date_booking_end;
            if ($date_log_start !== '' && $date_log_end !== '') {
                $arr_condition_datetime['b.booking_log'] = array(strtotime($date_log_start), strtotime($date_log_end));
            }
            $this->view->date_log_start = $date_log_start;
            $this->view->date_log_end = $date_log_end;
            if ($time_start !== '' && $time_end !== '') {
                $arr_condition_datetime['b.booking_log'] = array(date('H:i', strtotime($time_start)), date('H:i', strtotime($time_end)));
            }
            $this->view->time_start = $time_start;
            $this->view->time_end = $time_end;
        }
        $model_game = new Admin_Model_Games();
        $list_bookings = $this->model_bookings->getListBooking($this->_request->getParam('page', 1), $arr_condition_where, $arr_condition_datetime);
        $row_count = $this->model_bookings->getCountRow($arr_condition_where, $arr_condition_datetime);
        $pagination = new FTeam_Paginator();
        $this->view->pagination = $pagination->createPaginator($row_count, $this->_paginator);
        $this->view->list_bookings = $list_bookings;
        $this->view->list_game = $model_game->getAllGames(1, 1, FALSE);
    }

    public function updateAction() {
        $booking_id = $this->_request->getParam('id',0);
        if($booking_id > 0){
            $booking = $this->model_bookings->getSingleBokking($booking_id);
            if(count($booking) > 0){
                $model_game = new Admin_Model_Games();
                $this->view->list_game = $model_game->getAllGames(1, 1, FALSE);
                $this->view->booking = $booking;
                if($this->getRequest()->isPost()){
                    $game = $this->_request->getParam('game',0);
                    $status = $this->_request->getParam('status',-1);
                    $id = $this->_request->getParam('id',-1);
                    $arr_data = array();
                    if($game > 0){
                        $arr_data['game_id'] = $game;
                    }
                    if($status > -1){
                        $arr_data['booking_status'] = $status;
                    }
                    $result = $this->model_bookings->updateBooking($id,$arr_data);
                    if($result){
                        $this->_helper->FlashMessenger()->setNamespace('success')->addMessage('updated successfully!');
                    }else{
                        $this->_helper->FlashMessenger()->setNamespace('fail')->addMessage('updated fail!');
                    }
                    $this->redirect('admin/bookings/update/id/'.$id);
                }
            }else{
                $this->_helper->redirector('index', 'bookings');
            }
        }else{
            $this->_helper->redirector('index', 'bookings');
        }
    }

    public function deleteAction() {
        if ($this->getRequest()->isPost()) {
            $list_bookings = $this->_request->getParam('cb_bookings',0);
            $result = $this->model_bookings->deleteBooking($list_bookings);
            if($result > 0){
                $this->_helper->FlashMessenger()->setNamespace('success')->addMessage('deleted successfully!');
            }else{
                $this->_helper->FlashMessenger()->setNamespace('fail')->addMessage('deleted fail!');
            }
        }
        $this->_helper->redirector('index', 'bookings');
    }

}
