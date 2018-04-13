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
            <!-- /.box-header -->
			<?php echo validation_errors('<div class="alert alert-danger">','</div>')?>
            <!-- form start -->
			<form class="form-horizontal" method="post" action="<?php echo base_url()?>lecturer/submit">
				<div class="box-body">			
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-8 control-label">Insert TP Number</label>
						<div class="col-sm-12">
						<input type="text" class="form-control" name="tp" placeholder="e.g. TP123446">
						</div>
					</div>
				</div>					
				<div class="modal-footer">
					<input type="hidden" name="status" value="Present">
					<input type="submit" class="btn btn-primary" name="insert" value="Done"/>
				</div>			
			</form>
          </div>
	</body>
</html>