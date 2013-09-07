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
        global $PAGE, $CFG, $USER;
        if (!self::$sendSocketJS)
        {
            self::addSocketIoScript();
        }
        $config = self::getConfig();

        $PAGE->requires->js(new moodle_url($CFG->wwwroot . '/blocks/brigo/js/brigo_client.js'));

        if (!empty($config->hash))
        {
            $PAGE->requires->js_init_call('startSocket', array(self::$config->server, $config->hash, $USER->username));
        }
        else
        {
            $PAGE->requires->js_init_call('noHashSocket');
        }
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