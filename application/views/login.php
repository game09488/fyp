<!DOCTYPE html>
<html>
	<head>
		<title>Login Page</title>
		<link rel="stylesheet" href="<?php echo base_url()."bower_components/bootstrap/dist/css/bootstrap.css" ?>" type="text/css"/>
		<link rel="stylesheet" href="<?php echo base_url()."dist/css/AdminLTE.min.css"; ?>" type="text/css"/>
		<style>
			.loginbox{
				margin: 180px auto;
				width: 450px;
				position: relative;
				border-radius: 15px;
				background: #ffffff;
			}
			body{
				background-color: rgb(209,209,209);
			}
		</style>
	</head>
	<body>
		  <!-- Horizontal Form -->
          <div class="box box-info loginbox">
            <div class="box-header with-border">
              <h3 class="box-title">Login Form</h3>
            </div>
            <!-- /.box-header -->
			<?php echo validation_errors('<div class="alert alert-danger">','</div>')?>
            <!-- form start -->
            <form class="form-horizontal" method="post" action="<?php echo base_url()?>main/login?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" maxlength="20" name="username" placeholder="Username">					
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" maxlength="10" name="password" placeholder="Password">					
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" name="insert" class="btn btn-info pull-right" value="Login">Sign in</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
	</body>
</html>