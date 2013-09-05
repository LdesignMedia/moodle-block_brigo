<?php

/**
 * File: config.php
 * Encoding: UTF-8
 * @package: MOODLE PLUGINS
 *
 * @Version: 1.0.0
 * @Since 5-sep-2013
 * @Author: Luuk Verhoeven
 *
 **/
abstract class Livestats_Config{
    const NAME = 'block_live_stats';
    const SOCKET_JAVASCRIPT_PATH = 'socket.io/socket.io.js';
    const DEFAULT_SERVER = 'http://socket.moodlefreak.com:444/';
}