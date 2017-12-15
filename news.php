<?php
session_start();
  
if(isset($_SESSION['adminid'])) 
    {
      
      
    //echo "<br />Welcome ".$_SESSION['userid']."!";//session is used to store data in var and send perticular data over multiple webpages.
   //echo $_SESSION['adminid'];
    }
?> 
<?php
include '../dbconfig.php';
mysqli_query($db, 'set names utf8');
extract($_POST);
     
if (isset($_POST['save'])) 
{
    $date1=$date;
  //$date1=$date.'-'.$month.'-'.$year;
$sql1="INSERT into news(title,description,datetime) values('$name','$incomplete','$date1')";
if (mysqli_query($db, $sql)) 
{
    echo "<script>alert('inserted sucessfully');window.location='news.php';</script>";
} else 
{
    echo "Error: " . $sql1 . "<br>" . mysqli_error($db);
}
}
//////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['save1'])) 
{
   
  $date11=$date;
//$sql="INSERT into news(title,description,datetime) values('$name','$incomplete','$date1')";
//echo $sql;die;
   $sql="UPDATE news SET  description = '$incomplete1', datetime = '$date11', title = '$name1' WHERE id = '".$_POST["bookId"]."'";
if (mysqli_query($db, $sql)) 
{
    echo "<script>alert('Updated sucessfully');window.location='news.php';</script>";
} else 
{
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}
}

?>




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

.nav-md{
  height: 500px;

  background-color: white;
}
.navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:focus, .navbar-inverse .navbar-nav > .active > a:hover {
    color: #red;
    background-color: #FFFFFF;
}
#l{
margin-left: -10px;
}
#l1{
margin-left: -10px;
}
.c{
  font-size: 17px;
}
#de{
  width: 690px;
  margin-left: -15px;
  margin-top: 10px;
}
#de1{
  width: 720px;
  margin-left: -15px;
}
#rr{
  color: #657287;
  font-family: sans-serif;
  font-size: 14px;
}
#del34{
  font-weight: bold;
  font-weight:900;
}
</style>


<head>

 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js"></script> 


   

   <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!--Font Awesome (added because you use icons in your prepend/append)-->
<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
<!-- Inline CSS based on choices in "Settings" tab -->

 </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include 'header.php';?>
        <!-- /top navigation -->

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
                  
              
                                 <h1><center> बातम्या </center></h1>
                 

                  <div class="x_content">
                 <div id="result"></div>
                <div class="tab-content">
                <div class="tab-pane active" id="tab1" role="tabpanel">
                <button data-toggle="modal" data-target="#addwork" class="btn btn-success pull-right"> बातम्या जतन करा </button>
                     <div class="col-md-12 col-sm-6 col-xs-12"  style="overflow-x:auto;">
                         <table class="table table-striped table-hover col-md-12 col-sm-4 col-xs-3 table-responsive">
                         <tr>
                           <th style="width: 10%;">क्र.</th>
                           <th style="width: 20%;">शीर्षक </th>
                           <th style="width: 30%;">वर्णन</th>
                           <th style="width: 20%;">तारीख </th>
                           <th style="width: 20%;">आकशन्स </th>
                         </tr>
                          <?php
                           include '../dbconfig.php';
						   mysqli_query($db, 'set names utf8');
                                $sql="SELECT * from news order by id desc ";
                               $result = mysqli_query($db,$sql);
                              $a=1;
                               while($row = mysqli_fetch_assoc($result)) 
                                {
                                ?>
                                    <tr style="font: 13px arial, sans-serif;">
                                    <td><?php echo $a++;?></a></td>
                                    <td><?php echo $row['title'];?></td>
                                    <td><?php echo $row['description'];?></td>
                                    <td><?php echo $row['datetime'];?></td>
                                      <td style='white-space: nowrap'> <!--Action-->
                                        <a onclick="return confirm('Are you sure?')" href="?idd=<?php echo $row['id'];?>" 
                                          class=btn btn-danger" id="del34" style="color:#005ef9;">કાડ઼ો</a>


                                        <a data-toggle="modal" 
                                        data-id1="<?php echo $row['id'];?>"  
                                        data-name="<?php echo $row['title'];?>" 
                                        data-name0="<?php echo $row['description'];?>" 
                                         data-date="<?php echo $row['datetime'];?>"
                                        class="btn  open-AddBookDialog" href="#addwork1" style="color: #005ef9;" id="del34"> સુદારો </a> 
      
                                        
                                    </td>
                                    </tr>
                           <?php
                              }
                               if(isset($_GET['idd']))
                {
                  $id0=$_GET['idd'];
                 
                //  $result=$mysqli->query("delete from cwork where cid='$idd' ");
                  $result="DELETE from news where id='$id0'";
                  //echo $result;die;
                  if(mysqli_query($db, $result))
                          {
                            echo "<script>alert('Data deleted from database');window.location='news.php';</script>";
                         }
                  
                }
                              ?>
                         </table> 
                        </div>


                        </div>
                       </div>
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
          <h4 class="modal-title">संपूर्ण झालेली कामे </h4>
        </div>

      <div class="modal-body">
              <form action="" method="POST" enctype="multipart/form-data">
  <input type="text" name="bookId" id="bookId" value=""  readonly=""   hidden="hidden" />
        <div class="col-md-12 col-sm-6 col-xs-12 form-group" >
         <label class="control-label col-md-4 col-sm-3 col-xs-12">बातम्यांचे शीर्षक  </label>
        <input type="text" name="name" id="name" class="form-control col-md-7 col-xs-12"  placeholder="शीर्षक">
        </div>

         <div class="bootstrap-iso">
                 <div class="container-fluid">
                  <div class="row">
                   <div class="col-md-12 col-sm-6 col-xs-12 form-group" >
                   
                     <div class="form-group" id="de">
                      <label class="control-label col-md-4 col-sm-3 col-xs-12" for="date"  id="rr">
                      दिनांक
                      
                      </label>
                      <div class="col-sm-10">
                       <div class="input-group ">
                        <div class="input-group-addon">
                         <i class="fa fa-calendar">
                         </i>
                        </div>

                        <input class="form-control col-md-7 col-xs-12" id="date" name="date" placeholder="YYYY/MM/DD" type="text"/>
                       </div>
                      </div>
                     </div>
                     
                   
                   </div>
                  </div>
                 </div>
              </div>


         <div class="col-md-12 col-sm-6 col-xs-12 form-group">
         
         <label class="control-label col-md-4 col-sm-3 col-xs-12"> बातम्यांचे वर्णन </label>
        <textarea rows="2" name="incomplete" id="incomplete" class="form-control col-md-7 col-xs-12"   placeholder=" बातम्यांचे  वर्णन"></textarea>
        </div>
        <div class="col-md-12 col-sm-6 col-xs-12 form-group">
         
          <button type="submit" class="btn btn-primary" name="save" id="save">बातम्या जतन करा</button>  
          </div>
 </form>
       </div>

        <div class="modal-footer hidden">
        </div>
       
      </div>
      
    </div>
  </div>



