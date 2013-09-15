<?php
/**
 * File: room.php
 * Encoding: UTF-8
 * @package: MOODLE PLUGINS
 * @subpackage brigo
 * @copyright  Luuk Verhoeven [MoodleFreak.com]
 * */
?>
<div id="brigoRoom">
    <div id="brigoRoomHolder">
        <div id="brigoMessages"></div>
        <input id="addBrigoMessage" type="text" name="text" value="" placeholder="<?php echo get_string('typehere' , Brigo_Config::NAME)?>"
    </div>
    <div id="brigoUserHolder">
        <div id="brigoOnlineUsers"></div>
    </div>
</div>