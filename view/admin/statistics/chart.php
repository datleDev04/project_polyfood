<!DOCTYPE html>
<html>

<head>
<div class="form-row" >
      <script src="https://www.gstatic.com/charts/loader.js"></script>

      <body>
      <div
      id="myChart" style="width:100%; max-width:600px; height:500px;">
      </div>

      <script>
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

      // Set Data
      const data = google.visualization.arrayToDataTable([
        ['Category', "Quantity Products"],
        <?php
        $categories= count($list);
        $i = 1;
          foreach ($list as $item) {
            extract($item);
            if ( $i == $categories)$char = ""; else $char = ",";
            echo" ['".$item['name_ctg']."', ".$item['countpro']."]".$char;
          }
        ?>
      ]);

      // Set Options
      const options = {
        title:'Product statistics by Category'
      };

      // Draw
      const chart = new google.visualization.PieChart(document.getElementById('myChart'));
      chart.draw(data, options);

      }
      </script>
</div>
    <!--  -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Loại', 'Số Lượng'],
            <?php
                foreach ($items as $item) {
                    echo "['$item[category_name]',     $item[total]],";
                }
                ?>
        ]);

        var options = {
            title: 'TỶ LỆ HÀNG HÓA',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
    </script>
</head>

<body>
    <div class="box__chart flex flex-col justify-center relative">
        <div id="piechart_3d" style="width: 900px; height: 500px; border-radius: 15px;"></div>
        <div class="back-to-list absolute bottom-0">
            <a href="./index.php?btn_list" class="p-3  bg-indigo-500"><svg xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="w-6 h-6 text-indigo-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                </svg>
            </a>
        </div>
    </div>
</body>

</html>