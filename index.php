<?php
include_once 'header.php';
?>

<div class="sensor__container">
    <h2 class="section__title" style=" font-size: 1.5rem;"><span>Water and Environmental Quality</span></h2>
    <span class="section__subtitle" style="font-size: 1.2rem; margin: 0 0 15px">Parameters</span>
    <div>
        <div class="cards__water">
            <div class="card-single">
                <div>
                    <span style="font-size: 1rem;">Status: <span style="font-size: 1rem;"
                            id="ecVal-status"></span></span>
                    <h1><span class="card-value" id="ecVal"></span><span class="card-value-label" id="ecVal-label">
                            ms/cm</span></h1>
                    <span class="card-name">Electrical Conductivity</span>
                </div>

                <div class="icon-box" id="ecVal-icon-box">
                    <i class="uil uil-thermometer"></i>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <span style="font-size: 0.9rem;">Status: <span style="font-size: 0.9rem;"
                            id="phVal-status"></span></span>
                    <h1><span class="card-value" id="phVal"></span><span class="card-value-label" id="phVal-label">
                            ph</span></h1>
                    <span class="card-name">pH</span>
                </div>

                <div class="icon-box" id="phVal-icon-box">
                    <i class="uil uil-thermometer"></i>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <span style="font-size: 0.9rem;">Status: <span style="font-size: 0.9rem;"
                            id="watertempVal-status"></span></span>
                    <h1 id="watertempVal-alert"><span class="card-value" id="watertempVal"></span><span
                            class="card-value-label" id="watertempVal-label"> celcius</span></h1>
                    <span class="card-name">Water Temperature</span>
                </div>

                <div class="icon-box" id="watertempVal-icon-box">
                    <i class="uil uil-temperature-three-quarter"></i>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <span style="font-size: 0.9rem;">Status: <span style="font-size: 0.9rem;"
                            id="humidVal-status"></span></span>
                    <h1><span class="card-value" id="humidVal"></span><span class="card-value-label"
                            id="humidVal-label"> percent</span></h1>
                    <span class="card-name">Room Humidity</span>
                </div>

                <div class="icon-box" id="humidVal-icon-box">
                    <i class="uil uil-temperature-three-quarter"></i>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <span style="font-size: 0.9rem;">Status: <span style="font-size: 0.9rem;"
                            id="roomtempVal-status"></span></span>
                    <h1><span class="card-value" id="roomtempVal"></span><span class="card-value-label"
                            id="roomtempVal-label"> celcius</span></h1>
                    <span class="card-name">Room Temperature</span>
                </div>

                <div class="icon-box" id="roomtempVal-icon-box">
                    <i class="uil uil-temperature-three-quarter"></i>
                </div>
            </div>
        </div>


    </div>
</div>
</div>

