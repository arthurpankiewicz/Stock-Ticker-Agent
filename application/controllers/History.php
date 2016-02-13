<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 2016-02-03
 * Time: 10:48 AM
 */
class History extends MY_Controller {


    public function __construct(){
        parent::__construct();
    }


    public function index()
    {
        $recent = $this->movements_model->most_recent();

        $this->data['page_title'] = "History";
        $this->data['movements-panel'] = $this->movements_panel($recent);
        $this->data['transactions-panel'] = $this->transactions_panel($recent);

        $this->data['pagebody'] = 'history/history';
        $this->render();
    }

    /*
     * Displays the movements and transactions for a specific stock
     */
    public function stock($i)
    {
        $this->data['page_title'] = $i;
        $this->data['movements-panel'] = $this->movements_panel($i);
        $this->data['transactions-panel'] = $this->transactions_panel($i);
        $this->data['pagebody'] = 'history/history';
        $this->render();
    }

    /*
     * Displays all the movements in a table for a specific stock
     */
    public function movements_panel($i)
    {
        $result = '';
        $q = $this->movements_model->details($i);
        foreach($q->result() as $row) {
            $result .= $this->parser->parse('history/movements_row', (array) $row, true);
        }

        $data['rows'] = $result;
        return $this->parser->parse('history/movements_table', $data, true);
    }

    /*
     * Displays all transactions in a table for a specific stock
     */
    public function transactions_panel($i)
    {
        $result = '';
        $q = $this->transactions_model->details($i);
        foreach($q->result() as $row) {
            $result .= $this->parser->parse('history/transactions_row', (array) $row, true);
        }

        $data['rows'] = $result;
        return $this->parser->parse('history/transactions_table', $data, true);
    }

}