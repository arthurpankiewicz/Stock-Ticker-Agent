<?php

/**
 * Created by PhpStorm.
 * User: jacky
 * Date: 16-02-08
 * Time: 9:51 PM
 */
class Players_model extends CI_Model {

    public $player;
    public $cash;

    public function __construct()
    {
        parent::__construct();
    }

    /*
     * Gets all the entries from the players table
     */
    public function get_all()
    {
        $query = $this->db->query('SELECT * FROM players');
        return $query;
    }

    /*
     * Gets all the names from the players table
     */
    public function get_names()
    {
        $query = $this->db->query('SELECT Player FROM players');
        return $query;
    }
}
