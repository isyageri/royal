<!DOCTYPE html>
<html lang="en-GB">
<head>
    <meta charset="UTF-8" />
    <title>{$corp_name}</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="ROBOTS" content="INDEX, FOLLOW"/>
    <meta name="description" content="Investment and Business"/>
    <meta name="keywords" content="Investment,Business,Royal,Money"/>
    <meta name="author" content="Waterfall" />
    <link rel="shortcut icon" href="{$host}favicon.ico" type="image/png" />
    <link rel="stylesheet" href="{$host}__assets/css/ui/layout.css" type="text/css" />
    <link rel="stylesheet" href="{$host}__assets/css/ui/modules.css" type="text/css" />
    <link rel="stylesheet" href="{$host}__assets/css/ui/typography.css" type="text/css" />
    <link rel="stylesheet" href="{$host}__assets/css/ui/content.css" type="text/css" />
    <link rel="stylesheet" href="{$host}__assets/css/ui/button.css" type="text/css" />
    <link rel="stylesheet" href="{$host}__assets/css/ui/theme.css" type="text/css" />
    <link rel="stylesheet" href="{$host}__assets/css/ui/thickbox.css" type="text/css" />
    <link rel="stylesheet" href="{$host}__assets/css/ui/fck.css" type="text/css" />
    <link rel="stylesheet" href="{$host}__assets/css/ui/navigation.css" type="text/css" />
    <link rel="stylesheet" href="{$host}__assets/css/ui/footer.css" type="text/css" />
    <link rel="stylesheet" href="{$host}__assets/css/ui/cookie.css" type="text/css" />
    <link rel="stylesheet" href="{$host}__assets/css/ui/breadcrumbs.css" type="text/css" />
    <link rel="stylesheet" href="{$host}__assets/css/ui/wq-marketChart.css" type="text/css" />
    {*<link rel="stylesheet" href="{$host}__assets/css/royal.css" type="text/css" />*}
    <link rel="stylesheet" type="text/css" href="{$host}__assets/css/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" href="{$host}__assets/css/font-awesome.min.css"/>

    <script type="text/javascript" src="{$host}__assets/js/ui/jquery-1.9.1.min.js"></script>


</head>
<body class='personal Campaign'>
<div id="main-header">

    <header>
        <div class="top-navigation">
            {*<ul>*}
                {*<li class="active"><a href="#"><span>Individual</span></a></li>*}
                {*<li><a href="#" title="Individual"><span>Community</span></a></li>*}
                {*<li><a href="#" title="Private"><span>Private</span></a></li>*}
                {*<li><a href="#" title="Retirement & Saving"><span>Retirement & Saving</span></a></li>*}
                {*<li class="top-navigation-accessability">*}
                    {*<a href="#" class="" title="Accessibility">*}
                    {*</a>*}
                {*</li>*}
            {*</ul>*}
        </div>
        <div class="main-header">
            <div class="main-navigation-toggle hidden-lg">
                <a href="#" id="navigation-toggle">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
            </div>
            <a href='{$host}'>
                <img class="brand-logo" height='46' width='269' alt='Barclays Personal Banking' src='{$host}__assets/images/logo.png'/>
            </a>
            <div class="main-navigation">
                <ul id="main-navigation-menu" class="main-navigation-menu menu-1deep" style="width: auto;">
                    <li class="divider hidden-xs hidden-md"></li>
                    <li>
                        <a href="{$host}index.php/whoweare">Who We Are</a>
                    </li>
                    <li>
                        <a href="{$host}index.php/whatwedo">What We Do</a>
                        <ul class="menu-2deep">
                            <li>
                                <a href="#">What We Do</a>
                                <ul class="menu-3deep">
                                    <li>
                                        <a href="{$host}index.php/whatwedo" title="Private Wealth Management">
                                            Private Wealth Management</a>
                                    </li>
                                    <li>
                                        <a href="{$host}index.php/whatwedo" title="Retirement Assets Management And Education Saving Program">
                                            Retirement Asset Management And Education Savings Program</a>
                                    </li>
                                    <li>
                                        <a href="{$host}index.php/portfolio" title="Premier loan">
                                            Portfolio</a>
                                    </li>
                                    <li class="important-information hidden-xs hidden-md">
                                        <ul>
                                            <li><span>&nbsp;</span></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{$host}index.php/whatweoffer">What We Offer</a>
                        <ul class="menu-2deep">
                            <li>
                                <a href="#">What We Offer</a>
                                <ul class="menu-3deep">
                                    {foreach name=data from=$whatweoffer item=wwo}
                                        <li>
                                            <a href="{$host}index.php/{$wwo.Controller}" title="Individual Client / Basic Account">
                                                {$wwo.Menu}</a>
                                        </li>

                                    {/foreach}
                                </ul>
                            </li>

                            <li class="important-information hidden-xs hidden-md">
                                <ul>
                                    <li><span>&nbsp;</span></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{$host}index.php/contactus">Contact Us</a>
                    </li>
                    <li>
                        <a href="{$host}index.php/faq">FAQ</a>
                    </li>

                </ul>
                <ul class="main-navigation-register-menu">
                    <li>
                        <a href="{$host}index.php/chome/Login" class="button" title="Log">Log in</a>
                    </li>
                    <li>
                        <a href="{$host}index.php/chome/RegisterAccountType" class="hidden-xs" title="Register">Register</a>
                    </li>
                    <li class="divider hidden-xs"></li>
                    <li>
                        <a href="#" id="search-toggle">null</a>
                    </li>
                </ul>
            </div>
            <div id="search-bar">
                <form name="searchForm" id="searchForm" action='http://ask.barclays.co.uk/sitesearch/results' method="get">
                    <input name="nlpq" type="search" id="q" placeholder='Your keyword here'>
                    <input type="submit" id="qsubmit" value='Search'>
                    <a class="close" href="#">Close</a>
                </form>
            </div>
        </div>
    </header>
