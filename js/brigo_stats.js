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
                    visitors: {
                        type: "numeric",
                        position: "left",
                    },
                };
                Y.one('#pageVistors b').set('text', response.length);
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
                }

                for (var i = 0; i < courses.length; i++)
                {
                    var course = courses[i];
                    var id = course.id;
                    var count = courseClients[id];
                    log(course);
                    myDataValues.push({course: course.name, visitors: count});
                }
                log(myDataValues);
                if (!mychart)
                {
                    mychart = new Y.Chart({categoryKey: "course", horizontalGridlines: true, seriesKeys: ["visitors"], type: "column", dataProvider: myDataValues, render: "#coursechart", axes: myAxes, stacked: true, title: 'Course Viewers'});
                }
                else
                {
                    mychart.set('dataProvider' , myDataValues);
                }

            }
        });
    }
}

YUI().use('charts', function(Y)
{
    updateClients(Y);

    setInterval(function() {
        updateClients(Y);
    }, 10000);



    //Click handler

});