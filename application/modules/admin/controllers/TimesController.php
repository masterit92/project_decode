<?php
/**
 *TrangVT
 */
class Admin_TimesController extends FTeam_Controller_AdminAction
{
    protected $_timeModel;

    public function init()
    {
        parent::init();
        $this->_timeModel = new Admin_Model_Times();
    }
    /*
     * get times collection
     */
    public function indexAction(){
        $all_time = $this->_timeModel->getAllTimes($this->_request->getParam('page',1));
        $totalItem = $this->_timeModel->getCountRow();
        $pagination = new FTeam_Paginator();
        $this->view->pagination = $pagination->createPaginator($totalItem, $this->_paginator);
        $this->view->timesCollection = $all_time;
    }
    /*
     * update status
     */
    public function updatestatusAction(){
        $option_id = $this->getRequest()->getParam('id', 0);
        $status = $this->getRequest()->getParam('status', -1);
        $result = $this->_timeModel->statusUpdate($option_id, $status);
        if ($result){
            $this->_helper->FlashMessenger()->setNamespace('success')->addMessage('updated successfully!');
        }
        else{
            $this->_helper->FlashMessenger()->setNamespace('fail')->addMessage('updated fail!');
        }
        $this->_helper->redirector('index', 'times');
    }
    /*
     * update or insert action
     */
    public function updateAction(){
        if($this->getRequest()->isPost()){
            //has request
            $arr_messages = array(
                'time' => array(
                    Zend_Validate_NotEmpty::IS_EMPTY => 'time is not empty!'
                )
            );
            $arr_validate = array(
                'time' => new Zend_Validate_NotEmpty()
            );
            $validate = new FTeam_Validate_MyValidate();
            if ($validate->isValid($arr_validate, $arr_messages)){
                //passed validate
                $request = $this->getRequest()->getParams();

                $time_id = $request['time_id'];
                $time_status = $request['time_status'];
                $value = $validate->getValue();
                $time = $value['time'];

                $singleTime = array(
                    'time_value' => $time,
                    'time_status' => $time_status,
                );
                if($time_id){
                    //update the time
                    $result = $this->_timeModel->updateTime($singleTime, $time_id);
                    if ($result){
                        //has changed
                        $this->view->messages = __('updated successfully!');
                    }else{
                        //hasnt changed
                        $this->view->messages = array('wasnt_changed' => array(__('wasnt changed!')));
                    }
                }else{
                    //insert a time
                    $result = $this->_timeModel->insertTime($singleTime);
                    if ($result){
                        $this->_helper->FlashMessenger()->setNamespace('success')->addMessage('inserted successfully!');
                    }
                    else{
                        $this->_helper->FlashMessenger()->setNamespace('fail')->addMessage('inserted fail!');
                    }
                    $this->_helper->redirector('index', 'times');
                }
            }else{
                //didnt pass validate
                $this->view->messages = $validate->getMessages();
            }
        }
        //display update form or insert form
        if($this->getRequest()->getParam('id')){
            //show update form
            $time_id = $this->getRequest()->getParam('id');
            $singleTime = $this->_timeModel->getSingleTime($time_id);
            $this->view->singleTime = $singleTime;
        }//show insert form
    }
    /*
     * delete the time
     */
    public function deleteAction(){
        $time_id = $this->getRequest()->getParam('id');
        $result = $this->_timeModel->deleteTime($time_id);
        if ($result){
            $this->_helper->FlashMessenger()->setNamespace('success')->addMessage('deleted successfully!');
        }
        else{
            $this->_helper->FlashMessenger()->setNamespace('fail')->addMessage('deleted fail!');
        }
        $this->_helper->redirector('index', 'times');
    }
}