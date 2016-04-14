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

    function get_recent_movements($url) {
        $recent_movements = array();
        if(($handle = fopen($url, 'r')) !== false) {
            while(($data = fgetcsv($handle, 1024, ',', '"')) !== false) {
                $recent_movements[] = array('seq' => $data[0], 'datetime' => $data[1],
                    'code' => $data[2], 'action' => $data[3], 'amount' => $data[4]);
            }
            fclose($handle);
        }
        array_shift($recent_movements);
        $recent_movements = array_slice($recent_movements, 0, 5);
        return $recent_movements;
    }

    function get_stock_movements($code)
    {
        $url_movements = 'http://bsx.jlparry.com/data/movement';
        $movements = array();
        if(($handle = fopen($url_movements, 'r')) !== false) {
            while(($data = fgetcsv($handle, 1024, ',', '"')) !== false) {
                if($data[2] == $code) {
                    $movements[] = array('seq' => $data[0], 'datetime' => $data[1],
                        'code' => $data[2], 'action' => $data[3], 'amount' => $data[4]);
                }
            }
            fclose($handle);
        }
        array_shift($movements);
        return $movements;
    }
}