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
        //if a user session is found load their profile
        if( $this->session->userdata('username') ){
            $this->profile();
        } else{
            $this->login();
        }
    }

    /*
     * Login
     * Creates a session variable based on username
     */
    public function login()
    {
        if($this->input->post('input-username')){
            $newdata = array(
                'username'  => $this->input->post('input-username')
            );

            $this->session->set_userdata($newdata);
            $this->data['login-menu'] = $this->parser->parse("login/logout_menu", $this->data, true);
            $this->index();
        } else{
            $this->data['page_title'] = "Login";

            $this->data['pagebody'] = 'login/login';
            $this->render();
        }
    }

    /*
     * Destroys the user session
     */
    public function logout(){
        $this->session->unset_userdata('username');
        $this->data['login-menu'] = $this->parser->parse("login/login_menu", $this->data, true);
        $this->index();
    }

    /*
     * Displays the profile for the current user
     */
    public function profile()
    {
        $this->data['page_title'] = $this->session->userdata('username');
        $this->data['player-activity'] = $this->trade_activity($this->session->userdata('username'));
        $this->data['pagebody'] = 'portfolio/portfolio';
        $this->render();
    }


    /*
     * Displays the profile for a specific user
     */
    public function detail($i)
    {
        $this->data['page_title'] = $i;
        $this->data['player-activity'] = $this->trade_activity($i);
        $this->data['pagebody'] = 'portfolio/portfolio';
        $this->render();
    }

    /*
     * Displays the trade activity table for a specific user
     */
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