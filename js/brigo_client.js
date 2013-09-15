if (typeof log !== 'function')
{
    function log(i) {
        try {
            console.log(i);
        } catch (e) {

        }
    }
}
var client = false;
log('load Brigo client');
function startSocket(yui, server, username, id, courseid, config)
{
    YUI().use('json-parse', 'json-stringify', function(Y) {
        // JSON is available and ready for use. Add implementation
        // code here.
        if (typeof io !== 'undefined')
        {
            config = Y.JSON.parse(config);
            log(config);

            client = brigo(server, {'username': username, 'hash': config.hash, 'id': id, 'courseid': courseid});
            client.joinRoom('stats');
            if (id > 0)
            {
               socket = client.joinRoom('user_' + id);
               socket.on('notice',function(response){
                   log(response);
               });
            }
            client.getAllRooms();
            client.getClients('stats');

            if (config.show_chatbar === "yes")
            {
                client.toolbar(yui, courseid, config.pageLayout);
            }
        }
        else
        {
            log('Socket script not found!');
        }
    });
}

function noHashSocket()
{
    if (typeof io === 'undefined')
    {
        log('Socket script not found! [server down or wrong url]');
    }
    console.log('Brigo doesn\'t have a license');
}