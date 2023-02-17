
function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/(\d{3})(?=\d)/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

// Grafico pizza
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: nome,
        datasets: [{
                //dados do banco de dados
                data: [42, 54, 64],
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                hoverBorderColor: ["rgba(234, 236, 244, 1)"]}]},
    options: {

        maintainAspectRatio: false,
        legend: {
            display: false
        },
        cutoutPercentage: 65,
        tooltips: {
            backgroundColor: "rgb(255,255,255,124)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1.3,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
            mode: 'index',
            callbacks: {
                label:
                        function (tooltip, myPieChart, index) {
                            var valor = data.map(function (e) {
                                return e[0];
                            });
                            var datasetLabel = valor[tooltip.index].label || 'Preço';
                            // console.log(datasetLabel);
                            // var valores = tooltip.index[data];
                            return datasetLabel + ': R$ ' + number_format(valor[tooltip.index], 2, ",");
                            //    console.log(datasetLabel);

                        }
            }
        }
    }
});