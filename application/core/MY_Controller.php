<?php

/**
 * Created by PhpStorm.
 * User: jacky
 * Date: 16-02-12
 * Time: 9:18 PM
 */
class MY_Controller extends CI_Controller
{
    protected $data = array();

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('username')){
            $this->data['login-menu'] = $this->parser->parse("login/logout_menu", $this->data, true);
        } else{
            $this->data['login-menu'] = $this->parser->parse("login/login_menu", $this->data, true);
        }
        $this->data['stocks-drop'] = $this->stocks_dropdown();
        $this->data['players-drop'] = $this->players_dropdown();
    }

    function render()
    {
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->parser->parse('template', $this->data);
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