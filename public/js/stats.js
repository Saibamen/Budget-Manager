$(document).ready(function() {
    $("#ajax-loading").show();

    $.getJSON($("#temp-stat").data("url"), function(data) {
        /*if(data) {
            console.log(data);
        }*/

        $("#ajax-loading").hide();

        $("#temp-stat").highcharts({
            chart: {
                type: "pie"
            },
            title: {
                // TODO: lang
                text: "Wydatki z podziałem na użytkowników"
            },
            tooltip: {
                pointFormat: "{series.name}: <b>{point.percentage:.1f}%</b>"
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: "pointer",
                    dataLabels: {
                        enabled: true,
                        format: "<b>{point.name}</b>: {point.percentage:.1f} %",
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || "black"
                        }
                    }
                }
            },
            series: [{
                // TODO: lang
                name: "Wydatki",
                colorByPoint: true,
                data: data
            }]
        });
    });
});
