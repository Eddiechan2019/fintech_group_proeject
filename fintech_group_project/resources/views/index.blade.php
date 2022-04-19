<?php

$min_risk_portfolios_data = json_decode(json_encode($min_risk_portfolios_data), true);
$high_return_portfolios_data = json_decode(json_encode($high_return_portfolios_data), true);

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


            <main>
                <div class="container-xl">
                    <h3 class="mb-2 mt-2">Gold ETF Portfolio Comparison Table</h3>
                </div>

                <div class="container-xl">
                    <h4 class="p-3 mb-2 bg-success text-white rounded">Min Risk Portoflio</h4>

                    <div class="row g-4">
                        <div class="col-sm-6 col-xl-6">
                            <div class="p-3 mb-2 bg-light text-dark rounded border border-success ">
                                <div class="row">
                                    <div class="col-sm my-auto">
                                        <h4 class="text-left">Return Rate</h4>
                                    </div>

                                    <div class="col-4 my-auto">
                                        <h5 class="text-left">{{round($min_risk_portfolios_data['Return Rate']*100,4)}}%</h5>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-6 col-xl-6">
                            <div class="p-3 mb-2 bg-light text-dark rounded border border-success">
                                <div class="row">
                                    <div class="col-sm my-auto">
                                        <h4 class="text-left">Risk Rate</h4>
                                    </div>

                                    <div class="col-4 my-auto">
                                        <h5 class="text-left">{{round($min_risk_portfolios_data['Risk'],4)}}%</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-xl">
                    <h4 class="p-3 mb-2 bg-primary text-white rounded">Max Return Portoflio</h4>

                    <div class="row g-4">
                        <div class="col-sm-6 col-xl-6">
                            <div class="p-3 mb-2 bg-blue text-dark rounded border border-primary ">
                                <div class="row">
                                    <div class="col-sm my-auto">
                                        <h4 class="text-left">Return Rate</h4>
                                    </div>

                                    <div class="col-4 my-auto">
                                        <h5 class="text-left">{{round($high_return_portfolios_data['Return Rate']*100,4)}}%</h5>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-6 col-xl-6">
                            <div class="p-3 mb-2 bg-light text-dark rounded border border-primary">
                                <div class="row">
                                    <div class="col-sm my-auto">
                                        <h4 class="text-left">Risk Rate</h4>
                                    </div>

                                    <div class="col-4 my-auto">
                                        <h5 class="text-left">{{round($high_return_portfolios_data['Risk'],4)}}%</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-xl">
                    <h4 class="p-3 mb-2 bg-dark text-white rounded">Extra Condition for the Portfolio</h4>

                    <div class="row g-4">
                        <div class="col-sm-6 col-xl-6">
                            <div class="p-3 mb-2 bg-blue text-dark rounded border border-dark ">
                                <div class="row">
                                    <div class="col-sm my-auto">
                                        <h4 class="text-left">At Least Return Rate</h4>
                                    </div>

                                    <div class="col-4 my-auto">
                                        <input type="number" id="accepted_return">%
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-6 col-xl-6">
                            <div class="p-3 mb-2 bg-light text-dark rounded border border-dark">
                                <div class="row">
                                    <div class="col-sm my-auto">
                                        <h4 class="text-left">Acceptable Risk Rate (No Higher Than)</h4>
                                    </div>

                                    <div class="col-4 my-auto">
                                        <input type="number" id="accepted_risk">%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                

                <div class="container-xl">
                    <table id="example" class="display" style="width:100%; height: 800px">

                        <thead>
                            <tr>
                                <th><b>Portoflio ID</b></th>
                                <th><b>Return Rate</b></th>
                                <th><b>Risk Rate</b></th>
                                <th><b>DBP Ratio</b></th>
                                <th><b>DGL Ratio</b></th>
                                <th><b>DGP Ratio</b></th>
                                <th><b>DGZ Ratio</b></th>
                                <th><b>DZZ Ratio</b></th>
                                <th><b>GLD Ratio</b></th>
                                <th><b>GLL Ratio</b></th>
                                <th><b>IAU Ratio</b></th>
                                <th><b>SGOL Ratio</b></th>
                                <th><b>UGL Ratio</b></th>
                                <!-- <td colspan="2"><b>Action</b></td> -->
                            </tr>
                        </thead>
                        <tbody id="tableData">
                            <?php
                            if (isset($portfolios_data)) {
                                $portfolios_data = json_decode(json_encode($portfolios_data), true);

                                $html_tabl = "";
                                for ($i = 0; $i < count($portfolios_data['Return Rate']); $i++) {
                                // for ($i = 0; $i < 100; $i++) {
                                    $html_tabl .= "<tr>";
                                    $html_tabl .= "<td>";
                                    $html_tabl .= strval($i + 1);
                                    $html_tabl .= "</td>";

                                    $html_tabl .= "<td>";
                                    $html_tabl .= strval(round($portfolios_data['Return Rate'][$i], 4) * 100);
                                    $html_tabl .= "%";
                                    $html_tabl .= "</td>";

                                    $html_tabl .= "<td>";
                                    $html_tabl .= strval(round($portfolios_data['Risk'][$i], 4));
                                    $html_tabl .= "%";
                                    $html_tabl .= "</td>";

                                    $html_tabl .= "<td>";
                                    $html_tabl .= strval(round($portfolios_data['DBP weight'][$i], 4) * 100);
                                    $html_tabl .= "%";
                                    $html_tabl .= "</td>";

                                    $html_tabl .= "<td>";
                                    $html_tabl .= strval(round($portfolios_data['DGL weight'][$i], 4)*100);
                                    $html_tabl .= "%";
                                    $html_tabl .= "</td>";

                                    $html_tabl .= "<td>";
                                    $html_tabl .= strval(round($portfolios_data['DGP weight'][$i], 4)*100);
                                    $html_tabl .= "%";
                                    $html_tabl .= "</td>";

                                    $html_tabl .= "<td>";
                                    $html_tabl .= strval(round($portfolios_data['DGZ weight'][$i], 4)*100);
                                    $html_tabl .= "%";
                                    $html_tabl .= "</td>";

                                    $html_tabl .= "<td>";
                                    $html_tabl .= strval(round($portfolios_data['DZZ weight'][$i], 4)*100);
                                    $html_tabl .= "%";
                                    $html_tabl .= "</td>";

                                    $html_tabl .= "<td>";
                                    $html_tabl .= strval(round($portfolios_data['GLD weight'][$i], 4)*100);
                                    $html_tabl .= "%";
                                    $html_tabl .= "</td>";

                                    $html_tabl .= "<td>";
                                    $html_tabl .= strval(round($portfolios_data['GLL weight'][$i], 4)*100);
                                    $html_tabl .= "%";
                                    $html_tabl .= "</td>";

                                    $html_tabl .= "<td>";
                                    $html_tabl .= strval(round($portfolios_data['IAU weight'][$i], 4)*100);
                                    $html_tabl .= "%";
                                    $html_tabl .= "</td>";

                                    $html_tabl .= "<td>";
                                    $html_tabl .= strval(round($portfolios_data['SGOL weight'][$i], 4)*100);
                                    $html_tabl .= "%";
                                    $html_tabl .= "</td>";

                                    $html_tabl .= "<td>";
                                    $html_tabl .= strval(round($portfolios_data['UGL weight'][$i], 4)*100);
                                    $html_tabl .= "%";
                                    $html_tabl .= "</td>";


                                    $html_tabl .= "</tr>";
                                }

                                echo $html_tabl;
                            }
                            ?>

                        </tbody>

                        <tfoot>
                            <tr>
                                <th><b>Portoflio ID</b></th>
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
        $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var accepted_risk = $('#accepted_risk').val();
                    var accepted_return = $('#accepted_return').val();

                    var portfolio_return = parseFloat(data[1]);
                    var risk = parseFloat(data[2]);

                    if(accepted_risk == "" && accepted_return == ""){
                        return true
                    }

                    if((accepted_risk > risk && accepted_return <= portfolio_return) ||
                        (accepted_risk > risk && portfolio_return == "") ||
                        (accepted_return <= portfolio_return && accepted_risk == "")){
                        return true
                    }else{
                        return false
                    }

                    if (accepted_risk > risk) {
                        return true
                    } else {
                        return false
                    }

                }
            );

        $(document).ready(function() {
            $('#example thead tr')
                .clone(true)
                .addClass('filters')
                .appendTo('#example thead');

                var table = $('#example').DataTable({
                pagingType: 'full_numbers',
                lengthMenu: [
                    [50, 100, 200, 300 - 1],
                    [50, 100, 200, 300, "All"]
                ],
                orderCellsTop: true,
                fixedHeader: true,
                initComplete: function() {
                    var api = this.api();

                    // For each column
                    api.columns()
                        .eq(0)
                        .each(function(colIdx) {
                            // Set the header cell to contain the input element
                            var cell = $('.filters th').eq(
                                $(api.column(colIdx).header()).index()
                            );
                            var title = $(cell).text();

                            $(cell).html('<input type="text" placeholder="' + title + '" style="width:50px" />');

                            // On every keypress in this input
                            $('input', $('.filters th').eq($(api.column(colIdx).header()).index()))
                                .off('keyup change')
                                .on('keyup change', function(e) {
                                    e.stopPropagation();

                                    // Get the search value
                                    $(this).attr('title', $(this).val());
                                    var regexr = '({search})';

                                    var cursorPosition = this.selectionStart;

                                    // Search the column for that value
                                    api.column(colIdx)
                                        .search(
                                            this.value != '' ?
                                            regexr.replace('{search}', '(((' + this.value + ')))') :
                                            '',
                                            this.value != '',
                                            this.value == ''
                                        )
                                        .draw();

                                    $(this)
                                        .focus()[0]
                                        .setSelectionRange(cursorPosition, cursorPosition);
                                });
                        });
                },
            });

            $('#accepted_risk, #accepted_return').keyup( function() {
                table.draw();
            } );



        });
        

            


    </script>

</body>

</html>