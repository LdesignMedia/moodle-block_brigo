/**
 * File: brigo_client.js
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
log('load Brigo client');
var isConnected = false;
function startSocket(yui, server, hash, username)
{
    log('startSocket');
    if (typeof io !== 'undefined')
    {
        var hostdata = {host: location.host, path: location.path};
        var socket = io.connect(server);
        socket.on('connect', function() {
            socket.emit('joinRoom', {room: 'stats', username: username, 'hostdata': hostdata, 'hash': hash}, function(response) {
                if (!response)
                {
                    log('- disconnect');
                    socket.disconnect();
                }
                else
                {
                    log('- connected:' + username);
                    isConnected = true;
                }
            });
        });
    }
    else
    {
        log('Socket script not found!');
    }
}

function noHashSocket()
{
    if (typeof io === 'undefined')
    {
        log('Socket script not found! [server down or wrong url]');
    }
    console.log('Brigo doesn\'t have a license');
}