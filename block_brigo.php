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
        return true;
    }

    function has_config()
    {
        return true;
    }

    function applicable_formats()
    {
        return array('all' => true, 'my' => false, 'tag' => false);
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
        global $CFG, $SITE, $USER, $DB, $OUTPUT;

        if ($this->content !== NULL)
        {
            return $this->content;
        }

        // make sure blog and tags are actually enabled
        if (empty($CFG->bloglevel))
        {
            $this->content = new stdClass();
            $this->content->text = '';
            if ($this->page->user_is_editing())
            {
                $this->content->text = get_string('blogdisable', 'blog');
            }
            return $this->content;
        }
        else if (empty($CFG->usetags))
        {
            $this->content = new stdClass();
            $this->content->text = '';
            if ($this->page->user_is_editing())
            {
                $this->content->text = get_string('tagsaredisabled', 'tag');
            }
            return $this->content;
        }
        else if ($CFG->bloglevel < BLOG_GLOBAL_LEVEL and (!isloggedin() or isguestuser()))
        {
            $this->content = new stdClass();
            $this->content->text = '';
            return $this->content;
        }

        // require the libs and do the work

        if (empty($this->config))
        {
            $this->config = new stdClass();
        }

        if (empty($this->config->timewithin))
        {
            $this->config->timewithin = BLOCK_BLOG_TAGS_DEFAULTTIMEWITHIN;
        }
        if (empty($this->config->numberoftags))
        {
            $this->config->numberoftags = BLOCK_BLOG_TAGS_DEFAULTNUMBEROFTAGS;
        }
        if (empty($this->config->sort))
        {
            $this->config->sort = BLOCK_BLOG_TAGS_DEFAULTSORT;
        }

        $this->content = new stdClass();
        $this->content->text = '';
        $this->content->footer = '';

        $context = $this->page->context;

        if ($context->contextlevel == CONTEXT_MODULE)
        {

        }
        else if ($context->contextlevel == CONTEXT_COURSE)
        {

        }

        $this->content->text .= "";

        return $this->content;
    }
}