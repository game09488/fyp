<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	<!-- Title -->
	<header class="main-header">   
    <a href="<?php echo base_url(); ?>admin/p_admin" class="logo">
      <span class="logo-mini">APU</span>
      <span class="logo-lg">Attendance System</span>
    </a>
    <!-- /.Title -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
	  <div class="navbar-custom-menu">
		<ul class="nav navbar-nav">
			<li class="messages-menu">
				<a href= "<?php echo base_url(); ?>main/logout">Logout</a>
			</li>
		</ul>
	   </div>
    </nav>
  </header>
</div>
  <!-- sidebar --> 
  <aside class="main-sidebar">
    <section class="sidebar">
       
	  <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Hello, <?php echo $_SESSION['admin_name'];?></li>
		<li>
          <a href="<?php echo base_url(); ?>admin/p_admin_cm">
            <i class="fa fa-calendar-o"></i><span>Course Management</span>
          </a>
        </li>		
		<li>
          <a href="<?php echo base_url(); ?>admin/p_admin_sr">
            <i class="fa fa-user"></i><span>Student Records</span>
          </a>
        </li>
		<li>
          <a href="<?php echo base_url(); ?>admin/p_admin_lr">
            <i class="fa fa-user"></i><span>Lecturer Records</span>
          </a>
        </li>
		<li>
          <a href="<?php echo base_url(); ?>admin/p_admin_am">
            <i class="fa fa-user"></i><span>Admin Management</span>
          </a>
        </li>		
	  </ul>
    </section> 
  </aside>
  <!-- /sidebar -->
  <!-- Content -->
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit Course</h3>					  
            </div>
            <!-- /.box-header -->
            <div class="box-body">	
			<form method="post" action="">
				<div class="form-group">
					<span class="input-group-addon">Course ID</span>
				<input type="text" class="form-control" name="course_id" value="<?php echo $course->course_id?>">
				</div>
				<div class="form-group">
					<span class="input-group-addon">Course Week</span>
					<input type="text" class="form-control" maxlength="7" name="course_week" value="<?php echo $course->course_week?>">
				</div>				
				<div class="form-group">
					<span class="input-group-addon">Course Name</span>
				<input type="text" class="form-control" maxlength="100" name="course_name" value="<?php echo $course->course_name?>">
				</div>
				<div class="form-group">
					<span class="input-group-addon">Course Lecturer</span>
					<input type="text" class="form-control" maxlength="70" name="course_lecturer" value="<?php echo $course->course_lecturer?>">
				</div>					
				<div class="form-group">
					<span class="input-group-addon">Course Duration</span>
					<input type="text" class="form-control" value="<?php echo $course->course_duration?>" disabled>
					<select class="form-control" name="course_duration">
						<option value="01:00:00">01:00:00</option>
						<option value="01:30:00">01:30:00</option>
						<option value="02:00:00">02:00:00</option>
						<option value="02:30:00">02:30:00</option>
						<option value="03:00:00">03:00:00</option>
						<option value="03:30:00">03:30:00</option>
						<option value="04:00:00">04:00:00</option>
						<option value="04:30:00">04:30:00</option>
						<option value="05:00:00">05:00:00</option>
					</select>
				</div>
				<div class="form-group">
					<span class="input-group-addon">Course Intake</span>
					<input type="text" class="form-control" maxlength="15" name="course_intake" value="<?php echo $course->course_intake?>">
				</div>
				<div class="form-group">
					<span class="input-group-addon">Course Status</span>
					<input type="text" class="form-control" maxlength="40" name="course_status" value="<?php echo $course->course_status?>">
				</div>				
			</div>
			<div class="modal-footer">
				<input type="submit" class="btn btn-primary" name="update" value="Update"/>
			</form>				
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->		  
    </section>
    <!-- /.content -->
  </div>
<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>