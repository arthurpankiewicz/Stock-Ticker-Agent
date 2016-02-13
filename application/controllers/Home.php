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
    }


    public function index()
    {
        $data = array(
            'page_title' => 'Home',
            'stocks-drop' => $this->stocks_dropdown(),
            'players-drop' => $this->players_dropdown(),
        );

        $this->parser->parse('header', $data);
        $this->players_panel();
        $this->stocks_panel();
        $this->load->view('footer');
    }

    public function players_panel()
    {
        $result = '';
        $q = $this->players_model->get_all();

        foreach ($q->result() as $row) {
            $result .= $this->parser->parse('home/player_row', (array) $row, true);
        }

        $data['rows'] = $result;

        return $this->parser->parse('home/players_table', $data);
    }


    public function stocks_panel()
    {
        $result = '';
        $q = $this->stocks_model->get_all();

        foreach ($q->result() as $row) {
            $result .= $this->parser->parse('home/stock_row', (array) $row, true);
        }

        $data['rows'] = $result;

        return $this->parser->parse('home/stocks_table', $data);
    }

    public function stocks_dropdown()
    {
        $result = '';
        $q = $this->stocks_model->stock_name();
        foreach($q->result() as $row) {
            $result .= $this->parser->parse('stocks_option', (array) $row, true);
        }

        $data['options'] = $result;
        return $this->parser->parse('dropdown', $data);
    }

    public function players_dropdown()
    {
        $result = '';
        $q = $this->players_model->get_names();
        foreach($q->result() as $row) {
            $result .= $this->parser->parse('players_option', (array) $row, true);
        }

        $data['options'] = $result;
        return $this->parser->parse('dropdown', $data);
    }



}