</div>
<div class="page">
    <div class="inner-content-title">
        <i class="fa fa-home"></i>
        <span>{$content_title}</span>
    </div>
    <div class="body">
        <div class="content">
            <div id='topBoxInfoServicesWrapper' style="background:url('{$host}__assets/images/bg2.jpg');height:250px">
                <div id='topBoxInfoServicesCell'>
                    <div class="topBoxInfoServices topBoxInfoServicesRight">
                        <div class='topBoxInfoServicesTop'></div>
                        <div class='topBoxInfoServicesMiddle'>
                        </div>
                        <div class='topBoxInfoServicesBottom'></div>
                    </div>
                </div>
            </div>
            <div class="content-list-desc columns">
                <div class="container">
                    <p>We would like to provide the greatest quality investment solutions to help you achieve consistent short, mid, and long-term investment returns. There are some business sectors that we believe we can help you to achieve your financial goals and needs.</p>
                </div>
            </div>
            <div id="whatwedo">

                <div class="content-list-desc columns' id="tab2">
                <div class="columns">
                    <div class="columns" style="width:300px">
                        <h2>Portfolio / Sector Alocation</h2>
                        <p style="margin-top: 20px">1. Financial Sector</p>
                        <p style="margin-left:10px">- Investing in The Stock Market </p>
                        <p style="margin-left:10px">- Investing in The Foreign Exchange Market </p>

                        <p>2. Real Estate Sector</p>
                        <p>3. Information Technologi Sector</p>
                        <p>4. Consumer And Retail Sector</p>

                    </div>
                    <div class="columns"  style="width:600px" id="charts">
                        {*<img*}
                        {*src='{$host}__assets/images/chart.png'*}
                        {*alt=''*}
                        {*width='620'*}
                        {*height='300' />*}

                    </div>
                </div>
                <div class="col" id="charting">
                    <div id="globalMarketMap" style="margin-top: 20px;">
                        <div class="basicData"> Last updated <div class="lastUpdated">14:00 (AEST)</div></div>
                        <a class="reloadChart" title="Refresh" onclick="reloadChart();return false;" href="#">Refresh</a>
                        <div class="legend">
                            <div>Market closed</div>
                            <div>Market open</div>
                        </div>
                        <div class="source">Source: Morningstar</div>
                    <span class="sensex marketClosed">
                        <div class="marketName">Sensex</div>
                        <div class="marketValue gain">24376.88</div>
                    </span>
                    <span class="nikkei marketOpen">
                        <div class="marketName">Nikkei225</div>
                        <div class="marketValue gain">17041.82</div>
                    </span>
                    <span class="dax marketClosed">
                        <div class="marketName">FTSE DAX</div>
                        <div class="marketValue loss">9817.08</div>
                    </span><span class="snp marketClosed">
                        <div class="marketName">S&amp;P 500</div>
                        <div class="marketValue loss">2011.27</div>
                    </span>
                    <span class="topix marketOpen">
                        <div class="marketName">TOPIX</div>
                        <div class="marketValue gain">1373.14</div>
                    </span><span class="hangseng marketOpen">
                        <div class="marketName">Hang Seng</div>
                        <div class="marketValue gain">24160.52</div>
                    </span>
                    <span class="cac marketClosed">
                        <div class="marketName">CAC 40</div>
                        <div class="marketValue loss">4223.24</div>
                    </span>
                    <span class="asx marketOpen">
                        <div class="marketName">ASX200</div>
                        <div class="marketValue loss">5333.6</div>
                    </span><span class="djia marketClosed">
                        <div class="marketName">DJIA</div>
                        <div class="marketValue loss">17427.09</div>
                    </span>
                    <span class="ftse marketClosed">
                        <div class="marketName">FTSE100</div>
                        <div class="marketValue loss">6388.46</div>
                    </span>
                    <span class="shanghai marketOpen">
                        <div class="marketName">Shanghai</div>
                        <div class="marketValue gain">3255.55</div>
                    </span>
                    <span class="nasdaq marketClosed">
                        <div class="marketName">NASDAQ</div>
                        <div class="marketValue loss">4639.32</div>
                    </span>
                    </div>
                </div>
            </div>


        </div>
        <div id="main-footer">
            <footer>
                <ul id="footer-links" tabindex="-1">
                    <li><a href="#">Privacy and Security</a></li>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Site Map</a></li>
                    <li><a href="#">FAQ</a></li>
                    <p>© Copyright 2015 Royal Investment and Business, All Rights Reserved</p>
            </footer>
        </div>
    </div>
