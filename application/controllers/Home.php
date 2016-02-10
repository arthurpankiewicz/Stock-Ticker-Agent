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



}