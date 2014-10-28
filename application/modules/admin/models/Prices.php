<?php
/**
 *TrangVT
 */
class Admin_Model_Prices extends Zend_Db_Table
{
    protected $_name = 'tbl_prices';
    protected $_primary = 'price_id';
    protected $_languages = DEFAULT_LANGUAGES;

    public function __construct($config = array(), $definition = null)
    {
        parent::__construct($config, $definition);
        $languages = New Zend_Session_Namespace('languages');
        if (!empty($languages->languages)) {
            $this->_languages = $languages->languages;
        }
    }
    /*
     * get prices table
     */
    public function getAllPrices($status = -1)
    {
        $where = "price_lang = '$this->_languages'";
        if($status > -1){
            $where .= " AND price_status = $status";
        }
        $result = $this->fetchall($where);
        if (count($result)) {
            $result = $result->toArray();
        }
        return $result;
    }
    /*
     * get single price row
     */
    public function getSinglePrice($price_id = null)
    {
        $where = '1=1 AND ';
        if ($price_id) {
            $where .= "$this->_primary = $price_id AND price_lang = '$this->_languages'";
        }
        $select = $this->select()->from($this->_name)->where($where);
        $result = $this->fetchRow($select);
        if (count($result)) {
            $result = $result->toArray();
        }
        return $result;
    }
    /*
     * update status sql
     */
    public function statusUpdate($price_id = null, $price_status = '')
    {
        if ($price_id != null && $price_status !== ''){
            $where = "$this->_primary = $price_id";
            $data = array('price_status' => $price_status);
            $result = $this->update($data, $where);
            if ($result != 0){
                return true;
            }
            return false;
        }
    }
    /*
     * update single row sql
     */
    public function updatePrice($singlePriceUpdate = array(), $price_id = null)
    {
        $where = '1=1 AND ';
        if($price_id != null){
            $where .= "$this->_primary = $price_id AND price_lang = '$this->_languages'";
        }
        $result = $this->_db->update($this->_name, $singlePriceUpdate, $where);
        if ($result != 0){
            return true;
        }
        return false;
    }
    /*
     * insert price
     */
    public function insertPrice($singlePriceInsert = array()){
        if($singlePriceInsert){
            $price_lang = array('price_lang'=>$this->_languages);
            $singlePriceInsert = array_merge($singlePriceInsert, $price_lang);
            $insert = $this->insert($singlePriceInsert);
        }
        $result = $this->fetchRow($insert);
        if (count($result)) {
            $result = $result->toArray();
        }
        return $result;
    }
    /*
     * delete price
     */
    public function deletePrice($price_id = null){
        $where = '1=1 AND ';
        if($price_id != null){
            $where .= "$this->_primary = $price_id AND price_lang = '$this->_languages'";
        }
        $result = $this->delete($where);
        if ($result > 0){
            return true;
        }
        return false;
    }
    
     public function getPriceForTime($price_code){
        $select = $this->select();
        $select->from($this->_name);
        $select->where('price_lang = ?', $this->_languages);
        $select->where('price_status = ?',1);
        $select->where('price_code = ?',$price_code); 
        $result = $this->fetchRow($select);
        if (count($result)) {
            $result = $result->toArray();
        }
        return $result;
    }
}