$("#ajax-loading").show();

$(document).ready(function() {
    $.getJSON($("#stat").data("url"), function(data) {
        var series_data = [];

        data.forEach(function(data) {

            series_data.push({
                colorByPoint: true,
                data: data.js_chart_data
            });

            // Tworzenie charta
            $(data.div_id).highcharts({
                chart: {
                    type: "pie"
                },
                title: {
                    text: data.title
                },
                tooltip: {
                    pointFormat: "<b>{point.y:.2f}</b> PLN<br>" +
                                "<b>{point.percentage:.1f}%</b>"
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: "pointer",
                        dataLabels: {
                            enabled: true,
                            format: "<b>{point.name}</b>: {point.percentage:.1f}%",
                            style: {
                                width: 100, // piksele
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || "black"
                            }
                        }
                    }
                },
                series: series_data,
                credits: false
            });

            series_data = [];
        });

        $("#ajax-loading").hide();
    });
});
