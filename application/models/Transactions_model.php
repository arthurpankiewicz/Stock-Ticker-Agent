<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 2016-02-03
 * Time: 11:01 AM
 */
class Transactions_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Gets all the entries from the transactions tables based on time
     */
    function get_all()
    {
        $query = $this->db->query('SELECT * FROM transaction ORDER BY Datetime DESC');
        return $query;
    }

    /*
     * Gets all the transaction for a specific stock based on time
     */
    function details($i)
    {
        $query = $this->db->query('SELECT * FROM transactions WHERE Stock = "' . $i .'" ORDER BY Datetime DESC');
        return $query;
    }

    /*
     * Gets alll the transaction for a specific player based on time
     */
    function get_player_transaction($i)
    {
        $query = $this->db->query('SELECT DateTime, Stock, Trans, Quantity FROM transactions where Player = "' . $i. '" ORDER BY DateTime DESC');
        return $query;
    }
}