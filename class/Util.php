<?php

require_once($CFG->libdir . '/pagelib.php');
require_once dirname(__FILE__) . '/../config.php';

/**
 * File: Util.php
 * Encoding: UTF-8
 * @package: MOODLE PLUGINS
 *
 * @Version: 1.0.0
 * @Since 5-sep-2013
 * @Author: Luuk Verhoeven
 *
 * */
class Livestats_Util
{

    static protected $config = false;

    /**
     * load the script path
     */
    static public function addSocketIoScript()
    {
        global $PAGE;
        $config = self::getConfig();

        if (!empty(self::$config->server))
        {
            $PAGE->requires->js(new moodle_url(self::$config->server . Livestats_Config::SOCKET_JAVASCRIPT_PATH));
            return true;
        }
        return false;
    }

    static public function addClient()
    {
        global $PAGE, $CFG;
        if (self::addSocketIoScript())
        {
            $PAGE->requires->js(new moodle_url($CFG->wwwroot . '/blocks/live_stats/js/client.js'));
            return true;
        }
        return false;
    }

    /**
     * Get plugin config
     * @return object|false
     */
    static public function getConfig()
    {
        if (!self::$config)
        {
            self::$config = get_config(Livestats_Config::NAME);
        }
        return self::$config;
    }

}