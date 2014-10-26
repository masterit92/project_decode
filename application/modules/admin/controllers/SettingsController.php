<?php

class Admin_SettingsController extends FTeam_Controller_AdminAction
{

    protected $model_options;

    public function init()
    {
        parent::init();
        $this->model_options = new Admin_Model_Options();
    }

    public function indexAction()
    {
        $this->view->general_settings = $this->model_options->get_option_general_settings();
        $this->view->home_setting = $this->model_options->get_option_home_settings();
        $this->view->game_setting = $this->model_options->get_option_game_settings();
        $this->view->contact_setting = $this->model_options->get_option_contact_settings();
    }

    public function updatestatusAction()
    {
        $option_id = $this->getRequest()->getParam('id', 0);
        $status = $this->getRequest()->getParam('status', -1);
        $result = $this->model_options->update_status_option($option_id, $status);
        if ($result)
        {
            $this->_helper->FlashMessenger()->setNamespace('success')->addMessage('updated successfully!');
        }
        else
        {
            $this->_helper->FlashMessenger()->setNamespace('fail')->addMessage('updated fail!');
        }
        $this->_helper->redirector('index', 'settings');
    }

    public function updateAction()
    {
        if ($this->getRequest()->isPost())
        {
            $arr_messages = array(
                'txt_name' => array(
                    Zend_Validate_NotEmpty::IS_EMPTY => 'name not empty'
                )
            );
            $arr_validate = array(
                'txt_name' => new Zend_Validate_NotEmpty()
            );
            $validate = new FTeam_Validate_MyValidate();
            if ($validate->isValid($arr_validate, $arr_messages))
            {
                $value = $validate->getValue();
                $option_id = $this->getRequest()->getParam('txt_id', 0);
                $option_name = $value['txt_name'];
                $option_value = $this->getRequest()->getParam('txt_value', '');
                $option_status = $this->getRequest()->getParam('rdb_status', 0);
                $upload = new FTeam_UploadFile();
                if ($upload->upload())
                {
                    $arr_data = array(
                        'option_name' => $option_name,
                        'option_value' => $option_value,
                        'option_status' => $option_status
                    );
                    
                    $list_file = $upload->getListFile();
                    if(count($list_file) > 0){
                        $option_image = implode('|', $list_file);
                        $arr_data['option_image'] = $option_image;
                    }
                    
                    $result = $this->model_options->update_option($option_id, $arr_data);
                    if ($result)
                    {
                        $this->view->messages = __('updated successfully!');
                    }
                    else
                    {
                        $this->view->messages = array('update_fail' => array(__('updated fail!')));
                    }
                }
                else
                {
                    $this->view->messages = array('upload' => $upload->getMessages());
                }
            }
            else
            {
                $this->view->messages = $validate->getMessages();
            }
        }
        $option_id = $this->getRequest()->getParam('id', 0);
        $this->view->single_option = $this->model_options->get_single_option($option_id);
    }

}
