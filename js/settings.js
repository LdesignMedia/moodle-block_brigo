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
    var socket = false;
    var button = Y.one("#validateToken");
    if (button !== null)
    {

        button.on("click", function(e) {
            var token = Y.one('#id_s_block_brigo_token').get('value');
            var server = Y.one('#id_s_block_brigo_server').get('value');

            //check if we have io script
            if (typeof io !== 'undefined')
            {
                Y.one('#id_s_block_brigo_server').setStyle('border', '1px solid green');
                var hostdata = {host: location.host, path: location.path};

                socket = io.connect(server);

                socket.on('reconnect_failed', function() {
                    log('reconnect_failed');
                });

                socket.emit('validateToken', {'hostdata': hostdata, 'token': token}, function(response) {
                    log(response);
                    if (response.status)
                    {
                        Y.one('#id_s_block_brigo_token').setStyle('border', '1px solid green');
                        Y.one('#id_s_block_brigo_hash').set('value', response.data.clientcode);
                    }
                    else
                    {
                        Y.one('#id_s_block_brigo_token').setStyle('border', '1px solid red');
                        alert(response.error);
                    }

                });
            }
            else
            {
                Y.one('#id_s_block_brigo_server').setStyle('border', '1px solid red');
            }
        });
    }
});