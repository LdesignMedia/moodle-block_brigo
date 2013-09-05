<?php

/**
 * @package    block
 * @subpackage live_stats
 * @copyright  Luuk Verhoeven [MoodleFreak.com]
 */
defined('MOODLE_INTERNAL') || die;
echo '<script>console.log(\'loaded!\')</script>';

if ($ADMIN->fulltree)
{
    require_once dirname(__FILE__) . '/config.php';
    require_once dirname(__FILE__) . '/class/Util.php';
    require_once($CFG->libdir . '/pagelib.php');

    global $PAGE;
    $PAGE->requires->js(new moodle_url($CFG->wwwroot . '/blocks/live_stats/js/settings.js'));

    Livestats_Util::addSocketIoScript();
    $settings->add(new admin_setting_configtext(Livestats_Config::NAME . '/server', '', get_string('server', Livestats_Config::NAME), Livestats_Config::DEFAULT_SERVER));
    $settings->add(new admin_setting_configtext(Livestats_Config::NAME . '/token', '', '<input class="form-submit" id="validateToken" value="Validate code"/><br /><a target="_blank" href="http://www.moodlefreak.com/block/live_stats">No token? request it here</a>', ''));
}
else
{
    //this is little dirty but get always loaded on every page
    //we going to hook the client and script
     Livestats_Util::addClient();
}