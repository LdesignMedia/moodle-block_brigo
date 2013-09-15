<?php
/**
 * File: admin_dashboard.php
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

$blockid = required_param('blockid', PARAM_INT);
$courseid = required_param('courseid', PARAM_INT);

require_login($courseid);

$PAGE->set_cacheable(false);

$PAGE->set_title(get_string('title:adminstats', Brigo_Config::NAME));

$url = new moodle_url('/blocks/brigo/view/admin_dashboard.php', array('courseid' => $courseid, 'blockid' => $blockid));
$PAGE->set_url($url);
$PAGE->set_pagelayout('standard');
$PAGE->set_heading(get_string('title:adminstats', Brigo_Config::NAME));

$PAGE->requires->css(new moodle_url($CFG->wwwroot . '/blocks/brigo/styles.css'));
$PAGE->requires->js(new moodle_url($CFG->wwwroot . '/blocks/brigo/js/const.php'));
$PAGE->requires->js(new moodle_url($CFG->wwwroot . '/blocks/brigo/js/brigo_stats.js'));


//add crumbs
$settingsnode = $PAGE->settingsnav->add(get_string('pluginname', Brigo_Config::NAME));
$editnode = $settingsnode->add(get_string('crumb:stats', Brigo_Config::NAME), $url);
$editnode->make_active();
$context = get_context_instance(CONTEXT_SYSTEM);

if (!has_capability('block/brigo:viewstats', $context))
{
    print_error('error:capability', Brigo_Config::NAME);
}


echo $OUTPUT->header();
//start content
$content = '<div id="brigoStatsHolder">
        <div id="statsLeft">
            <h4 id="pageVistors">Page views <b></b></h4>
            <strong>Course Viewers</strong>
            <div id="coursechart"></div>
        </div>
        <div id="statsRight">
             <strong id="onlineUsersHeading">Online users</strong>
            <div id="onlineUsers"></div>
        </div>
    </div>';

echo $OUTPUT->box($content, 'block');
//end content
echo $OUTPUT->footer();