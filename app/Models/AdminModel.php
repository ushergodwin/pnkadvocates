<?php
namespace App\Models;

use CodeIgniter\Model;

include APPPATH . 'ThirdParty/bluefaces/DbModel.php';

use DbModel;
use Exception;

class AdminModel extends Model
{
    protected $_db;

    public function start_voting_process() {
        $res = false;
        $this->_db = new DbModel();
        $this->_db->where(['status' => 2]);
        $this->_db->update('candidates', ["status" => 1]);
        if ($this->_db->affectedRows() > 0) {
            $res = true;
        }
        return $res;
    }

    public function cancel_voting_process() {
        $res = false;
        $this->_db = new DbModel();
        $this->_db->where(['status' => 1]);
        $this->_db->update('candidates', ["status" => 2]);
        if ($this->_db->affectedRows() > 0) {
            $res = true;
        }
        return $res;
    }


    public function get_positions() {
        $data = array();
        $this->_db = new DbModel();
        try {
           $data = $this->_db->getValues('name', "position");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $data;
    }

    public function add_candidate(array $candidate) {
        $this->_db = new DbModel();
        $res = false;
        try {
            $this->_db->insert('candidate', $candidate);
            if ($this->_db->affectedRows() > 0) {
                $res = true;
            }
        }catch (Exception $e) {
            $res =  $e->getMessage();
        }
        return $res;
    }
    public function get_position_id(string $position) {
        $id = "";
        $this->_db = new DbModel();
        $this->_db->where(array("name" => $position));
        try {
            $data = $this->_db->getObject('pid', 'position');
            $id = $data->pid;
        } catch (Exception $e) {
        }
        return $id;
    }

    public function get_candidates() {
        $data = array();
        $this->_db = new DbModel();
        try {
            $this->_db->orderBy('name');
            $data = $this->_db->join(["firstname", "lastname", "course", "photo", "name"], ["candidate" => 'pid', "position" => 'pid']);
        } catch (Exception $e) {
        }
        return $data;
    }

    public function count_votes() {

    }
    public function votes_for_presidents() {
        $data = array();
        $this->_db = new DbModel();
        $sql = "SELECT vote_count, firstname, lastname, course, photo, `name` FROM `vote_count` 
        INNER JOIN candidate ON `vote_count`.`cid` = `candidate`.`cid` INNER JOIN position ON 
        `candidate`.`pid` = `position`.`pid` WHERE `position`.`pid` = ? ORDER BY vote_count ASC ";
        try {
            $data = $this->_db->customQuery($sql, ["p001"]);
        }catch (Exception $exception) {

        }
        return $data;
    }

    public function votes_for_speaker() {
        $data = array();
        $this->_db = new DbModel();
        $sql = "SELECT vote_count, firstname, lastname, course, photo, `name` FROM `vote_count` 
        INNER JOIN candidate ON `vote_count`.`cid` = `candidate`.`cid` INNER JOIN position ON 
        `candidate`.`pid` = `position`.`pid` WHERE `position`.`pid` = ? ORDER BY vote_count ASC ";
        try {
            $data = $this->_db->customQuery($sql, ["p002"]);
        }catch (Exception $exception) {

        }
        return $data;
    }

    public function votes_for_vp() {
        $data = array();
        $this->_db = new DbModel();
        $sql = "SELECT vote_count, firstname, lastname, course, photo, `name` FROM `vote_count` 
        INNER JOIN candidate ON `vote_count`.`cid` = `candidate`.`cid` INNER JOIN position ON 
        `candidate`.`pid` = `position`.`pid` WHERE `position`.`pid` = ? ORDER BY vote_count ASC ";
        try {
            $data = $this->_db->customQuery($sql, ["p003"]);
        }catch (Exception $exception) {

        }
        return $data;
    }

    public function votes_for_deputy_speaker() {
        $data = array();
        $this->_db = new DbModel();
        $sql = "SELECT vote_count, firstname, lastname, course, photo, `name` FROM `vote_count` 
        INNER JOIN candidate ON `vote_count`.`cid` = `candidate`.`cid` INNER JOIN position ON 
        `candidate`.`pid` = `position`.`pid` WHERE `position`.`pid` = ? ORDER BY vote_count ASC ";
        try {
            $data = $this->_db->customQuery($sql, ["p004"]);
        }catch (Exception $exception) {

        }
        return $data;
    }

    public function votes_for_finance() {
        $data = array();
        $this->_db = new DbModel();
        $sql = "SELECT vote_count, firstname, lastname, course, photo, `name` FROM `vote_count` 
        INNER JOIN candidate ON `vote_count`.`cid` = `candidate`.`cid` INNER JOIN position ON 
        `candidate`.`pid` = `position`.`pid` WHERE `position`.`pid` = ? ORDER BY vote_count ASC ";
        try {
            $data = $this->_db->customQuery($sql, ["p005"]);
        }catch (Exception $exception) {

        }
        return $data;
    }

    public function votes_for_academic() {
        $data = array();
        $this->_db = new DbModel();
        $sql = "SELECT vote_count, firstname, lastname, course, photo, `name` FROM `vote_count` 
        INNER JOIN candidate ON `vote_count`.`cid` = `candidate`.`cid` INNER JOIN position ON 
        `candidate`.`pid` = `position`.`pid` WHERE `position`.`pid` = ? ORDER BY vote_count ASC ";
        try {
            $data = $this->_db->customQuery($sql, ["p006"]);
        }catch (Exception $exception) {

        }
        return $data;
    }

    public function votes_for_general_secretary() {
        $data = array();
        $this->_db = new DbModel();
        $sql = "SELECT vote_count, firstname, lastname, course, photo, `name` FROM `vote_count` 
        INNER JOIN candidate ON `vote_count`.`cid` = `candidate`.`cid` INNER JOIN position ON 
        `candidate`.`pid` = `position`.`pid` WHERE `position`.`pid` = ? ORDER BY vote_count ASC ";
        try {
           $data = $this->_db->customQuery($sql, ["p007"]);
        }catch (Exception $exception) {

        }
        return $data;
    }

    public function votes_for_v_g_secretary() {
        $data = array();
        $this->_db = new DbModel();
        $sql = "SELECT vote_count, firstname, lastname, course, photo, `name` FROM `vote_count` 
        INNER JOIN candidate ON `vote_count`.`cid` = `candidate`.`cid` INNER JOIN position ON 
        `candidate`.`pid` = `position`.`pid` WHERE `position`.`pid` = ? ORDER BY vote_count ASC ";
        try {
            $data = $this->_db->customQuery($sql, ["p008"]);
        }catch (Exception $exception) {

        }
        return $data;
    }

    public function votes_for_constitution(){
        $data = array();
        $this->_db = new DbModel();
        $sql = "SELECT vote_count, firstname, lastname, course, photo, `name` FROM `vote_count` 
        INNER JOIN candidate ON `vote_count`.`cid` = `candidate`.`cid` INNER JOIN position ON 
        `candidate`.`pid` = `position`.`pid` WHERE `position`.`pid` = ? ORDER BY vote_count ASC ";
        try {
            return $this->_db->customQuery($sql, ["p009"]);
        }catch (Exception $exception) {

        }
        return $data;
    }

    public function votes_for_ethics() {
        $data = array();
        $this->_db = new DbModel();
        $sql = "SELECT vote_count, firstname, lastname, course, photo, `name` FROM `vote_count` 
        INNER JOIN candidate ON `vote_count`.`cid` = `candidate`.`cid` INNER JOIN position ON 
        `candidate`.`pid` = `position`.`pid` WHERE `position`.`pid` = ? ORDER BY vote_count ASC ";
        try {
           $data = $this->_db->customQuery($sql, ["p110"]);
        }catch (Exception $exception) {

        }
        return $data;
    }

    public function votes_for_sports() {
        $data = array();
        $this->_db = new DbModel();
        $sql = "SELECT vote_count, firstname, lastname, course, photo, `name` FROM `vote_count` 
        INNER JOIN candidate ON `vote_count`.`cid` = `candidate`.`cid` INNER JOIN position ON 
        `candidate`.`pid` = `position`.`pid` WHERE `position`.`pid` = ? ORDER BY vote_count ASC ";
        try {
            $data = $this->_db->customQuery($sql, ["p111"]);
        }catch (Exception $exception) {

        }
        return $data;
    }

    public function votes_for_foreign_affairs() {
        $data = array();
        $this->_db = new DbModel();
        $sql = "SELECT vote_count, firstname, lastname, course, photo, `name` FROM `vote_count` 
        INNER JOIN candidate ON `vote_count`.`cid` = `candidate`.`cid` INNER JOIN position ON 
        `candidate`.`pid` = `position`.`pid` WHERE `position`.`pid` = ? ORDER BY vote_count ASC ";
        try {
            $data = $this->_db->customQuery($sql, ["p112"]);
        }catch (Exception $exception) {

        }
        return $data;
    }

    public function votes_for_information() {
        $data = array();
        $this->_db = new DbModel();
        $sql = "SELECT vote_count, firstname, lastname, course, photo, `name` FROM `vote_count` 
        INNER JOIN candidate ON `vote_count`.`cid` = `candidate`.`cid` INNER JOIN position ON 
        `candidate`.`pid` = `position`.`pid` WHERE `position`.`pid` = ? ORDER BY vote_count ASC ";
        try {
            $data = $this->_db->customQuery($sql, ["p113"]);
        }catch (Exception $exception) {

        }
        return $data;
    }

    public function votes_for_women_affairs() {
        $data = array();
        $this->_db = new DbModel();
        $sql = "SELECT vote_count, firstname, lastname, course, photo, `name` FROM `vote_count` 
        INNER JOIN candidate ON `vote_count`.`cid` = `candidate`.`cid` INNER JOIN position ON 
        `candidate`.`pid` = `position`.`pid` WHERE `position`.`pid` = ? ORDER BY vote_count ASC ";
        try {
            $data = $this->_db->customQuery($sql, ["p114"]);
        }catch (Exception $exception) {

        }
        return $data;
    }

    public function vote_for_general_class_rep() {
        $data = array();
        $this->_db = new DbModel();
        $sql = "SELECT vote_count, firstname, lastname, course, photo, `name` FROM `vote_count` 
        INNER JOIN candidate ON `vote_count`.`cid` = `candidate`.`cid` INNER JOIN position ON 
        `candidate`.`pid` = `position`.`pid` WHERE `position`.`pid` = ? ORDER BY vote_count ASC ";
        try {
            $data = $this->_db->customQuery($sql, ["p115"]);
        }catch (Exception $exception) {

        }
        return $data;
    }

    public function votes_for_pdw() {
        $data = array();
        $this->_db = new DbModel();
        $sql = "SELECT vote_count, firstname, lastname, course, photo, `name` FROM `vote_count` 
        INNER JOIN candidate ON `vote_count`.`cid` = `candidate`.`cid` INNER JOIN position ON 
        `candidate`.`pid` = `position`.`pid` WHERE `position`.`pid` = ? ORDER BY vote_count ASC ";
        try {
            $data = $this->_db->customQuery($sql, ["p116"]);
        }catch (Exception $exception) {

        }
        return $data;
    }

    public function votes_for_projects_co() {
        $data = array();
        $this->_db = new DbModel();
        $sql = "SELECT vote_count, firstname, lastname, course, photo, `name` FROM `vote_count` 
        INNER JOIN candidate ON `vote_count`.`cid` = `candidate`.`cid` INNER JOIN position ON 
        `candidate`.`pid` = `position`.`pid` WHERE `position`.`pid` = ? ORDER BY vote_count ASC ";
        try {
            $data = $this->_db->customQuery($sql, ["p117"]);
        }catch (Exception $exception) {

        }
        return $data;
    }


}
