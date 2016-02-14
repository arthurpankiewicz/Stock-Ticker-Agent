<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{page_title}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
        margin-bottom: 0;
        border-radius: 0;
    }

    .content {
        width: 75%;
        margin: 0 auto;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }

</style>

<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">StockTicker</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class=""><a href="/home">Home</a></li>
                <li class="dropdown">
                    <a href="/history">History <b class="caret"></b></a>
                    {stocks-drop}
                </li>
                <li class="dropdown">
                    <a href="/portfolio">Portfolio <b class="caret"></b></a>
                    {players-drop}
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                {login-menu}
            </ul>
        </div>
    </div>
</nav>

<div class="jumbotron">
    <div class="container text-center">
        <h1>{jumbo}</h1>
    </div>
</div>

<div class="content">
    {content}
</div>


<footer class="container-fluid text-center">
    <p>Jacky Lui & Arthur Pankiewicz</p>
</footer>

</body>
</html>