

var colors = ["#f1556c"], 
dataColors = $("#total-revenue").data("colors");
dataColors && (colors = dataColors.split(",")); 
var options = { series: [80], chart: { height: 242, type: "radialBar" },
plotOptions: { radialBar: { hollow: { size: "65%" } } }, 
colors: colors, labels: ["Revenue"] }, 
chart = new ApexCharts(document.querySelector("#total-revenue"), options); chart.render();
colors = ["#1abc9c", "#4a81d4"]; (dataColors = $("#sales-analytics").data("colors")) && (colors = dataColors.split(","));
const revenue = [];
const invoice_date = [];
$.ajax({
    type: "POST",
    url: "assets/php/graphs.php",
    data: {"flag" :'sales-analytics'},
    cache: false,
    success: function(data){

        var data = JSON.parse(data);    
        
        // console.log(data);
       
        // console.log(data.total);
        $.each(data, function(i, item) {
            // alert(data[i].total);

            revenue.push(parseInt(data[i].total),);
            invoice_date.push(data[i].created,);

        });
        
        // console.log(invoice_date);

        
        options = { series: [{ name: "Revenue", type: "column", data: revenue },


// { name: "Sales", type: "line", data: [23, 42, 35, 27, 43, 22, 17, 31, 22, 22, 12, 16] }

],
labels: invoice_date,
chart: { height: 378, type: "line", offsetY: 10 },
stroke: { width: [2, 3] },
plotOptions: { bar: { columnWidth: "50%" } }, 
colors: colors, dataLabels: { enabled: !0, enabledOnSeries: [1] },



xaxis: { type: "datetime" }, legend: { offsetY: 7 }, grid: { padding: { bottom: 20 } },
fill: { type: "gradient", gradient: { shade: "light", type: "horizontal", shadeIntensity: .25, gradientToColors: void 0, inverseColors: !0, opacityFrom: .75, opacityTo: .75, stops: [0, 0, 0] } }, 
yaxis: [{ title: { text: "Net Revenue" } }, { opposite: !0, title: { text: "Number of Sales" } }] };
(chart = new ApexCharts(document.querySelector("#sales-analytics"), options)).render(), 
$("#dash-daterange").flatpickr({ altInput: !0, mode: "range", altFormat: "F j, y", defaultDate: "today" });








    }
    
  });



