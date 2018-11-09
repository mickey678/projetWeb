<div id="page-wrapper" style="min-height: 829px;">
                    <div class="row">
                        <div class="col-lg-12">
                             <h1 class="page-header" id="bonjour"> </h1>
                             <h2 class="page-header" id="iduser"> </h2>
                        </div>
                <!-- /.col-lg-8 -->
                    </div>
                    <!-- /.row -->
                            <div class="row" id="contener1">
                                <div class="col-lg-2 col-md-1">
                                   <div id="menu">
                                       <div id="createFood">
                                            <a href="#/addFood">Add food</a>
                                        </div>
                                        <div id="editFood">
                                            <a href="#/editFood">Edit food<a>
                                        </div>
                                        <div id="deleteFood">
                                            <a href="#/deleteFood">Delete food</a>
                                        </div>
                                        <div id="listFood">
                                            <a href="#/">Look in fridge</a>  
                                        </div>
                                   </div>
                                </div>
            
                                <div class="card text-white bg-primary mb-2" style="max-width: 18rem;" id="contener123">
                                    <div class="card-header">Available</div>
                                        <div class="card-body">
                                            <h5 class="card-title" id="produitsDispo"></h5>
                                               
                                        </div>
                                </div>
                           &nbsp;  &nbsp;
                                <div class="card text-white bg-primary mb-2" style="max-width: 18rem;" id="contener223">
                                    <div class="card-header">Consumed: </div>
                                        <div class="card-body">
                                            <h5 id="consumed" class="card-title"> </h5>
                                               
                                        </div>
                                </div>
                </div>
                <div id="datas"></div>
    <script src="http://code.jquery.com/jquery-2.0.3.min.js" ></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>