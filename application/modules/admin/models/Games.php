<?php
class Admin_Model_Games extends Zend_Db_Table
{

    protected $_name = 'tbl_games';
    protected $_primary = 'game_id';
    protected $_languages = DEFAULT_LANGUAGES;

    public function __construct($config = array(), $definition = null)
    {
        parent::__construct($config, $definition);
        $languages = New Zend_Session_Namespace('languages');
        if (!empty($languages->languages)) {
            $this->_languages = $languages->languages;
        }
    }

    public function getAllGames($page = 1, $status = -1, $pagination = TRUE, $lang = TRUE){
        $select = $this->select();
        $select->from($this->_name);
        if($lang){
            $select->where('game_lang = ?',$this->_languages);
        }
        if($status  > -1){
            $select->where('game_status = ?', $status);
        }
        $select->order('game_order ASC');
        if($pagination){
            $offset =  ($page - 1)  * ITEM_COUNT_PER_PAGE;
            $select->limit(ITEM_COUNT_PER_PAGE, $offset);
        }
        $result = $this->fetchAll($select);
        if (count($result)) {
            $result = $result->toArray();
        }
        return $result;
    }
    public function getSingleGame($game_id = null)
    {
        $where = '1=1 AND ';
        if ($game_id) {
            $where .= "game_id = $game_id AND game_lang = '$this->_languages'";
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
    public function statusUpdate($game_id = null, $game_status = '')
    {
        if ($game_id != null && $game_status !== ''){
            $where = "game_id = $game_id";
            $data = array('game_status' => $game_status);
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
    public function updateGame($singleGameUpdate = array(), $game_id = null)
    {
        $where = '1=1 AND ';
        if($game_id != null){
            $where .= "game_id = $game_id AND game_lang = '$this->_languages'";
        }
        $result = $this->_db->update($this->_name, $singleGameUpdate, $where);
        if ($result != 0){
            return true;
        }
        return false;
    }
    /*
     * insert game
     */
    public function insertGame($singleGameInsert = array()){
        if($singleGameInsert){
            $game_lang = array('game_lang'=>$this->_languages);
            $singleGameInsert = array_merge($singleGameInsert, $game_lang);
            $insert = $this->insert($singleGameInsert);
        }
        $result = $this->fetchRow($insert);
        if (count($result)) {
            $result = $result->toArray();
        }
        return $result;
    }
    /*
     * delete game
     */
    public function deleteGame($game_id = null){
        $where = '1=1 AND ';
        if($game_id != null){
            $where .= "game_id = ".$game_id." AND game_lang = '$this->_languages'";
        }
        $result = $this->delete($where);

        if ($result != 0){
            return true;
        }
        return false;
    }

    public function get_single_option($game_id, $status = -1)
    {
        $where = "game_id = $game_id AND game_lang = '$this->_languages'";
        if ($status > -1)
        {
            $where .= " AND game_status = $status";
        }
        $columns = array('game_id',
            'game_name',
            'game_desc',
            'game_image',
            'game_status');
        $select = $this->select()
            ->from($this->_name, $columns)
            ->where($where);
        $result = $this->fetchRow($select);
        if (count($result))
        {
            $result = $result->toArray();
        }
        return $result;
    }
    public function getCountRow(){
        $data = $this->select();
        $data->where('game_lang = ?', $this->_languages);
        $result = $this->fetchAll($data)->count();
        return $result;
    }
}
