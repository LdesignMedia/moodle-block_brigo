var settings = {'room': 'publicRoom'};

function resize()
{
    var wWidth = $(document).width();
    var wHeight = $(document).height();

    $('#brigoRoomHolder').width(wWidth - 200);
    $('#brigoUserHolder').width(200);

    $('#brigoMessages ,#brigoMessages .viewport').height(wHeight - 196);
    $('#brigoMessages .viewport').width(wWidth - 230);
    $('#brigoMessages .viewport .overview').width(wWidth - 265);
    $('#brigoContent').height(wHeight - 50);
    $('#brigoOnlineUsers .viewport,#brigoOnlineUsers').height(wHeight - 160);
    $('#addBrigoMessage').width(wWidth - 200 - 95);
}
//SMART resizing
(function($, sr) {
    var debounce = function(func, threshold, execAsap) {
        var timeout;
        return function debounced() {
            var obj = this,
                    args = arguments;

            function delayed() {
                if (!execAsap)
                    func.apply(obj, args);
                timeout = null;
            }
            ;
            if (timeout)
                clearTimeout(timeout);
            else if (execAsap)
                func.apply(obj, args);

            timeout = setTimeout(delayed, threshold || 150);
        };
    }
    jQuery.fn[sr] = function(fn) {
        return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr);
    };
})(jQuery, 'smartresize');

function noHashSocket()
{
    if (typeof io === 'undefined')
    {
        log('Socket script not found! [server down or wrong url]');
    }
    console.log('Brigo doesn\'t have a license');
}

function send()
{
    var value = $.trim($('#addBrigoMessage').val());
    var regex = /[*|,\\":<>\[\]{}`';()@&$#%!+-]/;
    if (regex.test(value))
    {
        alert('Illegal characters used.');
        return false;
    }

    $('#addBrigoMessage').val('');
    if (value.length <= 0 || value.length > 400)
    {
        return false;
    }
    else if (client)
    {
        client.addMessage(value, userid, settings.room);
        addRow(value, userid, username, 'me');
    }
}

var avatars = [];
function addRow(message, id, username, className, time)
{
    if (typeof avatars[id] === 'undefined')
    {
        $.ajax({
            url: "/blocks/brigo/avatar.php?userid=" + id,
            method: "get",
            async: false,
            cache: false,
            success: function(string) {
                avatars[id] = string;
                pushMessage(string, username, message, className, time);
            }
        });
    }
    else
    {
        pushMessage(avatars[id], username, message, className, time);
    }
}
function pushMessage(avatar, username, message, className, time)
{
    var regex = /[*|,\\":<>\[\]{}`';()@&$#%!+-]/;
    if (regex.test(message))
    {
        return;
    }

    if ($('#brigoMessages .brigoRow').length > 100)
    {
        $('#brigoMessages .brigoRow').first().remove();
    }

    if (!time)
    {
        var time = new Date();
        time = time.getHours() + ':' + time.getMinutes();
    }

    $('#brigoMessages .overview').append('<div class="brigoRow ' + className + '"><div class="space"><div class="avatar"><img src="' + avatar + '" alt="' + username + '"/></div><div class="text"><h5>' + username + ' - ' + time + '</h5>' + message + '</div></div></div>');
    $('#brigoMessages').tinyscrollbar_update('bottom');
}

!function($) {

    $(function() {
        resize();

        $('#brigoSend').click(function(e) {
            e.preventDefault();
            send();
        });

        $('#brigoOnlineUsers').tinyscrollbar();
        $('#brigoMessages').tinyscrollbar();

        if (typeof io !== 'undefined')
        {
            //config = $.parseJSON(config);
            log(config);

            client = brigo(server, {'username': username, 'hash': config.hash, 'id': userid, 'courseid': courseid});
            var socket = client.joinRoom(settings.room);

            socket.on('getNewMessage', function(data) {
                log('getNewMessage');
                log(data);

                addRow(data.message, data.userid, data.username, 'partner');
            });

            //userlist
            client.getClients(settings.room);

            //getHistoryMessages
            client.getHistoryMessages(settings.room);
        }
        else
        {
            log('Socket script not found!');
        }
    });

    $(window).focus(function() {
        var input = $('#addBrigoMessage').get(0);
        if (typeof input !== 'undefined')
        {
            //input.setFocus(true, this.name);
        }
    });

    $(window).smartresize(function() {
        resize();
    });

    $(document).keypress(function(e) {
        if (e.which == 13) {
            send();
        }
    });

}(window.jQuery);