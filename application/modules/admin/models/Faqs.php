<?php

class Admin_Model_Faqs extends Zend_Db_Table
{

    protected $_name = 'tbl_faqs';
    protected $_primary = 'faq_id';
    protected $_languages = DEFAULT_LANGUAGES;

    public function __construct($config = array(), $definition = null)
    {
        parent::__construct($config, $definition);
        $languages = New Zend_Session_Namespace('languages');
        if (!empty($languages->languages))
        {
            $this->_languages = $languages->languages;
        }
    }

    public function getFaqs($page = 1 , $status = -1, $pagination = TRUE)
    {
        $data=$this->select();
        $data->from($this->_name);
        $data->where('faq_lang = ?', $this->_languages);
        if($status  > -1){
            $data->where('faq_status = ?', $status);
        }
        $data->order('faq_order ASC');
        if($pagination){
            $offset =  ($page - 1)  * ITEM_COUNT_PER_PAGE;
            $data->limit(ITEM_COUNT_PER_PAGE, $offset);
        }
        $result = $this->fetchAll($data);
        if (count($result))
        {
            $result = $result->toArray();
        }
        return $result;

    }
    public function update_status_faq($faq_id = 0, $status = -1)
    {
        if ($faq_id > 0 && $status !== -1)
        {
            $where = "faq_id = $faq_id";
            $data = array('faq_status' => $status);
            $update = $this->update($data, $where);
            if ($update > 0)
            {
                return TRUE;
            }
            return FALSE;
        }
    }

    public function saveFaqs($data, $id = NULL){
        if(!$id) {
            return $this->insert($data);
        } else {
            $where = " faq_id = $id";
            return $this->update($data,$where);
        }
    }

    public function getById($id) {
        if($id) {
            $data=$this->select();
            $data->from($this->_name);
            $data->where('faq_id = ?', $id);
            $result = $this->fetchRow($data);
            return $result;
        }
    }
//
    public function deleteFaqs($id) {
        $where = " faq_id = $id";
        $result = $this->delete($where);
        if($result > 0)
            return TRUE;
        return FALSE;
    }
    
    public function getCountRow(){
        $data = $this->select();
        $data->where('faq_lang = ?', $this->_languages);
        $result = $this->fetchAll($data)->count();
        return $result;
    }

}
