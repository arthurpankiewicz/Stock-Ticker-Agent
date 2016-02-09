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
        echo "hello world";
    }

    public function display()
    {
        $this->load->model('movements');
        $q = $this->movements->all_movements();
        echo "<table border='1'><tr>";
        foreach($q->result_array() as $row) {
            echo "<td><a href='/history/stock/" . $row['Code'] . "'>" . $row['Code'] . "</a></td>";
            echo "<td>" . $row['Action'] . "</td>";
            echo "<td>" . $row['Amount'] . "</td>";
            echo "<td>" . $row['Datetime'] . "</td></tr>";
        }
        echo "</table>";
    }

    public function stock($i)
    {
        $this->load->model('movements');
        $q = $this->movements->details($i);
        echo "<table border='1'><tr>";
        foreach($q->result_array() as $row) {
            echo "<td>" . $row['Player'] . "</td>";
            echo "<td>" . $row['Trans'] . "</td>";
            echo "<td>" . $row['Quantity'] . "</td>";
            echo "<td>" . $row['DateTime'] . "</td></tr>";
        }
        echo "</table>";
    }


}