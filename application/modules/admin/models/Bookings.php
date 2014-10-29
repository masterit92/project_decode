<?php

class Admin_Model_Bookings extends Zend_Db_Table{
    protected $_name = 'tbl_bookings';
    protected $_referent_table = 'tbl_games';
    protected $_primary = 'booking_id';
    
//        $arr_condition_where = array(
//            'b.booking_status'=>array(1,'='), 
//            'b.game_id'=>array(4,'=')
//        );
//        $arr_condition_datetime = array(
//            'b.date'=>array('2014-1-2','2014-11-11'), 
//            'b.time'=>array('10:00','21:00')
//        );
    public function getListBooking($page = 1 , $arr_condition_where = array(),$arr_condition_datetime = array(),$pagination=TRUE){
        $select = $this->select();
        $select->from(array('b'=>$this->_name))
               ->joinLeft(array('g'=>$this->_referent_table), 'g.game_id = b.game_id',array('game_name'));
        
        if(count($arr_condition_where) > 0 ){
            foreach ($arr_condition_where as $column => $value){
                $this->setConditionWhere($select, $column, $value[0], $value[1]);
            }
        }
        if(count($arr_condition_datetime) > 0 ){
            foreach ($arr_condition_datetime as $column => $value){
                $this->setConditionDateTime($select, $column, $value[0], $value[1]);
            }
        }
        $select->order("b.booking_id DESC");
        //$pagination
        if($pagination){
            $offset =  ($page - 1)  * ITEM_COUNT_PER_PAGE;
            $select->limit(ITEM_COUNT_PER_PAGE, $offset);
        }
        
        $select->setIntegrityCheck(false);
        $result = $this->fetchAll($select);
        if(count($result)){
            return $result->toArray();
        }
        return NULL;
    }
    private function setConditionDateTime($select ,$column, $start, $end){
        $select->where("$column BETWEEN '$start' AND '$end'");
    }
    private function setConditionWhere($select ,$column,$value,$condition='='){
        $select->where("$column $condition ?", $value);
    }
    public function getSingleBokking($booking_id){
        $select = $this->select();
        $select->from(array('b'=>$this->_name))
               ->joinLeft(array('g'=>$this->_referent_table), 'g.game_id = b.game_id',array('game_name'))
               ->where('b.booking_id = ?', $booking_id)
               ->setIntegrityCheck(false);
        $result = $this->fetchAll($select);
        echo $select;
        if(count($result)){
            return $result->toArray();
        }
        return NULL;
        
    }
    public function getCountRow($arr_condition_where = array(),$arr_condition_datetime = array()){
        $select = $this->select();
        $select->from(array('b'=>$this->_name),array('booking_id'))
               ->joinLeft(array('g'=>$this->_referent_table), 'g.game_id = b.game_id',array());
        
        if(count($arr_condition_where) > 0 ){
            foreach ($arr_condition_where as $column => $value){
                $this->setConditionWhere($select, $column, $value[0], $value[1]);
            }
        }
        if(count($arr_condition_datetime) > 0 ){
            foreach ($arr_condition_datetime as $column => $value){
                $this->setConditionDateTime($select, $column, $value[0], $value[1]);
            }
        }
        $select->setIntegrityCheck(false);
        return $this->fetchAll($select)->count();
    }
}