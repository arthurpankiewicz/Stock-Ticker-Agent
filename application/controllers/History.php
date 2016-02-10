<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 2016-02-03
 * Time: 10:48 AM
 */
class History extends CI_Controller {


    public function index()
    {
        $data = array(
            'page_title' => 'History',
        );

        $this->parser->parse('header', $data);
        $this->movements_panel();
        $this->transactions_panel();
        $this->load->view('footer');

    }

    public function stock($i)
    {
        $data = array(
            'page_title' => 'History',
        );

        $this->parser->parse('header', $data);
        $this->movements_panel($i);
        $this->transactions_panel($i);
        $this->load->view('footer');
    }

    public function movements_panel($i)
    {
        $result = '';
        $q = $this->movements_model->details($i);
        foreach($q->result() as $row) {
            $result .= $this->parser->parse('home/movements/movements_row', (array) $row, true);
        }

        $data['rows'] = $result;
        return $this->parser->parse('home/movements/movements_table', $data);
    }

    public function transactions_panel($i)
    {
        $result = '';
        $q = $this->transactions_model->details($i);
        foreach($q->result() as $row) {
            $result .= $this->parser->parse('home/transactions/transactions_row', (array) $row, true);
        }

        $data['rows'] = $result;
        return $this->parser->parse('home/transactions/transactions_table', $data);
    }


}