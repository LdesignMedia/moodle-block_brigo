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
function startSocket(yui, server, hash, username, id, courseid)
{
    if (typeof io !== 'undefined')
    {
        var client = brigo(server, {'username': username, 'hash': hash, 'id': id, 'courseid': courseid});
        client.joinRoom('stats');
        client.joinRoom('user_' + id);
        client.getAllRooms();
        client.getClients('stats');

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