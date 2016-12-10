<!DOCTYPE html>
<html>
<head>
  <title>Model Stats</title>
  <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' />
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../lib/bootstrap/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="../css/keen-dashboards.css" />
  <!-- Dataviz dependencies -->
  <link href="https://d26b395fwzu5fz.cloudfront.net/keen-dataviz-1.0.4.css" rel="stylesheet" />
  <link href="../css/stats.css" rel="stylesheet" />
</head>
<body class="application">

  <div id="app-toolbar">
    <form action="" onsubmit="return false;" method="post">
      <div class="row tools">
        <div class="col-sm-2">
          <div class="tool coordinates">
            <h5>Model</h5>
            <select class="form-control" id="models">
            </select>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="tool coordinates">
            <h5>Time Type</h5>
            <select class="form-control" id="time-type">
              <option value="created">Created</option>
              <option value="updated">Updated</option>
            </select>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="tool coordinates">
            <h5>Group By</h5>
            <select class="form-control" id="group-by">
              <option value="m/d/y">Day</option>
              <option value="m/y">Month</option>
            </select>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="tool timeframe">
            <h5>Start date</h5>
            <input type="date" id="timeframe-start" class="form-control" placeholder="mm/dd/yyyy">
          </div>
        </div>
        <div class="col-sm-2">
          <div class="tool timeframe">
            <h5>End date</h5>
            <input type="date" id="timeframe-end" class="form-control" placeholder="mm/dd/yyyy">
          </div>
        </div>
        <div class="col-sm-2">
          <div class="tool">
            <h5>Update Data</h5>
            <button id="refresh" class="btn btn-primary btn-block">Refresh</button>
          </div>
        </div>
      </div>
    </form>
  </div>

  <div class="container-fluid">
    <div class="row">

      <div class="col-sm-12">
        <div class="chart-wrapper">
          <div class="chart-title">
            Model Stats
          </div>
          <div class="chart-stage">
            <div id="main-chart"></div>
          </div>
          <!-- <div class="chart-notes">
            This is a sample text region to describe this chart.
          </div> -->
        </div>
      </div>
    </div>
    <!-- <div class="row">
      <div class="col-sm-4">
        <div class="chart-wrapper">
          <div class="chart-title">
            Today vs. Total
          </div>
          <div class="chart-stage">
            <div class="row">
              <div class="col-sm-6">
                <div class="chart-title knob-title">
                  Total Today
                </div>
                <div class="chart-stage" id="metric-01">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="chart-title knob-title">
                  Total in Range
                </div>
                <div class="chart-stage" id="metric-02">
                </div>
              </div>
            </div>
          </div>
          <div class="chart-notes">
          </div>
        </div>
      </div>

    </div> -->

<div class="row">

      <div class="col-sm-4">
        <div class="chart-wrapper">
          <!-- <div class="chart-title">
            Total Today
          </div> -->
          <div class="chart-stage">
            <div id="metric-01"></div>
          </div>
          <!-- <div class="chart-notes">
            Notes go down here
          </div> -->
        </div>
      </div>

      <div class="col-sm-4">
        <div class="chart-wrapper">
          <!-- <div class="chart-title">
            Other Chart
          </div> -->
          <div class="chart-stage">
            <div id="metric-02"></div>
          </div>
          <!-- <div class="chart-notes">
            Notes go down here
          </div> -->
        </div>
      </div>

      <div class="col-sm-4">
        <div class="chart-wrapper">
          <!-- <div class="chart-title">
            Other Chart
          </div> -->
          <div class="chart-stage">
            <div id="metric-03"></div>
          </div>
          <!-- <div class="chart-notes">
            Notes go down here
          </div> -->
        </div>
      </div>

    </div>

    <!-- <div class="row">
      <div class="col-sm-3">
        <div class="chart-wrapper">
          <img data-src="holder.js/100%x150/white">
        </div>
      </div>
      <div class="col-sm-3">
        <div class="chart-wrapper">
          <img data-src="holder.js/100%x150/white">
        </div>
      </div>
      <div class="col-sm-3">
        <div class="chart-wrapper">
          <img data-src="holder.js/100%x150/white">
        </div>
      </div>
      <div class="col-sm-3">
        <div class="chart-wrapper">
          <img data-src="holder.js/100%x150/white">
        </div>
      </div>
    </div>

    <hr>

  </div> -->

  <script type="text/javascript" src="../js/vendor/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="..//lib/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="https://d26b395fwzu5fz.cloudfront.net/keen-analysis-1.1.0.js"></script>
  <script src="https://d26b395fwzu5fz.cloudfront.net/keen-dataviz-1.0.4.js"></script>
  <script type="text/javascript" src="../js/stats.js?v=refresh1"></script>
</body>
</html>
