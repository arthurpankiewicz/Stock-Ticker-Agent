<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 2016-02-03
 * Time: 11:01 AM
 */
class Movements extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function all_movements()
    {
        $query = $this->db->query('SELECT * FROM movements ORDER BY Datetime DESC');
        return $query;
    }

    function details($i)
    {
        $query = $this->db->query('SELECT * FROM transactions WHERE Stock = "' . $i .'"');
        return $query;
    }
}