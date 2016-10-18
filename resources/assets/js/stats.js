$("#ajax-loading").show();

$(document).ready(function() {
    $.getJSON($("#stat").data("url"), function(data) {
        var series_data = [];

        data.forEach(function(data) {

            var chart_JSON_data = data.js_chart_data;

            // series_data - nazwy poszczególnych chartów wraz z danymi
            series_data.push({
                name: chart_JSON_data.name,
                colorByPoint: true,
                data: chart_JSON_data.data
            });

            if(series_data.data) {
                // Tworzenie charta
                $(data.div_id).highcharts({
                    chart: {
                        type: "pie"
                    },
                    title: {
                        text: data.title
                    },
                    tooltip: {
                        pointFormat: "{series.name}: <b>{point.percentage:.1f}%</b><br>" +
                                    "<b>{point.y:.2f}</b> PLN"
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
            }

            series_data = [];
        });

        $("#ajax-loading").hide();
    });
});
