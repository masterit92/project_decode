<?php
class Bookings_Model_Bookings extends Zend_Db_Table{
    
    protected $_name = 'tbl_bookings';
    protected $_primary = 'booking_id';
    protected $_languages = DEFAULT_LANGUAGES;

    public function __construct($config = array(), $definition = null)
    {
        parent::__construct($config, $definition);
        $languages = New Zend_Session_Namespace('languages');
        if (!empty($languages->languages)) {
            $this->_languages = $languages->languages;
        }
    }
    public function getBookingsCurentDateTime($start_date = 'now -7 day', $end_date = 'now +7 day', $game_id)
    {
        $start_date = date('Y-m-d', strtotime($start_date));
        $end_date = date('Y-m-d', strtotime($end_date));
        $select=$this->select();
        $select->from($this->_name);
        $select->where('booking_status = ?', 1);
        $select->where('game_id = ?', $game_id);
        $select->where("date BETWEEN '$start_date'  AND '$end_date'");
        $result = $this->fetchAll($select);
        if (count($result))
        {
            $result = $result->toArray();
        }
        return $result;
    }
    public function getPriceForTime($price_code = 'OFF_PEAK'){
        $select = $this->select();
        $select->from($this->_name);
        $select->where('price_lang = ?', $this->_languages);
        $select->where('price_status = ?',1);
        $select->where('price_code = ?',$price_code);
        $result = $this->fetchRow();
        if (count($result)) {
            $result = $result->toArray();
        }
        return $result;
    }
}