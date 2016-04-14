<?php

/**
 * Created by PhpStorm.
 * User: jacky
 * Date: 16-02-08
 * Time: 10:03 PM
 */
class Stocks_model extends CI_Model
{
    public $code;
    public $name;
    public $category;
    public $value;

    public function __construct()
    {
        parent::__construct();
    }

    /*
     * Gets all the entries from the stocks table
     */
    public function get_all()
    {
        $query = $this->db->query('SELECT * FROM stocks');
        return $query;
    }

    /*
     * Gets all the stock codes form the stocks table
     */
    public function stock_name()
    {
        $query = $this->db->query('SELECT Code, Name FROM stocks');
        return $query;
    }

    /*
     * Returns the value of a specific stock
     */
    public function get_value($i)
    {
        $query = $this->db->query('SELECT Value FROM stocks WHERE Code = "' . $i . '"');
        foreach($query->result() as $row)
            $value = $row->Value;
        return 1;
    }

    public function get_stock_value($i)
    {
        $value = '';
        $url_stocks = 'http://bsx.jlparry.com/data/stocks';
        if(($handle = fopen($url_stocks , 'r')) !== false) {
            while(($data = fgetcsv($handle, 1024, ',', '"')) !== false) {
                if($data[0] == $i) {
                    $value = $data[3];
                }
            }
            fclose($handle);
        }
        return $value;
    }

    public function get_all_stocks($url) {
        $stocks = array();
        if(($handle = fopen($url, 'r')) !== false) {
            while(($data = fgetcsv($handle, 1024, ',', '"')) !== false) {
                $stocks[] = array('code' => $data[0], 'name' => $data[1],
                    'category' => $data[2], 'value' => $data[3]);
            }
            fclose($handle);
        }
        array_shift($stocks);
        return $stocks;
    }



}