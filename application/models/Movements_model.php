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

    /*
     * Gets all entries from the movements table
     */
    function get_all()
    {
        $query = $this->db->query('SELECT * FROM movements ORDER BY Datetime DESC');
        return $query;
    }

    /*
     * Gets entries from the movements table for a specific stock
     */
    function details($i)
    {
        $query = $this->db->query('SELECT * FROM movements WHERE Code = "' . $i .'" ORDER BY Datetime DESC');
        return $query;
    }

    /*
     * Gets the most recent stock movement
     */
    function most_recent()
    {
        $query = $this->db->query('SELECT Code from movements ORDER BY Datetime DESC LIMIT 1');
        foreach($query->result() as $row)
            $result = $row;
        $result = $result->Code;
        return $result;
    }
}