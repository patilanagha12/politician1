<!DOCTYPE html>
<html lang="en">
<?php include 'css.php';?>


 <style type="text/css">
  th {
    background-color: gray;
    color: white;
} 

.c{
  font-size: 17px;
}


.navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:focus, .navbar-inverse .navbar-nav > .active > a:hover {
    color: #red;
    background-color: #FFFFFF;
}
.nav-md{
  height: 500px;

  background-color: white;
}
#del34{
  font-weight: bold;
  font-weight:900;
}

</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

  <body class="nav-md">
    <div class="container body" id="c">
      <div class="main_container">
        <?php include 'header.php';?>
        <!-- /top navigation -->

        <!-- page content -->
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
               
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
             <h1><center>तक्रारी  </center></h1>
                  <div class="x_content">
                 <div id="result"></div>
              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="">
                    <div id="result"></div>
          
                    
                    <div class="form-group">
                        
                        <div class="col-md-12 col-sm-6 col-xs-12"  style="overflow-x:auto;">
                         <table class="table table-striped table-hover col-md-12 col-sm-4 col-xs-3 table-responsive active">
                         <tr>
                           <th style="width: 10%;">अनु. क्र.</th>
                           <th style="width: 20%;">नाव  </th>
                           <th style="width: 20%;">फोन नंबर </th>
                           <th style="width: 20%;">विषय </th>
                           <th style="width: 20%;">तक्रर </th>
                           <th style="width: 10%;">फोटो </th>
                         <th style="width: 20%;">आकशन्स </th>
                         </tr>
                          <?php
                         include '../dbconfig.php';
						 mysqli_query($db, 'set names utf8');
                                $sql="SELECT * from takrar order by Id desc";
                           $result = mysqli_query($db,$sql);

                              $a=1;
                               while($row = mysqli_fetch_assoc($result)) 
                                {
                                ?>
                         <tr style="font: 13px arial, sans-serif;">
                           <td><?php echo $a++;?></td>
                           <td><?php echo $row['name'];?> </td>
                           <td><?php echo $row['phone'];?> </td>
                           <td><?php echo $row['sub'];?> </td>
                           <td><?php echo $row['desce'];?> </td>
                           <td><img src="<?php echo $row['photo']; ?>" width="70px" height="80px"></td>
                            <td style='white-space: nowrap'> <!--Action-->
                                        <a onclick="return confirm('Are you sure?')" href="?idd=<?php echo $row['Id'];?>" 
                                          class=btn btn-danger" id="del34"  style="color:#005ef9;">काडून टाका</a>


                                        
                                        
                                    </td>
                          </tr>
                           <?php
                                }
                        if(isset($_GET['idd']))
                {
                  $id0=$_GET['idd'];
                 
                //  $result=$mysqli->query("delete from cwork where cid='$idd' ");
                  $result="DELETE from takrar where Id='$id0'";
                  //echo $result;die;
                  if(mysqli_query($db, $result))
                          {
                            echo "<script>alert('Row deleted from database');window.location='complaint1.php';</script>";
                         }
                  
                }
                              ?>
                         </table> 
                        </div>
                    </div>
                    </form>
                     </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>
            </div>
<div class="modal fade" id="addwork" role="dialog" tabindex="-1" aria-labeledby="Create Plan Modal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">फोटो संग्रह </h4>
        </div>

      <div class="modal-body">
              <form action="" method="POST" enctype="multipart/form-data">

        <div class="col-md-12 col-sm-6 col-xs-12 form-group" >
         <label class="control-label col-md-4 col-sm-3 col-xs-12">शीर्षक</label>
        <input type="text" name="name" id="name" class="form-control col-md-7 col-xs-12"  placeholder="कामाचे नाव">
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12 form-group">
         
         <label class="control-label col-md-3 col-sm-3 col-xs-12">पूर्ण दिनांक </label>
       <select name="date" id="date" class="form-control col-md-1 col-xs-12">

        <option value="">तारीख निवडा </option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
        
        
        </select> </div>

        <div class="col-md-4 col-sm-4 col-xs-12 form-group">
         
         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Description-Line-1">पूर्ण महिना 
 </label>
       <select name="month" id="month" class="form-control col-md-1 col-xs-12">

        <option value="">महिना निवडा </option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        
        
        
        </select> </div>

        <div class="col-md-4 col-sm-4 col-xs-12 form-group">
         
         <label class="control-label col-md-3 col-sm-3 col-xs-12" > पूर्ण वर्ष  </label>
        <select name="year" id="year" class="form-control col-md-1 col-xs-12">
        <option value="">वर्ष निवडा </option>
        <option value="2010">2010</option>
        <option value="2011">2011</option>
        <option value="2012">2012</option>
        <option value="2013">2013</option>
        <option value="2014">2014</option>
        <option value="2015">2015</option>
        <option value="2016">2016</option>
        <option value="2017">2017</option>
        <option value="2018">2018</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
        
        
        </select>
        </div>


        <div class="col-md-12 col-sm-6 col-xs-12 form-group">
         
         <label class="control-label col-md-4 col-sm-3 col-xs-12">फोटो </label>
        <input type="file" name="img1" id="img1" class="form-control col-md-7 col-xs-12"></textarea>
        </div>
          <button type="submit" class="btn btn-primary" name="save" id="save">जतन करा</button>  
 </form>
       </div>

   
      </div>
      
    </div>
  </div>







 <?php include'footer.php';?>
   </body>
   </html>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
  $(document).ready(function(){
    var date_input=$('input[name="date"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
      format: 'yyyy/mm/dd',
      container: container,
      todayHighlight: true,
      autoclose: true,
    })
  })
</script>
