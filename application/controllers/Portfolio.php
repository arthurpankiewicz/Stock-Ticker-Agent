<?php

/**
 * Created by PhpStorm.
 * User: jacky
 * Date: 16-02-10
 * Time: 1:06 PM
 */
class Portfolio extends MY_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index()
    {

        $this->data['page_title'] = "Player";
        $this->data['player-activity'] = $this->trade_activity("Donald");

        $this->data['pagebody'] = 'portfolio/portfolio';
        $this->render();
    }

    public function detail($i)
    {
        $this->data['page_title'] = $i;
        $this->data['player-activity'] = $this->trade_activity($i);
        $this->data['pagebody'] = 'portfolio/portfolio';
        $this->render();
    }

    public function trade_activity($i)
    {
        $result = '';
        $q = $this->transactions_model->get_player_transaction($i);

        foreach($q->result() as $row){
            $result .= $this->parser->parse('portfolio/trading_activity_row', (array) $row, true);
        }

        return $this->parser->parse('portfolio/trading_activity_table' , array('rows' => $result), true);
    }

}