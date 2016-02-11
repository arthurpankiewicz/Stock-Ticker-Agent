<?php

/**
 * Created by PhpStorm.
 * User: jacky
 * Date: 16-02-10
 * Time: 1:06 PM
 */
class Portfolio extends CI_Controller{

    public function index($i)
    {
        
    }

    public function detail($i)
    {
        $result = '';
        $q = $this->transactions_model->get_player_transaction($i);

        foreach($q->result() as $row){
            $result .= $this->parser->parse('transactions/trading_activity_row', (array) $row, true);
        }

        $data['rows'] = $result;
        return $this->parser->parse('transactions/trading_activity_table' , $data);
    }

}