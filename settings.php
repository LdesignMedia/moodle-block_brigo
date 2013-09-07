<?php

/**
 * @package    block
 * @subpackage brigo
 * @copyright  Luuk Verhoeven [MoodleFreak.com]
 */
defined('MOODLE_INTERNAL') || die;
require_once dirname(__FILE__) . '/class/Config.php';
require_once dirname(__FILE__) . '/class/Util.php';
if ($ADMIN->fulltree)
{
    require_once($CFG->libdir . '/pagelib.php');
    global $PAGE;
    $PAGE->requires->js(new moodle_url($CFG->wwwroot . '/blocks/brigo/js/settings.js'));

    Brigo_Util::addSocketIoScript();
    $settings->add(new admin_setting_configtext(Brigo_Config::NAME . '/server', '', get_string('server', Brigo_Config::NAME), Brigo_Config::DEFAULT_SERVER));
    $settings->add(new admin_setting_configtext(Brigo_Config::NAME . '/token', '', '<input class="form-submit" id="validateToken" value="Validate code"/><br /><a target="_blank" href="http://www.moodlefreak.com/block/brigo">No token? request it here</a>', ''));
    $settings->add(new admin_setting_configtext(Brigo_Config::NAME . '/hash', '', get_string('hash', Brigo_Config::NAME), ''));
}

//this is little dirty but get always loaded on every page
//we going to hook the client and script
Brigo_Util::addClient();
