<?php

/**
 * Created by PhpStorm.
 * User: jacky
 * Date: 16-02-08
 * Time: 9:25 PM
 */
class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('players_model');
        $this->load->model('stocks_model');
        $this->load->helper('url');
    }


    public function index()
    {
        $this->players_panel();

        $this->stocks_panel();

    }

    public function stocks_panel()
    {
        $q = $this->stocks_model->get_all();

        foreach ($q->result() as $row){
            echo "<a href='/history/stock/" . $row->Code . "'>" . $row->Code . "</a>";
            echo $row->Name;
            echo $row->Category;
            echo $row->Value;
            echo "<br />";
        }
    }

    public function players_panel()
    {
        $q = $this->players_model->get_all();

        foreach ($q->result() as $row)
        {
            echo $row->Player;
            echo $row->Cash;
            echo "<br />";
        }
    }

}