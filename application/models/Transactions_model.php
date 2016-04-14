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
     * Gets all the transaction for a specific player based on time
     */
    function get_player_transaction($i)
    {
        $query = $this->db->query('SELECT DateTime, Stock, Trans, Quantity FROM transactions where Player = "' . $i. '" ORDER BY DateTime DESC');
        return $query;
    }

    function get_recent_transactions($url) {
        $recent_transactions = array();
        if(($handle = fopen($url, 'r')) !== false) {
            while(($data = fgetcsv($handle, 1024, ',', '"')) !== false) {
                $recent_transactions[] = array('seq' => $data[0], 'datetime' => $data[1], 'agent' => $data[2],
                    'player' => $data[3], 'stock' => $data[4], 'trans' => $data[5], 'quantity' => $data[6]);
            }
            fclose($handle);
        }
        array_shift($recent_transactions);
        $recent_transactions = array_slice($recent_transactions, 0, 5);
        return $recent_transactions;
    }

    function get_stock_transactions($code)
    {
        $url_movements = 'http://bsx.jlparry.com/data/transactions';
        $transactions = array();
        if(($handle = fopen($url_movements, 'r')) !== false) {
            while(($data = fgetcsv($handle, 1024, ',', '"')) !== false) {
                if($data[2] == $code) {
                    $transactions[] = array('seq' => $data[0], 'datetime' => $data[1], 'agent' => $data[2],
                        'player' => $data[3], 'stock' => $data[4], 'trans' => $data[5], 'quantity' => $data[6]);
                }
            }
            fclose($handle);
        }
        array_shift($transactions);
        return $transactions;
    }
}