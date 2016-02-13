<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 2016-02-03
 * Time: 11:01 AM
 */
class Movements_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_all()
    {
        $query = $this->db->query('SELECT * FROM movements ORDER BY Datetime DESC');
        return $query;
    }

    function details($i)
    {
        $query = $this->db->query('SELECT * FROM movements WHERE Code = "' . $i .'" ORDER BY Datetime DESC');
        return $query;
    }

    function most_recent()
    {
        $query = $this->db->query('SELECT Code from movements ORDER BY Datetime DESC LIMIT 1');
        foreach($query->result() as $row)
            $result = $row;
        $result = $result->Code;
        return $result;
    }
}