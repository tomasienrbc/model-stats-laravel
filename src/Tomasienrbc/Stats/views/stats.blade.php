<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blank Slate</title>
    <meta name="description" content="Get thoughts down quick, do things with them later. Just start typing">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--     <meta name="apple-mobile-web-app-capable" content="yes"> -->
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../css/plottable.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/qtip2/2.2.1/jquery.qtip.min.css">
    <link rel="stylesheet" href="../css/stats.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <script src="../js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <h1>Blank Slate Public Stats</h1>

    <!-- Options to change information displayed -->

    <div class="models options"><p>Models</p><ul></ul></div>
    <div class="time_type options">
      <p>Time Type</p>
      <button id="created">created</button>
      <button id="updated">updated</button>
    </div>
    <div class="time_range options">
      <p>Time Range - Last...</p>
      <button id="month">month</button>
      <button id="year">year</button>
      <button id="forever">forever</button>
    </div>

    <!-- Summary of information displayed -->

    <div class="summary">
      <p class="today">Total today: <span class="today_count"></span></p>
      <p class="total">Total in range: <span class="total_count"></span></p>
    </div>

    <!-- Div for the SVGs for the graph(s) -->
    <div class="svgs"></div>

    <script src="../js/vendor/jquery-1.11.1.min.js"></script>
    <script src="../js/vendor/jquery.dataTables.min.js"></script> <!-- Edited for search input -->
    <script src="../js/vendor/jquery.dataTables.editable.js"></script>
    <script src="../js/vendor/bootstrap-datatables.js"></script>
    <script src="../js/datatables/stats.js"></script>
    <script src="../js/plugins.js"></script>
    <script src="../js/d3.min.js"></script>
    <script src="../js/plottable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/qtip2/2.2.1/jquery.qtip.min.js"></script>
    <script src="../js/stats.js"></script>
<!--
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-60041451-1', 'auto');
      ga('send', 'pageview');

    </script>
-->

</body>
</html>
