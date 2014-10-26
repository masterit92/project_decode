<?php
/**
 *Phuc
 */
class Admin_GamesController extends FTeam_Controller_AdminAction
{
    protected $_gameModel;
    
    public function init()
    {
        parent::init();
        $this->_gameModel = new Admin_Model_Games;
    }

    public function indexAction(){
        $page = $this->_request->getParam('page',1);
        $pagination = new FTeam_Paginator();
        $this->view->pagination = $pagination->createPaginator($this->_gameModel->getCountRow(), $this->_paginator);
        $this->view->gameCollection = $this->_gameModel->getAllGames($page);
    }
    
    public function updatestatusAction()
    {
        $id = $this->getRequest()->getParam('id', 0);
        $status = $this->getRequest()->getParam('status', -1);
        $result = $this->_gameModel->statusUpdate($id, $status);
        if ($result){
            $this->_helper->FlashMessenger()->setNamespace('success')->addMessage('updated successfully!');
        }
        else{
            $this->_helper->FlashMessenger()->setNamespace('fail')->addMessage('updated fail!');
        }
        $this->_helper->redirector('index', 'games');
    }
    /*
     * update or insert action
     */
    public function addAction()
    {

        if($this->getRequest()->isPost()){

            $arr_messages = array(
                'game_name' => array(
                    Zend_Validate_NotEmpty::IS_EMPTY => 'game name is not empty!'
                )
            );
            $arr_validate = array(
                'game_name' => new Zend_Validate_NotEmpty()
            );
            $validate = new FTeam_Validate_MyValidate();

            if ($validate->isValid($arr_validate, $arr_messages)){
                //passed validate
                $request = $this->getRequest()->getParams();
                $value = $validate->getValue();

                $game_id = $request['game_id'];

                $game_desc = $request['game_desc'];
                $game_status = $request['game_status'];
                $game_difficult = $request['game_difficult'];
                $game_sort = $request['game_sort'];

                $game_name = $value['game_name'];
                $singlegame = array(
                    'game_name' => $game_name,
                    'game_desc' => $game_desc,
                    'game_status' => $game_status,
                    'game_difficult' =>$game_difficult,
                    'game_order' =>$game_sort,
                    'game_lang'=>$this->languages
                );
                $upload = new FTeam_UploadFile();
                if ($upload->upload())
                {
                    $list_file = $upload->getListFile();
                    if(count($list_file) > 0){
                        $game_image = implode('|', $list_file);
                        $singlegame['game_image'] = $game_image;
                    }
                }
                if($game_id){
                    //update the game
                    $result = $this->_gameModel->updateGame($singlegame, $game_id);
                    if ($result){
                        //has changed
                        $this->_helper->FlashMessenger()->setNamespace('success')->addMessage('update successfully!');
                        $this->_redirect("admin/games/add/id/$game_id");
                    }else{
                        //hasnt changed
                        $this->_helper->FlashMessenger()->setNamespace('fail')->addMessage('update fail!');
                        $this->_redirect("admin/games/add/id/$game_id");
                        //$this->_helper->redirector('add','games','admin',array('id'=>$game_id));
                    }
                }else{
                    //insert a game
                    $result = $this->_gameModel->insertGame($singlegame);
                    if ($result){
                        $this->_helper->FlashMessenger()->setNamespace('success')->addMessage('add successfully!');
                    }
                    else{
                        $this->_helper->FlashMessenger()->setNamespace('fail')->addMessage('add fail!');
                    }
                    $this->_helper->redirector('add', 'games');
                }
            }else{
                //didnt pass validate
                $this->view->messages = $validate->getMessages();
            }
        }
        //display update form or insert form
        if($this->getRequest()->getParam('id')){
            //show update form
            $game_id = $this->getRequest()->getParam('id');
            $singlegame = $this->_gameModel->getSingleGame($game_id);
            $this->view->singlegame = $singlegame;
        }//show insert form
    }

    /*
     * delete the game
     */
    public function deleteAction(){
        $game_id = $this->getRequest()->getParam('id');
        $result = $this->_gameModel->deleteGame($game_id);
        if ($result){
            $this->_helper->FlashMessenger()->setNamespace('success')->addMessage('deleted successfully!');
        }
        else{
            $this->_helper->FlashMessenger()->setNamespace('fail')->addMessage('deleted fail!');
        }
        $this->_helper->redirector('index', 'games');
    }   
    
}