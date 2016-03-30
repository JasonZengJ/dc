@extends('admin.layout.index_head')
@extends('admin.layout.index_header')


@section('content')
    <style type="text/css">

        .menu-title {
            margin-left: 10px;
            color: #525252;
        }

    </style>



    <div class="am-g container">

        <div class="am-scrollable-horizontal">

            <div id="TotalPricePerMonth" style="width: auto;height:500px;"></div>

        </div>

    </div>

    <div class="am-g container">

        <div class="menu-title">
            {{--<h3>菜品销量统计</h3>--}}
        </div>
        <div class="am-scrollable-horizontal">

            <div id="DishStatistics" style="width: auto;height:500px;"></div>
        </div>
    </div>

    {{--<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>--}}
    <script src="{{asset('/js/lib/highcharts/highcharts.js')}}"></script>
    <script type="application/javascript">

        $(function(){

            var year = 2016;
            $.post("{{url('/admin/statistics/dishes-amount-per-month')}}",{
            },function(data) {
                initDishSalesChart(data);
            });

            $.post("{{url('/admin/statistics/total-order-price-per-month')}}",{
                year:year
            },function(data) {
                initSalesPriceChart(year + "年中每月的营业额","每月营业额",data);
            });

            function initDishSalesChart(data) {
                $('#DishStatistics').highcharts({
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: '每月销量统计'
                    },
                    xAxis: {
                        categories:data["food_names"],
                        crosshair: true
                    },
                    yAxis: {
                        allowDecimals: false,
                        min: 0,
                        title: {
                            text: '销量'
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        pointFormat: '<tr><td style="color:red;padding:0">{series.name}</td>' +
                        '<td style="padding:0">: {point.y}</td></tr>' ,

                        footerFormat: '</table>',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    series: [{
                        name: '销量',
                        data: data["food_amount"],
                    }]
                });
            }

            function initSalesPriceChart(title,series_name,data) {
                $('#TotalPricePerMonth').highcharts({
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: title
                    },
                    xAxis: {
                        categories:data["months"],
                        crosshair: true
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: '营业额/(元)'
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        pointFormat: '<tr><td style="color:red;padding:0">{series.name}</td>' +
                        '<td style="padding:0">: {point.y}元</td></tr>' ,

                        footerFormat: '</table>',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    series: [{
                        name: series_name,
                        data: data["monthDatas"],
                    }]
                });
            }

        })

//        '<tr><td style="color:red;">'+'销售额'+'</td><td style="padding:0">: '+data["food_total_price"]['{point.key}']+'</td></tr>'



    </script>

@endsection


