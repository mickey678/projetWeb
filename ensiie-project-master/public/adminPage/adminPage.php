<?php

if ($_SESSION['name'] == " ") {
   header('Location: ../index.php'); 
}
require 'header/header.php';
?>
         <body>
            <div id="page-wrapper" style="min-height: 829px;">
                    <div class="row">
                        <div class="col-lg-8" id="inlineBlock">
                        <p id="ensiie">ENSIIE</p>
                             <h1 class="page-header" id="bonjour"> </h1>
                             
                        </div>
                <!-- /.col-lg-8 -->
                    </div>
                    <!-- /.row -->
                            <div class="row" id="contener1">
                                <div class="col-lg-4 col-md-6">
                                   <div id="menu">
                                       <div id="createFood">
                                            Add food
                                        </div>
                                        <div id="editFood">
                                            Edit food
                                        </div>
                                        <div id="deleteFood">
                                            Delete food
                                        </div>
                                        <div id="listFood">
                                            Look in fridge  
                                        </div>
                                   </div>
                                </div>
                            <div class="row" id="contener1">
                                <div class="col-lg-4 col-md-6">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <i class="fa fa-comments fa-5x"></i>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <div class="huge"></div>
                                                    <div>Produits dans votre frigo</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <i class="fa fa-comments fa-5x"></i>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <div class="huge" id="available"></div>
                                                    <div>Produits dans votre frigo</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <i class="fa fa-comments fa-5x"></i>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <div class="huge"></div>
                                                    <div>Produits dans votre frigo</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                </div>
            <div id="content">
                frigo
            </div>
