<?php
/**
 * File: chat.php
 * Encoding: UTF-8
 * @package: MOODLE PLUGINS
 * @subpackage brigo
 * @copyright  Luuk Verhoeven [MoodleFreak.com]
 * */
require_once(dirname(__FILE__) . '/../../../config.php');
global $DB, $OUTPUT, $PAGE, $CFG;

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once dirname(__FILE__) . '/../class/Config.php';
require_once dirname(__FILE__) . '/../class/Util.php';
require_once dirname(__FILE__) . '/../class/Display.php';

$courseid = required_param('courseid', PARAM_INT);
$page = optional_param('page', '', PARAM_RAW);

$chatUrl = '/blocks/brigo/view/chat.php';
$chatparams = array('courseid' => $courseid , 'page' => $page);

//INIT PAGE
$PAGE->set_context(CONTEXT_SYSTEM);
$PAGE->set_cacheable(false);
$PAGE->set_title(get_string('title:chat', Brigo_Config::NAME));

$url = new moodle_url($chatUrl, $chatparams);
$PAGE->set_url($url);

$isMoodleUser = Brigo_Util::isUser();
//we dont use moodle for this!!
$display = new Brigo_Display($page);
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
        <link href="../chatstyle.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="../bootstrap/js/html5shiv.js"></script>
          <script src="../bootstrap/js/respond.min.js"></script>
        <![endif]-->


    </head>
    <body>
        <!-- Fixed navbar -->
        <div class="navbar navbar-inverse navbar-fixed-top">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-left">
                         <?php if($isMoodleUser):?>
                        <li class="<?php echo $display->isActivePage('friends')?>">
                            <a href="<?php $chatparams['page'] = 'friends'; echo new moodle_url($chatUrl, $chatparams)?>">Friends</a>
                        </li>
                          <?php endif;?>
                        <li class="<?php echo $display->isActivePage('publicRoom')?>">
                            <a class="<?php echo $display->isActivePage('publicRoom')?>"  href="<?php $chatparams['page'] = 'publicRoom'; echo new moodle_url($chatUrl, $chatparams)?>">Public Room</a>
                        </li>
                         <?php if($isMoodleUser):?>
                        <li class="<?php echo $display->isActivePage('courseRoom')?>">
                            <a href="<?php $chatparams['page'] = 'courseRoom'; echo new moodle_url($chatUrl, $chatparams)?>">Course Room</a>
                        </li>
                        <?php endif;?>
                    </ul>
                    <?php if($isMoodleUser):?>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php $chatparams['page'] = 'profile'; echo new moodle_url($chatUrl, $chatparams)?>">Profile</a></li>
                                <li><a href="<?php $chatparams['page'] = 'avatar'; echo new moodle_url($chatUrl, $chatparams)?>">Avatar</a></li>
                                   <li class="divider"></li>
                                <li><a href="<?php $chatparams['page'] = 'styling'; echo new moodle_url($chatUrl, $chatparams)?>">Styling</a></li>
                                <li><a href="<?php $chatparams['page'] = 'sounds'; echo new moodle_url($chatUrl, $chatparams)?>">Sounds</a></li>
                                <li><a href="<?php $chatparams['page'] = 'pms'; echo new moodle_url($chatUrl, $chatparams)?>">PMS</a></li>
                            </ul>
                        </li>
                    </ul>
                    <?php endif;?>
                </div><!--/.nav-collapse -->
        </div>
        <div class="container noM">
            <div id="brigoContent">
                <?php echo $display->getContent() ?>
            </div>
        </div> <!-- /container -->
        <?php echo Brigo_Util::getjavascriptParams($courseid);?>
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
         <?php
        if(!empty($display->javascripts))
        {
            foreach($display->javascripts as $javascript)
            {
                echo ' <script src="'.$javascript.'"></script>';
            }
        }
        ?>
    </body>
</html>


