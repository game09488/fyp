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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit Attendance</h3>					  
            </div>
            <!-- /.box-header -->
            <div class="box-body">	
			<form method="post" action="">
				<div class="form-group">
					<span class="input-group-addon">Attendance ID</span>
				<input type="text" class="form-control" name="present_id" value="<?php echo $attendance->present_id?>" disabled>
				</div>				
				<div class="form-group">
					<span class="input-group-addon">Course Lecturer</span>
				<input type="text" class="form-control" name="course_lecturer" value="<?php echo $attendance->course_lecturer?>" disabled>
				</div>
				<div class="form-group">
					<span class="input-group-addon">Course Week</span>
					<input type="text" class="form-control" name="course_week" value="<?php echo $attendance->course_week?>" disabled>
				</div>	
				<div class="form-group">
					<span class="input-group-addon">Course Name</span>
					<input type="text" class="form-control" name="course_name" value="<?php echo $attendance->course_name?>" disabled>
				</div>	
				<div class="form-group">
					<span class="input-group-addon">Student TP</span>
					<input type="text" class="form-control" name="student_tp" value="<?php echo $attendance->student_tp?>" disabled>
				</div>
				<div class="form-group">
					<span class="input-group-addon">Status</span>
					<select name="status" class="form-control">
						<option value="Present">Present</option>
						<option value="Absent">Absent</option>
						<option value="Late">Late</option>
					</select>
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