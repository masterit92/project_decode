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
                $list_wekk_date = $this->getWeekDate();
                $this->view->week_date = $list_wekk_date;
                $this->view->list_bookings = $bookings_model->getBookingsCurentDateTime($list_wekk_date[__('Mon')], $list_wekk_date[__('Sun')], $id_game);
                $this->view->class_body = 'booking-detail';
            } else {
                $this->redirect('bookings');
            }
        } else {
            $this->redirect('bookings');
        }
    }

    public function weektimeAction() {
        $this->_helper->layout()->disableLayout();
        $date = $this->_request->getParam('date', 'now');
        $action = $this->_request->getParam('action_event', 'next');
        $game_id = $this->_request->getParam('game_id', 0);
        if (!$game_id) {
            echo 'false';
            exit();
        }
        $time_model = new Admin_Model_Times();
        $bookings_model = new Bookings_Model_Bookings();
        $this->view->list_time = $time_model->getAllTimes(1, 1, FALSE);
        $list_wekk_date = $this->getWeekDate($date, $action);
        $this->view->week_date = $list_wekk_date;
        $this->view->list_bookings = $bookings_model->getBookingsCurentDateTime($list_wekk_date[__('Mon')], $list_wekk_date[__('Sun')], $game_id);
    }

    public function infobokingAction() {
        $this->_helper->layout()->disableLayout();
        $game_id = $this->_request->getParam('game_id', 0);
        $date = $this->_request->getParam('date_data', 0);
        $time = $this->_request->getParam('time_data', 0);
        $weekend = $this->_request->getParam('weekend', 0);
        if ($time && $game_id && $date) {
            $arr_data = array(
                'game_id' => $game_id,
                'date' => $date,
                'time' => $time
            );
            $price_code = 'OFF_PEAK';
            if ($weekend > 0) {
                $price_code = 'WEEKEND';
            } else if (strtotime($time) < strtotime(TIME_PRICE)) {
                $price_code = 'OFF_PEAK';
            } else {
                $price_code = 'EVENING';
            }
            $price_model = new Admin_Model_Prices();
            $this->view->price = $price_model->getPriceForTime($price_code);
            $this->view->arrData = $arr_data;
        } else {
            echo 'false';
            exit();
        }
    }

    public function addbookingAction() {
        $this->_helper->layout()->disableLayout();
        if ($this->_request->isPost()) {
            $arr_validate = array(
                'first_name' => new Zend_Validate_NotEmpty(),
                'contact_no' => new Zend_Validate_NotEmpty(),
                'last_name' => new Zend_Validate_NotEmpty()
            );
            $gender = $this->_request->getParam('gender', -1);
            $participants = $this->_request->getParam('participants', 0);
            $game_id = $this->_request->getParam('game_id', 0);
            $time = $this->_request->getParam('time', 0);
            $date = $this->_request->getParam('date', 0);
            $total_price = $this->_request->getParam('txt_total_price', 0);
            $email = $this->_request->getParam('email', '');
            $validate = new FTeam_Validate_MyValidate();
            if ($validate->isValid($arr_validate) && $gender > -1 && $participants > 1 && $game_id && $time && $date && $total_price) {
                $arr_data = $validate->getValue();
                $arr_data['gender'] = $gender;
                $arr_data['game_id'] = $game_id;
                $arr_data['date'] = date('Y-m-d', strtotime($date));
                $arr_data['time'] = $time;
                $arr_data['total_price'] = $total_price;
                $arr_data['email'] = $email;
                $arr_data['booking_log'] = strtotime('now');
                $email_validate = new Zend_Validate_EmailAddress();
                if (!$email_validate->isValid($email)) {
                    $email = EMAIL_INFO;
                }
                //view
                $this->_helper->layout->disableLayout();
                $this->view->arr_data = $arr_data;
                $this->view->setScriptPath(APPLICATION_PATH . '/modules/bookings/views/scripts/index');
                $html = $this->view->render('emailtemplate.phtml');
                //send mail
                $send_mail = new FTeam_SendMail();
                $send_mail->send_mail($email, 'Booking', $html);
                $arr_data['booking_status'] = 0;
                $booking_model = new Bookings_Model_Bookings();
                $result = $booking_model->addBooking($arr_data);
                if ($result) {
                    $this->_helper->FlashMessenger()->setNamespace('success')->addMessage('booking success');
                } else {
                    $this->_helper->FlashMessenger()->setNamespace('fail')->addMessage('booking fail');
                }
            } else {
                $this->_helper->FlashMessenger()->setNamespace('fail')->addMessage('booking fail');
            }
        }
        $this->redirect('bookings');
    }

    protected function getWeekDate($date = 'now', $action = 'next') {
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
        if ($action === 'next' && $date !== 'now') {
            $date.='+1 day';
        } else if ($date !== 'now' && $action === 'prev') {
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
