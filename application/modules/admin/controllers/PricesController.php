<?php
/**
 *TrangVT
 */
class Admin_PricesController extends FTeam_Controller_AdminAction
{
    protected $_priceModel;

    public function init()
    {
        parent::init();
        $this->_priceModel = new Admin_Model_Prices();
    }
    /*
     * get prices collection
     */
    public function indexAction(){
        $this->view->pricesCollection = $this->_priceModel->getAllPrices();
    }
    /*
     * update status
     */
    public function updatestatusAction(){
        $id = $this->getRequest()->getParam('id', 0);
        $status = $this->getRequest()->getParam('status', -1);
        $result = $this->_priceModel->statusUpdate($id, $status);
        if ($result){
            $this->_helper->FlashMessenger()->setNamespace('success')->addMessage('updated successfully!');
        }
        else{
            $this->_helper->FlashMessenger()->setNamespace('fail')->addMessage('updated fail!');
        }
        $this->_helper->redirector('index', 'prices');
    }
    /*
     * update or insert action
     */
    public function updateAction(){
        if($this->getRequest()->isPost()){
            //has request
            $price_validate = array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_Float()
            );

            $arr_messages = array(
                'price_value' => array(
                    Zend_Validate_NotEmpty::IS_EMPTY => 'price is not empty!',
                    Zend_Validate_Float::NOT_FLOAT => 'price is number!'
                ),
                'price_name' => array(
                    Zend_Validate_NotEmpty::IS_EMPTY => 'name is not empty!'
                )
            );
            $arr_validate = array(
                'price_value' => $price_validate,
                'price_name' => new Zend_Validate_NotEmpty()
            );
            $validate = new FTeam_Validate_MyValidate();
            $validate->isValid($arr_validate, $arr_messages);
            if ($validate->isValid($arr_validate, $arr_messages)){
                //passed validate
                $request = $this->getRequest()->getParams();
                $value = $validate->getValue();

                $price_id = $request['price_id'];

                $price_desc = $request['price_desc'];
                $price_status = $request['price_status'];
                $price_code = $request['price_code'];

                $price_name = $value['price_name'];
                $price_value = $value['price_value'];
                $singlePrice = array(
                    'price_name' => $price_name,
                    'price_desc' => $price_desc,
                    'price_value' => $price_value,
                    'price_status' => $price_status,
                    'price_code'=>$price_code
                );
                if($price_id > 0){
                    //update the price
                    $result = $this->_priceModel->updatePrice($singlePrice, $price_id);
                    if ($result){
                        //has changed
                        $this->view->messages = __('updated successfully!');
                    }else{
                        //hasnt changed
                        $this->view->messages = array('wasnt_changed' => array(__('wasnt changed!')));
                        //$this->_helper->redirector('update','prices','admin',array('id'=>$price_id));
                    }
                }else{
                    //insert a price
                    $result = $this->_priceModel->insertPrice($singlePrice);
                    if ($result){
                        $this->_helper->FlashMessenger()->setNamespace('success')->addMessage('inserted successfully!');
                    }
                    else{
                        $this->_helper->FlashMessenger()->setNamespace('fail')->addMessage('inserted fail!');
                    }
                    $this->_helper->redirector('update', 'prices');
                }
            }else{
                //didnt pass validate
                $this->view->messages = $validate->getMessages();
            }
        }
        //display update form or insert form
        if($this->getRequest()->getParam('id')){
            //show update form
            $price_id = $this->getRequest()->getParam('id');
            $singlePrice = $this->_priceModel->getSinglePrice($price_id);
            $this->view->singlePrice = $singlePrice;
        }//show insert form
    }
    /*
     * delete the price
     */
    public function deleteAction(){
        $price_id = $this->getRequest()->getParam('id');
        $result = $this->_priceModel->deletePrice($price_id);
        if ($result){
            $this->_helper->FlashMessenger()->setNamespace('success')->addMessage('deleted successfully!');
        }
        else{
            $this->_helper->FlashMessenger()->setNamespace('fail')->addMessage('deleted fail!');
        }
        $this->_helper->redirector('index', 'prices');
    }
}