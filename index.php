<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'css1.php';?>
  </head>

  <body>
    <div>
     
      <div class="login_wrapper">
        <div class="animate form login_form">
         <section class="login_content" style="padding-top: 100px;">
            <form action="logincheck.php" method="POST">
              <h1 style="text-align: center;color: white"> रोहित आप्पा काटे <br><br>लॉगिन </h1>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" required="required" id="uname" name="uname" />
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" required="required" id="pass" name="pass" />
              </div>
              <div class="clearfix"></div>

              <div class="separator">
              
              </div>
              <div class="form-group">
                <input type="submit" name="login" id="login" value="Login" class="btn btn-success">
              </div>
            </form>
          </section>
      
       </div>
       </div>
       </div>
  </body>
</html>
