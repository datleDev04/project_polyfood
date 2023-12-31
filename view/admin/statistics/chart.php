<div class="box__chart flex flex-col justify-center relative">
        <div id="piechart_3d" class="rounded-3xl w-full mt-3" style="height: 500px; border-radius: 15px;"></div>
        <div class="back-to-list absolute bottom-0">
            <a href="./index.php?thongke" class="ml-5 p-3 "><svg xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="w-6 h-6 text-indigo-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                </svg>
            </a>
        </div>
    </div>
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

