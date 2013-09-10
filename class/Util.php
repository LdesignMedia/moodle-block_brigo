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

            $username = !empty($USER->username) ? $USER->username: 'guest';
            $PAGE->requires->js_init_call('startSocket', array(self::$config->server, $config->hash, $username , $USER->id , $COURSE->id));
        }
        else
        {
            $PAGE->requires->js_init_call('noHashSocket');
        }
        $PAGE->requires->js(new moodle_url($CFG->wwwroot . '/blocks/brigo/js/brigo_client.js'));
        return true;
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
    
}