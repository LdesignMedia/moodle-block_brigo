<?php
require_once(dirname(__FILE__) . '/../../../config.php');
/**
 * File: const.php
 * Encoding: UTF-8
 * @package: MOODLE PLUGINS
 *
 * @Version: 1.0.0
 * @Since 10-sep-2013
 * @Author: Luuk Verhoeven
 *
 **/

$courses = $DB->get_records('course', null , 'fullname' , 'id,fullname');
$courseString = '{ name :"My" , id :0},';
foreach($courses as $course)
{
    $courseString .= '{name : "'.$course->fullname.'" , id : '.$course->id.'},';
}
?>
var courses = [<?php echo $courseString?>];