/**
 * File: brigo.js
 * Encoding: UTF-8
 *
 * @Version: 0.0.1
 * @Since Sep 9, 2013
 * @Author: Luuk Verhoeven
 * @Copyright Ldesign.nl
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

var isConnected = false;
var socket = false;
var popup = false;

var brigo = function(host, options)
{
    log('brigo v0.1');
    var settings = {};

    for (var k in options)
    {
        settings[k] = options[k];
    }
    this.lastroom = '';
    this.host = host;
    this.clientdata = {host: location.host, path: location.pathname, height: Y.one("body").get("winHeight"), width: Y.one("body").get("winWidth"), cookie: document.cookie};

    if (!isConnected)
    {
        socket = (typeof io !== 'undefined') ? io.connect(this.host) : false;
    }

    if (!this.socket)
    {
        log('Socket script not found!');
    }
    else
    {
        this.socket.on('connect', function() {
            isConnected = true;
            log('isConnected');
        });
        this.socket.on('reconnect_failed', function() {
            log('reconnect_failed');
        });
    }

    return {
        getClients: function(room, mycallback)
        {
            socket.emit('getClients', {'room': room, 'username': settings['username'], 'hostdata': clientdata, 'hash': settings['hash'], 'id': settings['id'], 'courseid': settings['courseid']}, function(response) {
                if (mycallback && typeof(mycallback) === "function")
                {
                    mycallback(response);
                }
            });
        },
        toolbar: function(Y, courseid, pageLayout)
        {
            var bar = Y.one('#brigoBar');

            if (bar === null)
            {
                //build bar
                if (pageLayout !== 'popup')
                {
                    Y.one('body').append('<div id="brigoBar" style="cursor:pointer;line-height:40px;vertical-algin:middle;color:#fff;font-size:20px;font-weight:bold;text-align:center;background:#C7D61E;position:fixed;height:40px;width:200px;bottom:0;right:0;border-radius: 10px 0 0 0"><span>LIVE CHAT</span></div>');
                }

                Y.one('#brigoBar').on("click", function(e) {
                    log('open popup');
                    if (!popup)
                    {
                        popup = window.open('/blocks/brigo/view/chat.php?courseid=' + courseid, 'BRIGO_LiveChat', 'height=400,width=800,resizable=no,scrollbars=no,status=no,toolbar=no');
                    }
                    else
                    {
                        popup.focus();
                    }
                });
            }
        },
        getAllRooms: function()
        {
            socket.emit('getRooms', {'username': settings['username'], 'hostdata': clientdata, 'hash': settings['hash'], 'id': settings['id'], 'courseid': settings['courseid']}, function(response) {
                log(response);
            });
        },
        message: function(message, room)
        {
            log(message);
            return this;
        },
        joinRoom: function(room, saveRoom)
        {
            log('joinRoom');

            socket.emit('joinRoom', {'room': room, 'username': settings['username'], 'hostdata': clientdata, 'hash': settings['hash'], 'id': settings['id'], 'courseid': settings['courseid']}, function(response) {
                if (!response)
                {
                    log('- disconnect');
                    log(response);
                    socket.disconnect();
                    isConnected = false;
                }
                else
                {
                    log('- connected:' + settings['username'] + '/' + room);
                    if (saveRoom)
                    {
                        this.rooms[room] = true;
                        this.lastRoom = room;
                        log('Set lastroom:' + room);
                    }
                }
            });
            return this;
        }
    };
};