<div class="control__container">
    <div>
        <h2 class="section__title" style="margin-bottom: 1rem; font-size: 1.5rem;">Controllers</h2>

        <div class="cards__manual">
            <div class="card-single-control">
                <div>
                    <span style="font-size: 0.9rem;">Status: </span>
                    <h1 class="card-value1" id="lightVal"></h1>
                    <span class="card-name1">Grow Lights</span>
                </div>

                <div class="icon-box1" id="lightVal-icon-box">
                    <i class="uil uil-sun"></i>
                </div>
            </div>

            <div class="card-single-control">
                <div>
                    <span style="font-size: 0.9rem;">Status: </span>
                    <h1 class="card-value1" id="waterPumpVal"></h1>
                    <span class="card-name1">Water Pump</span>
                </div>

                <div class="icon-box1" id="waterPumpVal-icon-box">
                    <i class="uil uil-tear"></i>
                </div>
            </div>

            <div class="card-single-control">
                <div>
                    <span style="font-size: 0.9rem;">Status: </span>
                    <h1 class="card-value1" id="aeratorVal"></h1>
                    <span class="card-name1">Aerator/Air Pump</span>
                </div>

                <div class="icon-box1" id="aeratorVal-icon-box">
                    <i class="uil uil-tear"></i>
                </div>
            </div>
            <div class="card-single-control">
                <div>
                    <span style="font-size: 0.9rem;">Status: </span>
                    <h1 class="card-value1" id="exhaustFanVal"></h1>
                    <span class="card-name1">Exhaust Fan</span>
                </div>

                <div class="icon-box1" id="exhaustFanVal-icon-box">
                    <i class="uil uil-wind"></i>
                </div>
            </div>

            <div class="card-single-control">
                <div>
                    <span style="font-size: 0.9rem;">Status: </span>
                    <h1 class="card-value1" id="mistingVal"></h1>
                    <span class="card-name1">Misting</span>
                </div>

                <div class="icon-box1" id="mistingVal-icon-box">
                    <i class="uil uil-tear"></i>
                </div>
            </div>
        </div>
    </div>


    <?php
    if(isset($_SESSION["userrole"])){
        if($_SESSION["userrole"] == "Admin"){
            echo "<h2 class=\"section__title\" style=\"margin-bottom: 1rem; font-size: 1.5rem;\">Manual Control</h2>
            <div class=\"dashboard-container\" style=\"text-align: center\"><iframe class=\"dashboard-content\" src=\"https://control.hydrotech.host/controldashboard\" frameborder=\"0\"></iframe></div>";
        }
    }
    ?>
    <h2 class="section__title" style="margin-bottom: 1rem; font-size: 1.5rem;">Analysis</h2>
    <div class="row">
        <div class="col col-sm-3">
            <div id="daterange_textbox" class="form-control">
                <i class="uil uil-calendar-alt"></i>
                <span>Date Range</span>
                <i class="uil uil-angle-down" style="padding-right: 8px; background:right no-repeat;"></i>
                <div>
                </div>
            </div>
        </div>
        <?php 
            if(isset($_SESSION["userrole"])){
                if($_SESSION["userrole"] === "Admin"){
                    echo "<div class=\"col col-sm-9\">
                        <button class=\"download-btn\" onclick=\"exportTableToExcel('order_table', 'Data Export')\"><i
                        class=\"uil uil-download-alt\"></i>Download</button>
                        </div>";
                }
            }
        ?>
    </div>
    <div class="analysis-chart" style="width:100%; height: 80vh;">
        <canvas id="chart_canvas" style="margin-top:30px;"> </canvas>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="order_table">
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Water Temperature</th>
                    <th>Room Temperature</th>
                    <th>Humidity</th>
                    <th>Electrical Conductivity</th>
                    <th>PH Value</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <?php 
        if(!isset($_SESSION["userrole"])){
    Echo "<div class=\"request__bg\">
        <div class=\"buttoncontainer\">
                <p class=\"request__label\">Are You an Admin?</p>
                <a href=\"Login.php\" name=\"request\" value=\"request admin\" class=\"btnselect\">Login<a>
        </div>
    </div>";
            }

    ?>
</div>


