<?php
    session_start();
    error_reporting(0);
    include '../_includes/connection.php';
        $year = $_GET['year'];
        $query = mysql_query("SELECT * FROM analytics where curYear = '$year'") or die(mysql_error());
        $row = mysql_fetch_array($query);
        $query2 = mysql_query("SELECT * FROM analytics") or die(mysql_error());
?>
<!DOCTYPE html>
    <?php include '../_includes/navbar.php';?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pastillo's Boarding House</title>

    <!-- Bootstrap Core CSS -->
    <link href="../_css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../_css/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../_css/default.css">
    <!-- Custom Fonts -->
    <link href="../_font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../_includes/style-roommanagement.css">
    <script src="../_includes/jquery-3.1.1.min.js"></script>
    <script src="../_includes/highcharts.js"></script>
    <script src="../_includes/exporting.js"></script>
</head>

<body>
   <?php include_once("../_includes/navbar.php"); ?>
    <!-- Page Content -->
    <div class="container">
    <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <h1 class="page-header">Statistics</h1>
            <ol class="breadcrumb">
                <li><a href="../home.php">Home</a></li>
                <li>Statistics</li>
            </ol>
        </div>
        <!-- /.row -->
        <div class="row">
                <label style="margin-top: 15px">Year:
                    <select style="width: 100px; text-align-last: center;" id="selectbox">
                        <?php while ($row2 = mysql_fetch_assoc($query2)) {  ?>
                                <option value="<?php echo $row2['curYear']; ?>" <?php if($year == $row2['curYear']) {
                                echo 'selected="selected"';} ?>><?php echo $row2['curYear']; ?></option>
                        <?php } ?>
                    </select>
                </label>
                <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto "></div>
        </div>
        <div class="container">
            <footer>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                       <p>Copyright &copy; Esperanza Inc. 2016</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- /.container -->
<!-- Modal -->


    <!-- jQuery -->
    <script src="../_js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../_js/bootstrap.min.js"></script>

    


<script type="text/javascript">
    
    a = <?php echo $row['jan']; ?>;
    b = <?php echo $row['feb']; ?>;
    c = <?php echo $row['mar']; ?>;
    d = <?php echo $row['april']; ?>;
    e = <?php echo $row['may']; ?>; 
    f = <?php echo $row['jun']; ?>;
    g = <?php echo $row['jul']; ?>;
    h = <?php echo $row['aug']; ?>;
    i = <?php echo $row['sept']; ?>; 
    j = <?php echo $row['oct']; ?>;  
    k = <?php echo $row['nov']; ?>;
    l = <?php echo $row['decem']; ?>;
    $(function () {
    Highcharts.chart('container', {
        title: {
            text: '<?php echo $row['curYear']; ?> Monthly Income',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: PastillosBoarding.com',
            x: -20
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sept','Oct','Nov','Dec']
        },
        yAxis: {
            title: {
                text: 'Income(Php)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valuePrefix: 'P'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Year: <?php echo $year; ?>',
            data: [a,b,c,d,e,f,g,h,i,j,k,l]
        }]
    });
});


    function opennewtab(url )
{
  var win=window.open(url, '_blank');
}

 window.onload = function () {
    var eSelect = document.getElementById('selectbox');

    eSelect.onchange = function () {
        var strUser = eSelect.options[eSelect.selectedIndex].value;
        window.location.replace("analytics.php?year=" + strUser);
    }
}
</script>
</body>
    
</html>


