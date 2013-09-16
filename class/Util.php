<?php

require_once($CFG->libdir . '/pagelib.php');
require_once dirname(__FILE__) . '/Config.php';

/**
 * File: Util.php
 * Encoding: UTF-8
 * @package: MOODLE PLUGINS
 * @subpackage brigo
 * @copyright  Luuk Verhoeven [MoodleFreak.com]
 */
class Brigo_Util
{

    static protected $config = false;
    static protected $sendSocketJS = false;

    /**
     * load the script path
     */
    static public function addSocketIoScript()
    {
        global $PAGE;
        $config = self::getConfig();

        if (!empty(self::$config->server) && !self::$sendSocketJS)
        {
            $PAGE->requires->js(new moodle_url(self::$config->server . Brigo_Config::SOCKET_JAVASCRIPT_PATH));
            self::$sendSocketJS = true;
            return true;
        }
        return false;
    }

    /**
     * add the javascript client brigo
     * @global type $PAGE
     * @global type $CFG
     * @global type $USER
     * @global type $COURSE
     * @return boolean
     */
    static public function addClient()
    {
        global $PAGE, $CFG, $USER, $COURSE;

        if (!self::$sendSocketJS)
        {
            self::addSocketIoScript();
        }
        $config = self::getConfig();
        if (!empty($config->hash))
        {
            $PAGE->requires->js(new moodle_url($CFG->wwwroot . '/blocks/brigo/js/brigo.js'));
            $username = !empty($USER->username) ? $USER->username : 'guest';

            unset($config->token);
            $config->pageLayout = $PAGE->__get('pagelayout');

            $PAGE->requires->js_init_call('startSocket', array(self::$config->server, $username, $USER->id, $COURSE->id, json_encode($config)));
        }
        else
        {
            $PAGE->requires->js_init_call('noHashSocket');
        }
        $PAGE->requires->js(new moodle_url($CFG->wwwroot . '/blocks/brigo/js/brigo_client.js'));
        return true;
    }

    static public function getjavascriptParams($courseid = 0)
    {
        global $PAGE, $CFG, $USER, $COURSE;
        $config = self::getConfig();
        if (!empty($config->hash))
        {
            unset($config->token);
            $username = !empty($USER->username) ? $USER->username : 'guest';
            return '<script src="'.self::$config->server . Brigo_Config::SOCKET_JAVASCRIPT_PATH.'"></script><script type="text/javascript">
                    var server =  "' . self::$config->server . '";
                    var username =  "' . $username . '";
                    var courseid =  ' . $courseid . ';
                    var userid =  ' .  $USER->id . ';
                    var config =  ' .  json_encode($config) . ';
                    </script>';
        }
        return '<script type="text/javascript">alert("Please check the settings")</script>';
    }

    /**
     * Get plugin config
     * @return object|false
     */
    static public function getConfig()
    {
        if (!self::$config)
        {
            self::$config = get_config(Brigo_Config::NAME);
        }
        return self::$config;
    }

    /**
     * check if a moodle user is guest
     * @global type $USER
     * @return type
     */
    static public function isUser()
    {
        global $USER;
        return ($USER->id > 0) ? true : false;
    }

}