<script>

    $(document).ready(function () {

        fetch_data();
        datafetch();
        fetch_light();
        fetch_waterPump();
        fetch_aerator();
        fetch_exhaustFan();
        fetch_misting();
        setInterval(datafetch, 2000);
        setInterval(fetch_light, 2000);
        setInterval(fetch_waterPump, 2000);
        setInterval(fetch_aerator, 2000);
        setInterval(fetch_exhaustFan, 2000);
        setInterval(fetch_misting, 2000);

        var main_chart;

        function fetch_data(start_date = '', end_date = '') {
            var dataTable = $('#order_table').DataTable({
                "processing": true,
                "serverSide": true,
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "order": [],
                "ajax": {
                    url: "includes/analysis.inc.php",
                    type: "POST",
                    data: { action: 'fetch', start_date: start_date, end_date: end_date }
                },
                dom: 'lBfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        title: 'Data export',
                        text: 'Download'
                    }
                ],
                "drawCallback": function (settings) {
                    var Time = [];
                    var WaterTemperature = [];
                    var RoomTemperature = [];
                    var Humidity = [];
                    var ElectricalConductivity = [];
                    var PHValue = [];

                    for (var count = 0; count < settings.aoData.length; count++) {
                        Time.push(settings.aoData[count]._aData[0]);
                        WaterTemperature.push(parseFloat(settings.aoData[count]._aData[1]));
                        RoomTemperature.push(parseFloat(settings.aoData[count]._aData[2]));
                        Humidity.push(parseFloat(settings.aoData[count]._aData[3]));
                        ElectricalConductivity.push(parseFloat(settings.aoData[count]._aData[4]));
                        PHValue.push(parseFloat(settings.aoData[count]._aData[5]));
                    }

                    var chart_data = {
                        labels: Time,
                        datasets: [
                            {
                                label: 'Water Temperature',
                                borderColor: 'rgb(20, 217, 85)',
                                backgroundColor: 'rgb(20, 217, 85)',
                                color: '#14d955',
                                fill: false,
                                borderWidth: 2,
                                data: WaterTemperature
                            },
                            {
                                label: 'Room Temperature',
                                borderColor: 'rgb(255, 255, 0)',
                                backgroundColor: 'rgb(255, 255, 0)',
                                color: '#ffff00',
                                fill: false,
                                borderWidth: 2,
                                data: RoomTemperature
                            },
                            {
                                label: 'Humidity',
                                borderColor: 'rgb(219, 51, 13)',
                                backgroundColor: 'rgb(219, 51, 13)',
                                color: '#db330d',
                                fill: false,
                                borderWidth: 2,
                                data: Humidity
                            },
                            {
                                label: 'Electrical Conductivity',
                                borderColor: 'rgb(13, 16, 219)',
                                backgroundColor: 'rgb(13, 16, 219)',
                                color: '#0d10db',
                                fill: false,
                                borderWidth: 2,
                                data: ElectricalConductivity
                            },
                            {
                                label: 'PH Value',
                                borderColor: 'rgb(154, 48, 171)',
                                backgroundColor: 'rgb(154, 48, 171)',
                                color: '#9a30ab',
                                fill: false,
                                borderWidth: 2,
                                data: PHValue
                            }
                        ]
                    };

                    var group_chart3 = $('#chart_canvas');

                    if (main_chart) {
                        main_chart.destroy();
                    }

                    main_chart = new Chart(group_chart3, {
                        type: 'line',
                        data: chart_data,
                        options: {
                            animation: {
                                onComplete: () => {
                                    delayed = true;
                                },
                                delay: (context) => {
                                    let delay = 0;
                                    if (context.type === 'data' && context.mode === 'default' && !delayed) {
                                        delay = context.dataIndex * 300 + context.datasetIndex * 100;
                                    }
                                    return delay;
                                },
                            },
                            scales: {
                                x: {
                                    stacked: true,
                                },
                                y: {
                                    stacked: true
                                }
                            },
                            responsive: true,
                            maintainAspectRatio: false,
                            //responsive:false,
                        }
                    });
                }
            });
        }

        $("#daterange_textbox").daterangepicker({
            ranges: {
                'Today': [moment().startOf('day'), moment().endOf('day')],
                'Yesterday': [moment().subtract(1, 'days').startOf('day'), moment().subtract(1, 'days').endOf('day')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            //format : 'YYYY-MM-DD'
        }, function (start, end) {

            $('#order_table').DataTable().destroy();
            $('#daterange_textbox span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

            fetch_data(start.format(), end.format());
        });

        function datafetch() {
            $.ajax({
                url: "includes/dashboard.inc.php",
                method: "POST",
                data: { action: 'fetch_sensor' },

                success: function (data) {

                    var newdata = JSON.parse(data)

                    var watertempe = newdata.WaterTemperature;
                    var roomtempe = newdata.RoomTemperature;
                    var humid = newdata.Humidity;
                    var ecval = newdata.ElectricalConductivity;
                    var phvalue = newdata.PHValue;

                    document.getElementById("watertempVal").innerHTML = watertempe;
                    document.getElementById("watertempVal-label").innerHTML = " °C";
                    document.getElementById("roomtempVal").innerHTML = roomtempe;
                    document.getElementById("roomtempVal-label").innerHTML = " °C";
                    document.getElementById("humidVal").innerHTML = humid;
                    document.getElementById("humidVal-label").innerHTML = " %";
                    document.getElementById("ecVal").innerHTML = ecval;
                    document.getElementById("ecVal-label").innerHTML = " ms/cm";
                    document.getElementById("phVal").innerHTML = phvalue;
                    document.getElementById("phVal-label").innerHTML = " ph";

                    if (watertempe > 26) {
                        document.getElementById("watertempVal-status").innerHTML = "Not Normal";
                        document.getElementById("watertempVal").style.color = "hsl(0,57%,53%)";
                        document.getElementById("watertempVal-label").style.color = "hsl(0,69%,61%)";
                        document.getElementById("watertempVal-icon-box").style.color = "hsl(0,57%,53%)";
                    }
                    if (watertempe <= 26) {
                        document.getElementById("watertempVal-status").innerHTML = "Normal";
                        document.getElementById("watertempVal").style.color = "hsl(140, 6%, 13%)";
                        document.getElementById("watertempVal-label").style.color = "hsl(140, 6%, 13%)";
                        document.getElementById("watertempVal-icon-box").style.color = "hsl(140, 6%, 13%)";
                    }

                    if (roomtempe > 30) {
                        document.getElementById("roomtempVal-status").innerHTML = "Not Normal";
                        document.getElementById("roomtempVal").style.color = "hsl(0,57%,53%)";
                        document.getElementById("roomtempVal-label").style.color = "hsl(0,69%,61%)";
                        document.getElementById("roomtempVal-icon-box").style.color = "hsl(0,57%,53%)";
                    }
                    if (roomtempe <= 30) {
                        document.getElementById("roomtempVal-status").innerHTML = "Normal";
                        document.getElementById("roomtempVal").style.color = "hsl(140, 6%, 13%)";
                        document.getElementById("roomtempVal-label").style.color = "hsl(140, 6%, 13%)";
                        document.getElementById("roomtempVal-icon-box").style.color = "hsl(140, 6%, 13%)";
                    }

                    if (humid < 70) {
                        document.getElementById("humidVal-status").innerHTML = "Not Normal";
                        document.getElementById("humidVal").style.color = "hsl(0,57%,53%)";
                        document.getElementById("humidVal-label").style.color = "hsl(0,69%,61%)";
                        document.getElementById("humidVal-icon-box").style.color = "hsl(0,57%,53%)";
                    }
                    if (humid >= 70) {
                        document.getElementById("humidVal-status").innerHTML = "Normal";
                        document.getElementById("humidVal").style.color = "hsl(140, 6%, 13%)";
                        document.getElementById("humidVal-label").style.color = "hsl(140, 6%, 13%)";
                        document.getElementById("humidVal-icon-box").style.color = "hsl(140, 6%, 13%)";
                    }

                    if (ecval > 1.2 || ecval < 0.8) {
                        document.getElementById("ecVal-status").innerHTML = "Not Normal";
                        document.getElementById("ecVal").style.color = "hsl(0,57%,53%)";
                        document.getElementById("ecVal-label").style.color = "hsl(0,69%,61%)";
                        document.getElementById("ecVal-icon-box").style.color = "hsl(0,57%,53%)";
                    }
                    if (ecval <= 1.2 && ecval >= 0.8) {
                        document.getElementById("ecVal-status").innerHTML = "Normal";
                        document.getElementById("ecVal").style.color = "hsl(140, 6%, 13%)";
                        document.getElementById("ecVal-label").style.color = "hsl(140, 6%, 13%)";
                        document.getElementById("ecVal-icon-box").style.color = "hsl(140, 6%, 13%)";
                    }

                    if (phvalue > 6.5 || phvalue < 5.5) {
                        document.getElementById("phVal-status").innerHTML = "Not Normal";
                        document.getElementById("phVal").style.color = "hsl(0,57%,53%)";
                        document.getElementById("phVal-label").style.color = "hsl(0,69%,61%)";
                        document.getElementById("phVal-icon-box").style.color = "hsl(0,57%,53%)";
                    }
                    if (phvalue <= 6.5 && phvalue >= 5.5) {
                        document.getElementById("phVal-status").innerHTML = "Normal";
                        document.getElementById("phVal").style.color = "hsl(140, 6%, 13%)";
                        document.getElementById("phVal-label").style.color = "hsl(140, 6%, 13%)";
                        document.getElementById("phVal-icon-box").style.color = "hsl(140, 6%, 13%)";
                    }

                }
            });
        }
        function fetch_light() {
            $.ajax({
                url: "includes/dashboard.inc.php",
                method: "POST",
                data: { action: 'fetch_light' },

                success: function (data) {
                    var newdata = JSON.parse(data)
                    var lightVal = newdata.Actuator_data;
                    document.getElementById("lightVal").innerHTML = lightVal;

                    if (lightVal == 'OFF') {
                        document.getElementById("lightVal").style.color = "hsl(0,57%,53%)";
                        document.getElementById("lightVal-icon-box").style.color = "hsl(0,57%,53%)";
                    } else {
                        document.getElementById("lightVal").style.color = "hsl(140, 6%, 13%)";
                        document.getElementById("lightVal-icon-box").style.color = "hsl(140, 6%, 13%)";
                    }
                }
            });
        }
        function fetch_waterPump() {
            $.ajax({
                url: "includes/dashboard.inc.php",
                method: "POST",
                data: { action: 'fetch_waterPump' },

                success: function (data) {
                    var newdata = JSON.parse(data)
                    var waterPumpVal = newdata.Actuator_data;
                    document.getElementById("waterPumpVal").innerHTML = waterPumpVal;

                    if (waterPumpVal == 'OFF') {
                        document.getElementById("waterPumpVal").style.color = "hsl(0,57%,53%)";
                        document.getElementById("waterPumpVal-icon-box").style.color = "hsl(0,57%,53%)";
                    } else {
                        document.getElementById("waterPumpVal").style.color = "hsl(140, 6%, 13%)";
                        document.getElementById("waterPumpVal-icon-box").style.color = "hsl(140, 6%, 13%)";
                    }
                }
            });
        }
        function fetch_aerator() {
            $.ajax({
                url: "includes/dashboard.inc.php",
                method: "POST",
                data: { action: 'fetch_aerator' },

                success: function (data) {
                    var newdata = JSON.parse(data)
                    var aeratorVal = newdata.Actuator_data;
                    document.getElementById("aeratorVal").innerHTML = aeratorVal;

                    if (aeratorVal == 'OFF') {
                        document.getElementById("aeratorVal").style.color = "hsl(0,57%,53%)";
                        document.getElementById("aeratorVal-icon-box").style.color = "hsl(0,57%,53%)";
                    } else {
                        document.getElementById("aeratorVal").style.color = "hsl(140, 6%, 13%)";
                        document.getElementById("aeratorVal-icon-box").style.color = "hsl(140, 6%, 13%)";
                    }
                }
            });
        }
        function fetch_exhaustFan() {
            $.ajax({
                url: "includes/dashboard.inc.php",
                method: "POST",
                data: { action: 'fetch_exhaustFan' },

                success: function (data) {
                    var newdata = JSON.parse(data)
                    var exhaustFanVal = newdata.Actuator_data;
                    document.getElementById("exhaustFanVal").innerHTML = exhaustFanVal;

                    if (exhaustFanVal == 'OFF') {
                        document.getElementById("exhaustFanVal").style.color = "hsl(0,57%,53%)";
                        document.getElementById("exhaustFanVal-icon-box").style.color = "hsl(0,57%,53%)";
                    } else {
                        document.getElementById("exhaustFanVal").style.color = "hsl(140, 6%, 13%)";
                        document.getElementById("exhaustFanVal-icon-box").style.color = "hsl(140, 6%, 13%)";
                    }
                }
            });
        }
        function fetch_misting() {
            $.ajax({
                url: "includes/dashboard.inc.php",
                method: "POST",
                data: { action: 'fetch_misting' },

                success: function (data) {
                    var newdata = JSON.parse(data)
                    var mistingVal = newdata.Actuator_data;
                    document.getElementById("mistingVal").innerHTML = mistingVal;

                    if (mistingVal == 'OFF') {
                        document.getElementById("mistingVal").style.color = "hsl(0,57%,53%)";
                        document.getElementById("mistingVal-icon-box").style.color = "hsl(0,57%,53%)";
                    } else {
                        document.getElementById("mistingVal").style.color = "hsl(140, 6%, 13%)";
                        document.getElementById("mistingVal-icon-box").style.color = "hsl(140, 6%, 13%)";
                    }
                }
            });
        }
    });
    function exportTableToExcel(tableID, filename = '') {
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

        // Specify file name
        filename = filename ? filename + '.xls' : 'excel_data.xls';

        // Create download link element
        downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if (navigator.msSaveOrOpenBlob) {
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob(blob, filename);
        } else {
            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

            // Setting the file name
            downloadLink.download = filename;

            //triggering the function
            downloadLink.click();
        }
    }
</script>

<?php
include_once 'footer.php';
?>