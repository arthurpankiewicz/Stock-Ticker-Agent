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
        echo "hello world";
    }

    public function detail($i)
    {
        $data = array(
            'page_title' => $i
        );

        $this->parser->parse('header', $data);
        $this->trade_activity($i);
        $this->load->view('footer');
    }

    public function trade_activity($i)
    {
        $result = '';
        $q = $this->transactions_model->get_player_transaction($i);

        foreach($q->result() as $row){
            $result .= $this->parser->parse('transactions/trading_activity_row', (array) $row, true);
        }

        ;
        return $this->parser->parse('transactions/trading_activity_table' , array('rows' => $result));
    }

}