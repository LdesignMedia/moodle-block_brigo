<?php
/**
 * File: chat.php
 * Encoding: UTF-8
 * @package: MOODLE PLUGINS
 *
 * @Version: 1.0.0
 * @Since 13-sep-2013
 * @Author: Luuk Verhoeven
 *
 * */
require_once(dirname(__FILE__) . '/../../../config.php');
global $DB, $OUTPUT, $PAGE, $CFG;

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once dirname(__FILE__) . '/../class/Config.php';
require_once dirname(__FILE__) . '/../class/Util.php';

$courseid = required_param('courseid', PARAM_INT);

require_login($courseid);

$PAGE->set_cacheable(false);
$PAGE->set_title(get_string('title:chat', Brigo_Config::NAME));

$url = new moodle_url('/blocks/brigo/view/chat.php', array('courseid' => $courseid));
$PAGE->set_url($url);
//we dont use moodle for this!!
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Brigo: Live Chat</title>
        <!-- Bootstrap core CSS -->
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="navbar-fixed-top.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="../bootstrap/js/html5shiv.js"></script>
          <script src="../bootstrap/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- Fixed navbar -->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Start</a></li>
                        <li><a href="#about">Public Room</a></li>
                        <li><a href="#contact">Course Room</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Profile</a></li>
                                <li><a href="#">Styling</a></li>
                                <li><a href="#">Sounds</a></li>
                                <li><a href="#">PMS</a></li>
                                <li class="divider"></li>
                                <li class="dropdown-header">Friends</li>
                                <li><a href="#">Add Friend</a></li>
                                <li><a href="#">Friendlist</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
        <div class="container">
            <!-- Main component for a primary marketing message or call to action -->
            <div class="jumbotron">

            </div>
        </div> <!-- /container -->
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>


