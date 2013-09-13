/**
 * File: brigo_stats.js
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
var mychart = false;
function updateClients(Y)
{

    if (client)
    {
        client.getClients('stats', function(response) {
            if (response)
            {
                var myDataValues = [];
                var courseClients = [];
                var myAxes = {
                    values: {
                        keys: ["visitors"],
                        type: "numeric",
                        position: "left",
                        minimum: 0,
                        maximum: response.length,
                        roundingMethod: 1,
                        labelFunction: function(label, format)
                        {
                            return label;
                        },
                        styles: {
                            majorUnit: {
                                count: 5
                            },
                        }
                    },
                };
                Y.one('#pageVistors b').set('text', response.length);
                Y.one('#onlineUsers').set('text', '');
                var clientUnique = [];
                for (var i = 0; i < response.length; i++)
                {
                    var client = response[i];

                    if (typeof courseClients[client.statsData.courseid] === 'undefined')
                    {
                        courseClients[client.statsData.courseid] = 1;
                    }
                    else
                    {
                        courseClients[client.statsData.courseid] += 1;
                    }

                    if (typeof clientUnique[client.statsData.username] === 'undefined')
                    {
                        clientUnique[client.statsData.username] = {'username': client.statsData.username, 'count': 1};
                    }
                    else
                    {
                        clientUnique[client.statsData.username] = {'username': client.statsData.username, 'count': clientUnique[client.statsData.username].count + 1};
                    }
                }

                for (var key in clientUnique) {
                    if (clientUnique.hasOwnProperty(key)) {
                      Y.one('#onlineUsers').append('<div class="item"><b>' +   clientUnique[key].username + ' (' +   clientUnique[key].count + ')</b></div>');
                    }
                }

                for (var i = 0; i < courses.length; i++)
                {
                    var course = courses[i];
                    var id = course.id;
                    var count = courseClients[id];
                    log(course);
                    if (id === 1)
                    {
                        course.name = 'No Course';
                    }

                    myDataValues.push({course: course.name, visitors: count});
                }
                log(myDataValues);
                if (!mychart)
                {
                    mychart = new Y.Chart({categoryKey: "course", horizontalGridlines: true, seriesKeys: ["visitors"], type: "column", dataProvider: myDataValues, render: "#coursechart", axes: myAxes, stacked: true, title: 'Course Viewers'});
                }
                else
                {
                    mychart.set('dataProvider', myDataValues);
                }

            }
        });
    }
}

YUI().use('charts', function(Y)
{
    setTimeout(function(){ updateClients(Y);} , 1000);

    setInterval(function() {
        updateClients(Y);
    }, 10000);
    //Click handler
});