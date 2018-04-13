<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Lecturer Page</title>
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
    <a href="<?php echo base_url(); ?>lecturer/p_lecturer" class="logo">
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
        <li class="header">Hello, <?php echo $_SESSION['lecturer_full_name'];?></li>
		<li>
          <a href="<?php echo base_url(); ?>lecturer/p_lecturer_a">
            <i class="fa fa-calendar-o"></i><span>Attendance</span>
          </a>
        </li>		
		<li>
          <a href="<?php echo base_url(); ?>lecturer/p_lecturer_c">
            <i class="fa fa-table"></i><span>Classes</span>
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
        <div class="col-sm-6">
          <div class="box">
            <div class="box-body">		
			<form method="post" action="">				
				<div class="form-group">
					<span class="input-group-addon">Course Lecturer</span>
					<input type="text" class="form-control" value="<?php echo $course->course_lecturer?>" disabled>
					<input type="hidden" class="form-control" name="course_lecturer" value="<?php echo $course->course_lecturer?>">
				</div>	
				<div class="form-group">
					<span class="input-group-addon">Course Week</span>
					<input type="text" class="form-control" value="<?php echo $course->course_week?>" disabled>
					<input type="hidden" class="form-control" name="course_week" value="<?php echo $course->course_week?>">
				</div>
				<div class="form-group">
					<span class="input-group-addon">Course Name</span>
					<input type="text" class="form-control" value="<?php echo $course->course_name?>" disabled>
					<input type="hidden" class="form-control" name="course_name" value="<?php echo $course->course_name?>">
				</div>	
				<div class="form-group">
					<span class="input-group-addon">Number of Student</span>
					<input type="text" class="form-control" maxlength="3" name="number" placeholder="Enter number of students">
				</div>				
			</div>
			<div class="modal-footer">
				<a href="<?php base_url();?>../../lecturer/p_lecturer_a" type="button" class="btn btn-default">Cancel</a>
				<?php date_default_timezone_set("Asia/Kuala_Lumpur");?>
				<input type="hidden" name="course_status" value="<?php echo date("Y/m/d h:i:sa")?>">
				<input type="submit" class="btn btn-primary" name="confirm" value="Confirm"/>
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
</html>