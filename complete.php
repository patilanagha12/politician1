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
      echo "<script>alert(komal);</script>";
if (isset($_POST['save'])) 
{
    $pic = rand(1000,100000)."-".$_FILES['img1']['name'];
    $pic_loc = $_FILES['img1']['tmp_name'];
    $folder="img/";
    $path="img/".$pic;
    if (!$pic_loc)
     {
       echo "<script>alert('Can't insert properly');window.location='incomplete_work.php';</script>";     
    }
    elseif(move_uploaded_file($pic_loc,$folder.$pic))
    {

                  $date1=$date;
                   //$file = addslashes(file_get_contents($_FILES["img1"]["tmp_name"]));
                $sql="INSERT into cwork(ctitle,cdate,cdes,cimg,cname) values('$name','$date1','$incomplete','$path','$pic_loc')";
                 
 
if (mysqli_query( $db,$sql)) 
{
    echo "<script>alert('inserted sucessfully');window.location='complete.php';</script>";
} else 
{
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}
}

}
/////////////////////////////Update image //////////////////////////////
       if (isset($_POST['save1'])) 
    {
          $pic = rand(1000,100000)."-".$_FILES['img11']['name'];
          $pic_loc = $_FILES['img11']['tmp_name'];
          $folder="img/";
          $path="img/".$pic;
          if (!$pic_loc)
          {
             echo "<script>alert('Can't insert properly');window.location='incomplete_work.php';</script>";     
          }
          elseif(move_uploaded_file($pic_loc,$folder.$pic))
          {  
            $date11=$date;
           
                 // $date1=$year.'-'.$date.'-'.$month;
               // $sql="INSERT into cwork(ctitle,cdate,cdes,cimg) values('$name','$date1','$incomplete','$path')";
            $sql="UPDATE cwork SET cimg = '$path', cdes = '$incomplete1', cdate = '$date11', ctitle = '$name1',cname = '$pic_loc' WHERE cid = '".$_POST["bookId"]."'";
          //echo $sql;die;
                 
                 
                if (mysqli_query( $db,$sql)) 
                {
                    echo "<script>alert('Updated sucessfully');window.location='complete.php';</script>";
                } else 
                {
                    echo "Error: " . $sql . "<br>" . mysqli_error($db);
                }
          }

    }



?>





<!DOCTYPE html>
<html lang="en">

 <?php include 'css.php';?>
 
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 </head>
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
#d{
  margin-left:-14px;

}

#save1{
  margin-top: 10px;
  margin-right: 350px;
  margin-left: 10px;
}

#save{
  margin-top: 10px;
  margin-right: 350px;
  margin-left: 10px;
}



#hh{
  margin-top: 10px;
}

#de{
  width: 680px;
  margin-left: -15px;
}
#de1{
  width: 700px;
  margin-left: -15px;
}

