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
}