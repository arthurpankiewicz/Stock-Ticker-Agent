<?php

/**
 * Created by PhpStorm.
 * User: jacky
 * Date: 16-02-08
 * Time: 9:25 PM
 */
class Home extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $this->data['page_title'] = "Home";
        $this->data['jumbo'] = "Stock Ticker Agent";
        $this->data['players-panel'] = $this->players_panel();
        $this->data['stocks-panel'] = $this->stocks_panel();
        $this->data['pagebody'] = 'home/home';
        $this->render();
    }

    /*
     * Displays all users and their cash in a table
     */
    public function players_panel()
    {
        $result = '';

        $q = $this->players_model->get_all();

        foreach ($q->result() as $row) {
            $row->StockValue = $this->players_model->get_stock_value($row->Player);
            $row->Equity = $row->StockValue + $row->Cash;
            $result .= $this->parser->parse('home/player_row', (array) $row, true);
        }

        $data['rows'] = $result;

        return $this->parser->parse('home/players_table', $data, true);
    }


    /*
     * Displays all the stocks in a table
     */
    public function stocks_panel()
    {
        $result = '';
        $q = $this->stocks_model->get_all();

        foreach ($q->result() as $row) {
            $result .= $this->parser->parse('home/stock_row', (array) $row, true);
        }

        $data['rows'] = $result;

        return $this->parser->parse('home/stocks_table', $data, true);
    }



}