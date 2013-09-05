/**
 * File: settings.js
 * Encoding: UTF-8
 *
 * @Version: 0.0.1
 * @Since 5-sep-2013
 * @Author: Luuk Verhoeven
 *
 * Copyright  Luuk Verhoeven
 *
 **/
if (typeof log !== 'function')
{
    function log(i) {
        try {
            console.log(i);
        } catch (e) {

        }
    }
}

log('loaded settings [live_stats]');

YUI().use("node-base", 'event', 'anim', function(Y)
{
    var button = Y.one("#validateToken");
    button.on("click", function(e) {
        //check if we have io script
        if (typeof io === 'object')
        {
            Y.one('#id_s_block_live_stats_server').setStyle('border', '1px solid green');
        }
        else
        {
            Y.one('#id_s_block_live_stats_server').setStyle('border', '1px solid red');
        }
    });
});