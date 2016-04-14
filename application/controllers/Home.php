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

    /*
     * Displays all players and their equity, as well as all stocks and their value
     */
    public function index()
    {
        $this->data['page_title'] = "Home";
        $this->data['jumbo'] = "Stock Ticker Agent";
        $this->data['players-panel'] = $this->players_panel();
        $this->data['stocks-panel'] = $this->stocks_panel();
        $this->data['recent-movements-panel'] = $this->recent_movements_panel();
        $this->data['recent-transactions-panel'] = $this->recent_transactions_panel();
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
        $data['stocks'] = $this->stocks_model->get_all_stocks('http://bsx.jlparry.com/data/stocks');
        return $this->parser->parse('home/stocks_table', $data, true);
    }

    public function recent_movements_panel()
    {
        $data['recent_movements'] = $this->movements_model->get_recent_movements('http://bsx.jlparry.com/data/movement');
        return $this->parser->parse('home/recent_movements_table', $data, true);
    }

    public function recent_transactions_panel() {
        $data['recent_transactions'] = $this->transactions_model->get_recent_transactions('http://bsx.jlparry.com/data/transactions');
        return $this->parser->parse('home/recent_transactions_table', $data, true);
    }



}