.row{
  height: 100%;

  background-color: white;
}
#del34{
  font-weight: bold;
  font-weight:900;
}
</style>
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
                  
              
                                 <h1><center>केलेली कामे </center></h1>
                 

                  <div class="x_content">
                 <div id="result"></div>
                <div class="tab-content">
                <div class="tab-pane active" id="tab1" role="tabpanel">
                <button data-toggle="modal" data-target="#addwork" class="btn btn-success pull-right">कामे जतन करा </button>
                     <div class="col-md-12 col-sm-6 col-xs-12"  style="overflow-x:auto;">
                         <table class="table table-striped table-hover col-md-12 col-sm-4 col-xs-3 table-responsive">
                         <tr>
                           <th style="width: 10%;">क्र.</th>
                           <th style="width: 20%;">कामे </th>
                           <th style="width: 20%;">तारीख </th>
                           <th style="width: 30%;">वर्णन</th>
                           <th style="width: 20%;">फोटो </th>
                           <th style="width: 20%;">आकशन्स </th>
                           
						   
                         </tr>
                          <?php
                           include '../dbconfig.php';
						   mysqli_query($db, 'set names utf8');
                                $sql="SELECT * from cwork order by cid desc ";
                               $result = mysqli_query($db,$sql);
                              $a=1;
                               while($row = mysqli_fetch_assoc($result)) 
                                {
                                ?>
                                    <tr style="font: 13px arial, sans-serif;">
                                    <td><?php echo $a++;?></a></td>
                                    <td><?php echo $row['ctitle'];?></td>
                                    <td><?php echo $row['cdate'];?></td>
                                    <td><?php echo $row['cdes'];?></td>
                                    
								
								<td><img src="<?php echo $row['cimg']; ?>" width="70px" height="80px"></td>
								   <td style='white-space: nowrap'> <!--Action-->
                                        <a onclick="return confirm('Are you sure?')" href="?idd=<?php echo $row['cid'];?>" 
                                          class=btn btn-danger" id="del34"  style="color:#005ef9;">काडून टाका</a>


                                        <a data-toggle="modal" 
                                        data-id="<?php echo $row['cid'];?>"  
                                        data-name="<?php echo $row['ctitle'];?>" 
                                        data-date="<?php echo $row['cdate'];?>"
                                        data-name0="<?php echo $row['cdes'];?>" 
                                        data-image="<?php echo($row['cimg'] )?>" 
                                        class="btn  open-AddBookDialog" href="#addwork1"  style="color:#005ef9;" id="del34">सुधारणा</a> 
      
                                        
                                    </td>
                                    
                                    </tr>
                           <?php
                              }
                               if(isset($_GET['idd']))
                {
                  $id0=$_GET['idd'];
                 
                //  $result=$mysqli->query("delete from cwork where cid='$idd' ");
                  $result="DELETE from cwork where cid='$id0'";
                  //echo $result;die;
                  if(mysqli_query($db, $result))
                          {
                            echo "<script>alert('Image deleted from database');window.location='complete.php';</script>";
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
         <input type="text" name="bookId" id="bookId" value=""  readonly=""  hidden="hidden"  />
        <div class="col-md-12 col-sm-6 col-xs-12 form-group" >
         <label class="control-label col-md-4 col-sm-3 col-xs-12">कामाचे नाव </label>
        <input type="text" name="name" id="name" class="form-control col-md-7 col-xs-12"  placeholder="कामाचे नाव">
        </div>

        <div class="bootstrap-iso">
                 <div class="container-fluid">
                  <div class="row1">
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
         
         <label class="control-label col-md-4 col-sm-3 col-xs-12">संपूर्ण झालेल्या कामाचे वर्णन </label>
        <textarea rows="2" name="incomplete" id="incomplete" class="form-control col-md-7 col-xs-12"   placeholder="अपूर्ण कामाचे वर्णन"></textarea>
        </div>

        <div class="col-md-12 col-sm-6 col-xs-12 form-group">
         
         <label class="control-label col-md-4 col-sm-3 col-xs-12">फोटो </label>
        <input type="file" name="img1" id="img1" class="form-control col-md-7 col-xs-12"></textarea>
        </div>
          <button type="submit" class="btn btn-primary" name="save" id="save">जतन करा</button>  
 </form>
       </div>

        <div class="modal-footer">
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
         <input type="text" name="bookId" id="bookId" value=""  readonly=""  hidden="hidden"  />
        <div class="col-md-12 col-sm-6 col-xs-12 form-group" >
         <label class="control-label col-md-4 col-sm-3 col-xs-12">कामाचे नाव </label>
        <input type="text" name="name1" id="name1" class="form-control col-md-7 col-xs-12"  placeholder="कामाचे नाव">
        </div>

        <div class="bootstrap-iso">
                 <div class="container-fluid">
                  <div class="row">
                   <div class="col-md-12 col-sm-6 col-xs-12 form-group" >
                   
                     <div class="form-group" id="de1">
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
         
         <label class="control-label col-md-4 col-sm-3 col-xs-12">संपूर्ण झालेल्या कामाचे वर्णन </label>
        <textarea rows="2" name="incomplete1" id="incomplete1" class="form-control col-md-7 col-xs-12"   placeholder="अपूर्ण कामाचे वर्णन"></textarea>
        </div>

      
                <div class="col-md-9 col-sm-6 col-xs-12 form-group" id="hh">
                   <label>फोटोचे नाव:</label>
                     <input type="text" name="img11" id="img11" class="form-control col-md-7 col-xs-12" value="<?php echo $row['cimg']; ?>" readonly>

                 </div>
        <div class="col-md-12 col-sm-6 col-xs-12 form-group">
         
         <label class="control-label col-md-4 col-sm-3 col-xs-12">फोटो </label>
        <input type="file" name="img11" id="img11" class="form-control col-md-7 col-xs-12"></textarea>
        </div>
          <button type="submit" class="btn btn-primary" name="save1" id="save1">जतन करा</button>  
 </form>
       </div>

        <div class="modal-footer">
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

     var myBookId = $(this).data('id');
    
    $(".modal-body1 #bookId").val( myBookId );
    //alert( myBookId);
///////////////////////////////////////////////////////////////////////
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


  /////////////////////////////////////////////////////////////
});

</script>
<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->
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
