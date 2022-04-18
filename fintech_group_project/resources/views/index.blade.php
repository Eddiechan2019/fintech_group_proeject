<?php

$dataPoints = array();

if (isset($stock_historical_data->data)) {
    foreach ($stock_historical_data->data as $data_no => $stock_data) {
        array_push($dataPoints, array("y" => round($stock_data[5], 2), "label" => $stock_data[0]));
    }
}

?>

<!doctype html>
<html lang="en" translate="no">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Fintech Group Project</title>

    <!-- Bootstrap CSS -->
    <link href="{{asset('css/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">

    <!-- Custom styles for side bar -->
    <link href="{{asset('css/sidebar.css')}}" rel="stylesheet">

    <!-- Call Fa Icon library -->
    <script src="https://kit.fontawesome.com/d1ef0c2517.js" crossorigin="anonymous"></script>
    
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>

<body>

    <!-- Including header -->
    @include('layouts.header')

    <div class="container-fluid">
        <div class="row">

            <!-- Including sidebar menu -->
            @include('layouts.sidebar_menu')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <table id="example" class="display" style="width:100%; height: 800px">

                    <thead>
                        <tr>
                            <th><b>Return Rate</b></th>
                            <th><b>Risk Rate</b></th>
                            <th><b>DBP weight</b></th>
                            <th><b>DGL weight</b></th>
                            <th><b>DGP weight</b></th>
                            <th><b>DGZ weight</b></th>
                            <th><b>DZZ weight</b></th>
                            <th><b>GLD weight</b></th>
                            <th><b>GLL weight</b></th>
                            <th><b>IAU weight</b></th>
                            <th><b>SGOL weight</b></th>
                            <th><b>UGL weight</b></th>
                            <!-- <td colspan="2"><b>Action</b></td> -->
                        </tr>
                    </thead>
                    <tbody id="tableData">
                        <?php
                            if(isset($portfolios_data)){
                                $portfolios_data = json_decode(json_encode($portfolios_data), true);

                                for ($i = 0; $i < count($portfolios_data['Return Rate']); $i++) {
                                    echo "<tr>";
                                        echo "<td>";
                                        echo strval($portfolios_data['Return Rate'][$i]);
                                        echo "</td>";

                                        echo "<td>";
                                        echo strval($portfolios_data['Risk'][$i]);
                                        echo "</td>";

                                        echo "<td>";
                                        echo strval($portfolios_data['DBP weight'][$i]);
                                        echo "</td>";

                                        echo "<td>";
                                        echo strval($portfolios_data['DGL weight'][$i]);
                                        echo "</td>";

                                        echo "<td>";
                                        echo strval($portfolios_data['DGP weight'][$i]);
                                        echo "</td>";

                                        echo "<td>";
                                        echo strval($portfolios_data['DGZ weight'][$i]);
                                        echo "</td>";

                                        echo "<td>";
                                        echo strval($portfolios_data['DZZ weight'][$i]);
                                        echo "</td>";

                                        echo "<td>";
                                        echo strval($portfolios_data['GLD weight'][$i]);
                                        echo "</td>";

                                        echo "<td>";
                                        echo strval($portfolios_data['GLL weight'][$i]);
                                        echo "</td>";

                                        echo "<td>";
                                        echo strval($portfolios_data['IAU weight'][$i]);
                                        echo "</td>";

                                        echo "<td>";
                                        echo strval($portfolios_data['SGOL weight'][$i]);
                                        echo "</td>";
                                        
                                        echo "<td>";
                                        echo strval($portfolios_data['UGL weight'][$i]);
                                        echo "</td>";


                                    echo "</tr>";
                                }
                                
                            }
                        ?>

                    </tbody>

                    <tfoot>
                        <tr>
                            <th><b>Return Rate</b></th>
                                <th><b>Risk Rate</b></th>
                                <th><b>DBP weight</b></th>
                                <th><b>DGL weight</b></th>
                                <th><b>DGP weight</b></th>
                                <th><b>DGZ weight</b></th>
                                <th><b>DZZ weight</b></th>
                                <th><b>GLD weight</b></th>
                                <th><b>GLL weight</b></th>
                                <th><b>IAU weight</b></th>
                                <th><b>SGOL weight</b></th>
                                <th><b>UGL weight</b></th>
                        </tr>
                    </tfoot>

                    </table>
                </div>

            </main>
        </div>
    </div>

    <script src="{{asset('js/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <script>
        window.onload = function() {
            
            document.getElementById("sidebar-stock").style.color = "white";
        }

        $(document).ready(function() {
            $('#example').DataTable({
                pagingType: 'full_numbers',
                lengthMenu: [
                    [50, 100, 200, 300 -1],
                    [50, 100, 200, 300, "All"]
                ]
            });
        } );

    </script>

</body>

</html>