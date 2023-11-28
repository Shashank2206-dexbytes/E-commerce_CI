<?php include 'template/header.php' ?>

<div id="main-wrapper">
<?php include 'template/navbar.php' ?>
<?php include "template/sidebar.php" ?>

        <div class="content-body">

            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-2 ">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Active Customer</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">50</h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 ">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total <br>Orders</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">50</h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 ">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Active <br>Orders</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">50</h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Completed Orders</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">50</h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Cancelled Orders</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">50</h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card" id="map">
                            <div class="card-body">
                                <h4 class="card-title">Order Summary</h4>
                                <select name="" id="chartbox">
                                    <option value="Month">Month</option>
                                    <option value="Year">Year</option>
                                    <option value="Week">Week</option>
                                </select>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                                <canvas id="myChart" style="width:100%;width:800px"></canvas>

                                <script>

                                </script>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
       
    </div>
   
 <?php include "template/footer.php" ?>