</div>
<div class="hide" style="display: none">
    <div id="host-rib">{$host}</div>
</div>
<script src="{$host}__assets/js/Highcharts-4.0.4/js/highcharts.js"></script>
<script src="{$host}__assets/js/Highcharts-4.0.4/js/modules/exporting.js"></script>
<script src="{$host}__assets/js/royal.js"></script>
<script type="text/javascript">
    //    $(document).ready(function() {
    //        fetch_with_no_target("#Portfolio/GetSectorIndustryData/", null, function(chartJson){
    //            console.log(chartJson);
    //            $('#charts').highcharts(chartJson);
    //        });
    //    });
    //<script type="text/javascript">
    jQuery(function () {
        var industryChart;
//            var countryChart;
        jQuery(document).ready(function() {
            var colors = ['0','#007cc1','#5FACAE','#98CA44','#9C84BD', '#EE3124','#F4C92E','#F6941E','#9A7A65','#99CBE6','#F8ADA7','#A4CECE','#F5E088','#C1E091','#F5BE7F','#C4B3E7','#C1AFA3'];

            var chartDataIndustry = [
                {
                    name:'Financials',
                    y: 28,
                    color: colors[1]
                },
                {
                    name:'Real Estate',
                    y: 20.2,
                    color: colors[2]
                },
                {
                    name:'Information Technologi',
                    y: 40.1,
                    color: colors[3]
                },
                {
                    name:'Consumer and Retail Sector',
                    y: 11.7,
                    color: colors[4]
                }
//                    ,
//                    {
//                        name:'Uninvested Cash',
//                        y: 7.6,
//                        color: colors[5]
//                    },
//                    {
//                        name:'Consumer Staples',
//                        y: 6.5,
//                        color: colors[6]
//                    },
//                    {
//                        name:'Health Care',
//                        y: 5.8,
//                        color: colors[7]
//                    },
//                    {
//                        name:'Utilities',
//                        y: 3.9,
//                        color: colors[8]
//                    },
//                    {
//                        name:'Telecommunication Services',
//                        y: 2.3,
//                        color: colors[9]
//                    }
            ];

            industryChart = new Highcharts.Chart({
                chart: {
                    renderTo: 'charts',
                    defaultSeriesType: 'pie',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    height: 300,
                    spacingTop: 0
                },
                title: {
                    text: 'Our Investment Sector',
                    align: 'left',
                    y: 30, x:-3,
                    style: {
                        font: '17px arial',
                        color: '#069'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true,
                        borderWidth: 0,
                        shadow: null,
                        size: 265,
                        point: {
                            events: {
                                legendItemClick: function () {
                                    this.select();
                                    return false;
                                }
                            }
                        }
                    }
                },
                tooltip: {
                    style: {
                        fontFamily: 'Arial, Helvetica, Verdana, sans-serif'
                    },
                    formatter: function() {
                        return this.point.name + ': <b>' + this.y +'%</b>';
                    }
                },
                legend: {

                    labelFormatter: function() {
                        return '<strong>'+this.y +'%</strong> ' + this.name ;
                    },
                    symbolWidth: 12,
                    itemStyle: {
                        color: '#666666',
                        fontFamily: 'Arial, Helvetica, Verdana, sans-serif',
                        display: 'block',
                        overflow: 'hidden',
                        fontWeight: 'normal',

                        fontSize: '1.06em',
                        width: '200px'
                    },
                    x: -10,
                    y: 30,
                    maxHeight: '300px',
                    width: 210,
                    layout: 'vertical',
                    align: 'left',
                    itemWidth: 210,
                    itemMarginTop: 5,
                    verticalAlign: 'top',

                    itemMarginBottom: 3,
                    borderWidth: 0
                },
                credits: {
                    enabled: false
                },
                series: [{
                    name: 'Net asset percent',
                    data: chartDataIndustry,
                    innerSize: 147,
                    dataLabels: false,
                    lineWidth: 0
                }]
            });
        });
    });
</script>
</body>
</html>
