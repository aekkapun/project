function showChartTooltip(x, y, xValue, yValue) {
    $('<div id="tooltip" class="chart-tooltip">' + yValue + '<\/div>').css({
        position: 'absolute',
        display: 'none',
        top: y - 40,
        left: x - 40,
        border: '0px solid #ccc',
        padding: '2px 6px',
        'background-color': '#fff'
    }).appendTo("body").fadeIn(200);
}
var visitors = $("#site_statistics").data('grafic');

if ($("#site_statistics").size() != 0) {

    $("#site_statistics_loading").hide();
    $("#site_statistics_content").show();

    var plot_statistics = $.plot($("#site_statistics"),
        [{
            data: visitors,
            lines: {
                fill: 0.6,
                lineWidth: 0
            },
            color: ["#f89f9f"]
        }, {
            data: visitors,
            points: {
                show: true,
                fill: true,
                radius: 5,
                fillColor: "#f89f9f",
                lineWidth: 2
            },
            color: "#fff",
            shadowSize: 0
        }],

        {
            xaxis: {
                tickLength: 0,
                tickDecimals: 0,
                mode: "categories",
                min: 0,
                font: {
                    lineHeight: 14,
                    style: "normal",
                    variant: "small-caps",
                    color: "#6F7B8A"
                }
            },
            yaxis: {
                ticks: 4,
                tickDecimals: 0,
                tickColor: "#eee",
                font: {
                    lineHeight: 20,
                    style: "normal",
                    variant: "small-caps",
                    color: "#6F7B8A"
                }
            },
            grid: {
                hoverable: true,
                clickable: true,
                tickColor: "#eee",
                borderColor: "#eee",
                borderWidth: 1
            }
        });

    var previousPoint = null;
    $("#site_statistics").bind("plothover", function (event, pos, item) {
        $("#x").text(pos.x.toFixed(2));
        $("#y").text(pos.y.toFixed(2));
        if (item) {
            if (previousPoint != item.dataIndex) {
                previousPoint = item.dataIndex;

                $("#tooltip").remove();
                var x = item.datapoint[0].toFixed(2),
                    y = item.datapoint[1].toFixed(2);

                showChartTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1]);
            }
        } else {
            $("#tooltip").remove();
            previousPoint = null;
        }
    });
}