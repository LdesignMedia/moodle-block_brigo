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
    global $PAGE, $SESSION, $THEME;
    $PAGE->requires->js(new moodle_url($CFG->wwwroot . '/blocks/brigo/js/settings.js'));

    Brigo_Util::addSocketIoScript();

    $settings->add(new admin_setting_configtext(Brigo_Config::NAME . '/server', '', get_string('setting:server', Brigo_Config::NAME), Brigo_Config::DEFAULT_SERVER));
    $settings->add(new admin_setting_configtext(Brigo_Config::NAME . '/token', '', '<input class="form-submit" id="validateToken" value="Validate code"/><br /><a target="_blank" href="http://www.moodlefreak.com/block/brigo">No token? request it here</a>', ''));
    $settings->add(new admin_setting_configtext(Brigo_Config::NAME . '/hash', '', get_string('setting:hash', Brigo_Config::NAME), ''));

    $settings->add(new admin_setting_heading('chat', 'Chat settings', ''));
    $settings->add(new admin_setting_configselect(Brigo_Config::NAME . '/show_chatbar', '', get_string('setting:chatbar', Brigo_Config::NAME), 'yes', array('yes' => 'yes', 'no' => 'no')));
    $settings->add(new admin_setting_configselect(Brigo_Config::NAME . '/allow_sounds', '', get_string('setting:allow_sounds', Brigo_Config::NAME), 'yes', array('yes' => 'yes', 'no' => 'no')));

    $settings->add(new admin_setting_heading('rooms', 'Room settings', ''));
    $settings->add(new admin_setting_configselect(Brigo_Config::NAME . '/stats_room', '', get_string('setting:stats', Brigo_Config::NAME), 'yes', array('yes' => 'yes', 'no' => 'no')));
    $settings->add(new admin_setting_configselect(Brigo_Config::NAME . '/public_room', '', get_string('setting:public_room', Brigo_Config::NAME), 'yes', array('yes' => 'yes', 'no' => 'no')));
    $settings->add(new admin_setting_configselect(Brigo_Config::NAME . '/course_room', '', get_string('setting:course_room', Brigo_Config::NAME), 'yes', array('yes' => 'yes', 'no' => 'no')));
    $settings->add(new admin_setting_configselect(Brigo_Config::NAME . '/teacher_room', '', get_string('setting:teacher_room', Brigo_Config::NAME), 'yes', array('yes' => 'yes', 'no' => 'no')));
    //hack to allow auto excution of a php function on every page from moodle
    //we try to add us to the theme
    $message = '';
    $desc = '';

    $devices = get_device_type_list();

    $code = "\nrequire_once(" . '$CFG->libdir.\'/../' . "blocks/brigo/class/Util.php');\nBrigo_Util::addClient();\n";
    foreach ($devices as $thedevice)
    {
        $themename = get_selected_theme_for_device_type($thedevice);

        if (!empty($themename))
        {
            //check if its hacked
            $THEME = theme_config::load($themename);
            if (file_exists($THEME->dir . '/config.php'))
            {
                $content = file_get_contents($THEME->dir . '/config.php');

                if (!strstr($content, 'Brigo_Util::addClient()'))
                {
                    if (!is_writable($THEME->dir . '/config.php'))
                    {
                        $message = 'Failed to write!';
                        $desc = 'Change ' . $THEME->dir . '/config.php owner / file permissions';
                        $settings->add(new admin_setting_heading('client_' . $themename, $message, $desc));
                        continue;
                    }
                    //check if end of php file
                    if (stristr($content, '?>'))
                    {
                        //there is ending
                        $content = str_replace('?>', $code, $content);
                        file_put_contents($THEME->dir . '/config.php', $content);
                        $message = 'Succesfully added to the theme:' . $themename;
                    }
                    else
                    {
                        //added to next line no php ending found
                        $fh = fopen($THEME->dir . '/config.php', "a+");
                        fwrite($fh, $code);
                        $message = 'Succesfully added to the theme:' . $themename;
                    }
                }
                else
                {
                    $message = 'Client found in:' . $themename;
                }
                $settings->add(new admin_setting_heading('client_' . $themename, $message, $desc));
            }
        }
    }
}