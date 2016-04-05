/**
 * Created by sasik on 4/4/16.
 */
// http://www.chartjs.org/docs/#getting-started-global-chart-configuration

var CHART = {
    options : {
        responsive: true
    },

    CHART_DATE_EL_ID : '#chart_date',

    getCardNumber : function () {
        return $('#chart_card_number').val();
    },

    getDate : function () {
        return $(CHART.CHART_DATE_EL_ID).val();
    }, 
    
    getData : function (card_number, timestamp, callback) {
        $.get({
            url: '/events/stats?card_number=' + cardNumber + '&timestamp=' + timestamp,
            success: function (data) {

                var keys = [],
                    values = [];

                for (key in data) {
                    keys.push(key);
                    values.push(data[key]);
                }

                var data = {
                    labels: keys,
                    datasets :[{
                        fillColor: "rgba(151,187,205,0.5)",
                        strokeColor: "rgba(151,187,205,0.8)",
                        highlightFill: "rgba(151,187,205,0.75)",
                        highlightStroke: "rgba(151,187,205,1)",
                        data: values
                    }]
                };

                callback(data);
            }
        });
    },

    render : function (data) {

        var myBarChart = new Chart(CHART.ctx).Bar(data, CHART.options);

        CHART.CHART = myBarChart;
    },

    ctx : null



};

var ctx = document.getElementById("myChart");
if (ctx) {
    CHART.ctx = ctx.getContext("2d");
    var cardNumber = CHART.getCardNumber();

    CHART.getData(CHART.getCardNumber(), moment().unix(), CHART.render);

    $(CHART.CHART_DATE_EL_ID).datetimepicker({
        format: 'DD.MM.YYYY',
    })
    .on("dp.change", function (e) {
        var date = e.date.unix();
        CHART.getData(cardNumber, date, function (data) {
            console.log(data);
            // var labels = data.labels;

            // for (var i = 0; i < CHART.CHART.datasets[0].bars.length; i++) {
            //     CHART.CHART.removeData();
            //     console.log('remove ' + i);
            //     // CHART.CHART.datasets[0].bars[i] = data.datasets[0].data[i];
            //     // myBarChart.datasets[0].bars[2].value = 50;
            // }

            // for (var i = 0; i < data.labels.length; i++) {
            //     // CHART.CHART.addData([data.datasets[0].data[i]], data.labels[i]);
            //     // console.log('append ' + i);
            //
            // }

            CHART.CHART.BarClass(data, CHART.options);

        });

    });

}