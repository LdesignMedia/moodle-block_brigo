<?php

/**
 * File: block_brigo.php
 * Encoding: UTF-8
 * @package: MOODLE PLUGINS
 * @subpackage brigo
 * @copyright  Luuk Verhoeven [MoodleFreak.com]
 */
defined('MOODLE_INTERNAL') || die();

require_once dirname(__FILE__) . '/class/Config.php';

class block_brigo extends block_base
{

    function init()
    {
        $this->title = get_string('pluginname', 'block_brigo');
    }

    function instance_allow_multiple()
    {
        return false;
    }

    function has_config()
    {
        return true;
    }

    function applicable_formats()
    {
        return array('my' => true,);
    }

    function instance_allow_config()
    {
        return true;
    }

    function specialization()
    {

        // load userdefined title and make sure it's never empty
        if (empty($this->config->title))
        {
            $this->title = get_string('pluginname', 'block_brigo');
        }
        else
        {
            $this->title = $this->config->title;
        }
    }

    function get_content()
    {
        global $CFG , $COURSE;

        require_once $CFG->libdir . '/formslib.php';

        if ($this->content !== NULL)
        {
            return $this->content;
        }

        if ((!isloggedin() || isguestuser() || !has_capability('block/brigo:viewstats', context_system::instance())))
        {
            $this->content = new stdClass();
            $this->content->text = '';
            return $this->content;
        }

        $this->content = new stdClass();
        $this->content->text = '<div class="singlebutton">
                                <form action="' . $CFG->wwwroot . '/blocks/brigo/view/admin_dashboard.php" method="post">
                                  <div>
                                    <input type="hidden" name="blockid" value="'.$this->instance->id.'"/>
                                    <input type="hidden" name="courseid" value="'.$COURSE->id.'"/>
                                    <input class="singlebutton" type="submit" value="' . get_string('btn:stats', Brigo_Config::NAME) . '"/>
                                  </div>
                                </form>
                              </div>';
        $this->content->footer = '';
        return $this->content;
    }
}