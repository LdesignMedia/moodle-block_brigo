var settings = {'room': 'publicRoom', regex: /[*|,\\[\]{}<>&$#]/};
//emoticons
$.emoticons.define({"smile": {"title": "Smile", "codes": [":)", ":=)", ":-)"]}, "sad-smile": {"title": "Sad Smile", "codes": [":(", ":=(", ":-("]}, "big-smile": {"title": "Big Smile", "codes": [":D", ":=D", ":-D", ":d", ":=d", ":-d"]}, "cool": {"title": "Cool", "codes": ["8)", "8=)", "8-)", "B)", "B=)", "B-)", "(cool)"]}, "wink": {"title": "Wink", "codes": [":o", ";)", ":=o", ":-o", ":O", ":=O", ":-O"]}, "crying": {"title": "Crying", "codes": [";(", ";-(", ";=("]}, "sweating": {"title": "Sweating", "codes": ["(sweat)", "(:|"]}, "speechless": {"title": "Speechless", "codes": [":|", ":=|", ":-|"]}, "kiss": {"title": "Kiss", "codes": [":*", ":=*", ":-*"]}, "tongue-out": {"title": "Tongue Out", "codes": [":P", ":=P", ":-P", ":p", ":=p", ":-p"]}, "blush": {"title": "Blush", "codes": ["(blush)", ":$", ":-$", ":=$", ":\">"]}, "wondering": {"title": "Wondering", "codes": [":^)"]}, "sleepy": {"title": "Sleepy", "codes": ["|-)", "I-)", "I=)", "(snooze)"]}, "dull": {"title": "Dull", "codes": ["|(", "|-(", "|=("]}, "in-love": {"title": "In love", "codes": ["(inlove)"]}, "evil-grin": {"title": "Evil grin", "codes": ["]:)", ">:)", "(grin)"]}, "talking": {"title": "Talking", "codes": ["(talk)"]}, "yawn": {"title": "Yawn", "codes": ["(yawn)", "|-()"]}, "puke": {"title": "Puke", "codes": ["(puke)", ":&", ":-&", ":=&"]}, "doh!": {"title": "Doh!", "codes": ["(doh)"]}, "angry": {"title": "Angry", "codes": [":@", ":-@", ":=@", "x(", "x-(", "x=(", "X(", "X-(", "X=("]}, "it-wasnt-me": {"title": "It wasn't me", "codes": ["(wasntme)"]}, "party": {"title": "Party!!!", "codes": ["(party)"]}, "worried": {"title": "Worried", "codes": [":S", ":-S", ":=S", ":s", ":-s", ":=s"]}, "mmm": {"title": "Mmm...", "codes": ["(mm)"]}, "nerd": {"title": "Nerd", "codes": ["8-|", "B-|", "8|", "B|", "8=|", "B=|", "(nerd)"]}, "lips-sealed": {"title": "Lips Sealed", "codes": [":x", ":-x", ":X", ":-X", ":#", ":-#", ":=x", ":=X", ":=#"]}, "hi": {"title": "Hi", "codes": ["(hi)"]}, "call": {"title": "Call", "codes": ["(call)"]}, "devil": {"title": "Devil", "codes": ["(devil)"]}, "angel": {"title": "Angel", "codes": ["(angel)"]}, "envy": {"title": "Envy", "codes": ["(envy)"]}, "wait": {"title": "Wait", "codes": ["(wait)"]}, "bear": {"title": "Bear", "codes": ["(bear)", "(hug)"]}, "make-up": {"title": "Make-up", "codes": ["(makeup)", "(kate)"]}, "covered-laugh": {"title": "Covered Laugh", "codes": ["(giggle)", "(chuckle)"]}, "clapping-hands": {"title": "Clapping Hands", "codes": ["(clap)"]}, "thinking": {"title": "Thinking", "codes": ["(think)", ":?", ":-?", ":=?"]}, "bow": {"title": "Bow", "codes": ["(bow)"]}, "rofl": {"title": "Rolling on the floor laughing", "codes": ["(rofl)"]}, "whew": {"title": "Whew", "codes": ["(whew)"]}, "happy": {"title": "Happy", "codes": ["(happy)"]}, "smirking": {"title": "Smirking", "codes": ["(smirk)"]}, "nodding": {"title": "Nodding", "codes": ["(nod)"]}, "shaking": {"title": "Shaking", "codes": ["(shake)"]}, "punch": {"title": "Punch", "codes": ["(punch)"]}, "emo": {"title": "Emo", "codes": ["(emo)"]}, "yes": {"title": "Yes", "codes": ["(y)", "(Y)", "(ok)"]}, "no": {"title": "No", "codes": ["(n)", "(N)"]}, "handshake": {"title": "Shaking Hands", "codes": ["(handshake)"]}, "skype": {"title": "Skype", "codes": ["(skype)", "(ss)"]}, "heart": {"title": "Heart", "codes": ["(h)", "<3", "(H)", "(l)", "(L)"]}, "broken-heart": {"title": "Broken heart", "codes": ["(u)", "(U)"]}, "mail": {"title": "Mail", "codes": ["(e)", "(m)"]}, "flower": {"title": "Flower", "codes": ["(f)", "(F)"]}, "rain": {"title": "Rain", "codes": ["(rain)", "(london)", "(st)"]}, "sun": {"title": "Sun", "codes": ["(sun)"]}, "time": {"title": "Time", "codes": ["(o)", "(O)", "(time)"]}, "music": {"title": "Music", "codes": ["(music)"]}, "movie": {"title": "Movie", "codes": ["(~)", "(film)", "(movie)"]}, "phone": {"title": "Phone", "codes": ["(mp)", "(ph)"]}, "coffee": {"title": "Coffee", "codes": ["(coffee)"]}, "pizza": {"title": "Pizza", "codes": ["(pizza)", "(pi)"]}, "cash": {"title": "Cash", "codes": ["(cash)", "(mo)", "($)"]}, "muscle": {"title": "Muscle", "codes": ["(muscle)", "(flex)"]}, "cake": {"title": "Cake", "codes": ["(^)", "(cake)"]}, "beer": {"title": "Beer", "codes": ["(beer)"]}, "drink": {"title": "Drink", "codes": ["(d)", "(D)"]}, "dance": {"title": "Dance", "codes": ["(dance)", "\\o/", "\\:D/", "\\:d/"]}, "ninja": {"title": "Ninja", "codes": ["(ninja)"]}, "star": {"title": "Star", "codes": ["(*)"]}, "mooning": {"title": "Mooning", "codes": ["(mooning)"]}, "finger": {"title": "Finger", "codes": ["(finger)"]}, "bandit": {"title": "Bandit", "codes": ["(bandit)"]}, "drunk": {"title": "Drunk", "codes": ["(drunk)"]}, "smoking": {"title": "Smoking", "codes": ["(smoking)", "(smoke)", "(ci)"]}, "toivo": {"title": "Toivo", "codes": ["(toivo)"]}, "rock": {"title": "Rock", "codes": ["(rock)"]}, "headbang": {"title": "Headbang", "codes": ["(headbang)", "(banghead)"]}, "bug": {"title": "Bug", "codes": ["(bug)"]}, "fubar": {"title": "Fubar", "codes": ["(fubar)"]}, "poolparty": {"title": "Poolparty", "codes": ["(poolparty)"]}, "swearing": {"title": "Swearing", "codes": ["(swear)"]}, "tmi": {"title": "TMI", "codes": ["(tmi)"]}, "heidy": {"title": "Heidy", "codes": ["(heidy)"]}, "myspace": {"title": "MySpace", "codes": ["(MySpace)"]}, "malthe": {"title": "Malthe", "codes": ["(malthe)"]}, "tauri": {"title": "Tauri", "codes": ["(tauri)"]}, "priidu": {"title": "Priidu", "codes": ["(priidu)"]}});
//helper date
function pad(number, length){ var str = '' + number;while (str.length < length) {str = '0' + str; }return str;}

function resize()
{
    var wWidth = jQuery(window).width();
    var wHeight = jQuery(window).height();

    log('resize: ' + wWidth + '/' + wHeight);
    $('#brigoRoomHolder').width(wWidth - 200);
    $('#brigoUserHolder').width(200);

    $('#brigoMessages ,#brigoMessages .viewport').height(wHeight - 140);
    $('#brigoMessages .viewport').width(wWidth - 230);
    $('#brigoMessages .viewport .overview').width(wWidth - 265);
    $('#brigoContent').height(wHeight - 50);
    $('#brigoOnlineUsers .viewport,#brigoOnlineUsers').height(wHeight - 104);
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

var updateAllRoomUsers = function(response)
{
    log('updateAllRoomUsers');
    $.each(response, function(k, data) {
        $('#brigoOnlineUsers .overview').append('<div id="' + data.clientid + '" rel="' + data.userid + '" class="onlineUser ' + data.username + '">' + data.username + '</div>');
    });
    //$('#brigoOnlineUsers').tinyscrollbar_update('bottom');
};

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
    var regex = settings.regex;
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
    var regex = settings.regex;
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
        time = time.getHours() + ':' + pad(time.getMinutes(), 2);
    }

    $('#brigoMessages .overview').append('<div class="brigoRow ' + className + '"><div class="space"><div class="avatar"><img src="' + avatar + '" alt="' + username + '"/></div><div class="text"><h5>' + username + ' - ' + time + '</h5>' + $.emoticons.replace(message) + '</div></div></div>');
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

            socket.on('exitClient', function(data) {
                $('#' + data.clientid).remove();
                $('#brigoOnlineUsers').tinyscrollbar_update('bottom');
            });

            socket.on('newClient', function(data) {
                log('newClient');
                $('#brigoOnlineUsers .overview').append('<div id="' + data.clientid + '" rel="' + data.userid + '" class="onlineUser ' + data.username + '">' + data.username + '</div>');
            });


            //userlist
            client.getAllRoomUsers(settings.room, updateAllRoomUsers);

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