<?php
class Bookings_Model_Bookings extends Zend_Db_Table{
    
    protected $_name = 'tbl_bookings';
    protected $_primary = 'booking_id';

    public function __construct($config = array(), $definition = null)
    {
        parent::__construct($config, $definition);
    }
    public function getBookingsCurentDateTime()
    {
        $select=$this->select();
        $select->from($this->_name);
        $select->where('booking_status = ?', 1);
        $select->where('booking_date BETWEEN  ?', date('Y-m-d', strtotime('now')).' AND ' .date('Y-m-d', strtotime('now')));
        $result = $this->fetchAll($select);
        if (count($result))
        {
            $result = $result->toArray();
        }
        echo "<pre>";
        print_r($result);
        echo "</pre>";die;
        return $result;
    }
}