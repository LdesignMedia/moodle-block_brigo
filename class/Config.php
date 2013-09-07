<?php
/**
 * File: config.php
 * Encoding: UTF-8
 * @package: MOODLE PLUGINS
 * @subpackage brigo
 * @copyright  Luuk Verhoeven [MoodleFreak.com]
 */
abstract class Brigo_Config{
    const NAME = 'block_brigo';
    const SOCKET_JAVASCRIPT_PATH = 'socket.io/socket.io.js';
    const DEFAULT_SERVER = 'http://socket.moodlefreak.com:444/';
}