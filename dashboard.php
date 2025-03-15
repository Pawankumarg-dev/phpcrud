<?php 

require_once __DIR__ . '/connect.php';
?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<style>
    #container1 {
    height: 400px;
}

.highcharts-figure,
.highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

.highcharts-description {
    margin: 0.3rem 10px;
}
</style>

<?php include('static/header.php') ;
?>
<div class="container-fl mt-2">
<div class="row">
    <div class="col-lg-6 m-2">
    <figure class="highcharts-figure">
  <div id="container1"></div>
  <p class="highcharts-description text-center fs-5">
    This chart show user vs age . Age on y-axis and user name on x-axis
  </p>
</figure>
    </div>
    <div class="col-lg-6"></div>
</div>
</div>
<?php include('static/footer.php') ?>

<?php
$sql = "SELECT name, age FROM users WHERE del_action='N'";
$sqlSet = mysqli_query($conn, $sql);
$rows = mysqli_fetch_all($sqlSet, MYSQLI_ASSOC);

$dataArray ='';

foreach ($rows as $data) {
    // $dataArray[] = "['" . $data['name'] . "', " . $data['age'] . "]";
    $dataArray.= " ['" . $data['name'] . "', " . $data['age'] . "],";
}

//echo $chartdata="[" . implode(",<br>", $dataArray) . "]";
?>

<script>
    Highcharts.chart('container1', {
    chart: {
        type: 'column'
    },
    
    xAxis: {
        type: 'category',
        labels: {
            autoRotation: [-45, -90],
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Age ( year)'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Age in year: <b>{point.y:.1f} year</b>'
    },
    series: [{
        name: 'Population',
        colors: [
            '#9b20d9', '#9215ac', '#861ec9', '#7a17e6', '#7010f9', '#691af3',
            '#6225ed', '#5b30e7', '#533be1', '#4c46db', '#4551d5', '#3e5ccf',
            '#3667c9', '#2f72c3', '#277dbd', '#1f88b7', '#1693b1', '#0a9eaa',
            '#03c69b',  '#00f194'
        ],
        colorByPoint: true,
        groupPadding: 0,
        data: [
            <?=$dataArray?>
            // ['pawan', 15], ['Delhi', 31.18], ['Shanghai', 27.79],
            // ['Sao Paulo', 22.23],
            // ['Mexico City', 21.91],
            // ['Dhaka', 21.74],
            // ['Cairo', 21.32],
            // ['Beijing', 20.89],
            // ['Mumbai', 20.67],
            // ['Osaka', 19.11],
            // ['Karachi', 16.45],
            // ['Chongqing', 16.38],
            // ['Istanbul', 15.41],
            // ['Buenos Aires', 15.25],
            // ['Kolkata', 14.974],
            // ['Kinshasa', 14.970],
            // ['Lagos', 14.86],
            // ['Manila', 14.16],
            // ['Tianjin', 13.79],
            // ['Guangzhou', 13.64]
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});

</script>