<div class="modal fade" id="addwork1" role="dialog" tabindex="-1" aria-labeledby="Create Plan Modal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">संपूर्ण झालेली कामे </h4>
        </div>

      <div class="modal-body1">
              <form action="" method="POST" enctype="multipart/form-data">
  <input type="text" name="bookId" id="bookId" value=""  readonly=""   hidden="hidden" />
        <div class="col-md-12 col-sm-6 col-xs-12 form-group" >
         <label class="control-label col-md-4 col-sm-3 col-xs-12">बातम्यांचे शीर्षक  </label>
        <input type="text" name="name1" id="name1" class="form-control col-md-7 col-xs-12"  placeholder="शीर्षक">
        </div>

         <div class="bootstrap-iso">
                 <div class="container-fluid">
                  <div class="row">
                   <div class="col-md-12 col-sm-6 col-xs-12 form-group" >
                   
                     <div class="form-group" id="de">
                      <label class="control-label col-md-4 col-sm-3 col-xs-12" for="date"  id="rr">
                      दिनांक
                      
                      </label>
                      <div class="col-sm-10">
                       <div class="input-group ">
                        <div class="input-group-addon">
                         <i class="fa fa-calendar">
                         </i>
                        </div>

                        <input class="form-control col-md-7 col-xs-12" id="date" name="date" placeholder="YYYY/MM/DD" type="text"/>
                       </div>
                      </div>
                     </div>
                     
                   
                   </div>
                  </div>
                 </div>
              </div>


         <div class="col-md-12 col-sm-6 col-xs-12 form-group">
         
         <label class="control-label col-md-4 col-sm-3 col-xs-12"> बातम्यांचे वर्णन </label>
        <textarea rows="2" name="incomplete1" id="incomplete1" class="form-control col-md-7 col-xs-12"   placeholder=" बातम्यांचे  वर्णन"></textarea>
        </div>
        <div class="col-md-12 col-sm-6 col-xs-12 form-group">
         
          <button type="submit" class="btn btn-primary" name="save1" id="save1">बातम्या जतन करा</button>  
          </div>
 </form>
       </div>

        <div class="modal-footer hidden">
        </div>
       
      </div>
      
    </div>
  </div>




 <?php include'footer.php';?>
   </body>
   </html>
<script type="text/javascript">
  $(document).on("click", ".open-AddBookDialog", function () {

     
   // alert( myBookId1);

     var myBookId = $(this).data('id1');
    
    $(".modal-body1 #bookId").val( myBookId );
    //alert( myBookId);
   var myBookId1 = $(this).data('name');
    
    $(".modal-body1 #name1").val( myBookId1 );
   // alert( myBookId1);
///////////////////////////////////////////////////////////////////
      var myBookId3 = $(this).data('date');  //date
     
    $(".modal-body1 #date").val( myBookId3 );
///////////////////////////////////////////////////////////////
var myBookId2 = $(this).data('name0');
    
    $(".modal-body1 #incomplete1").val( myBookId2 );

    //alert( myBookId2);
/////////////////////////////////////////////////////////////////
var myBookId4 = $(this).data('image');
    
    $(".modal-body1 #img11").val( myBookId4 );


});

</script>
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
