<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Classes</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"> 
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
				<h3 class="box-title">Class History</h3>	
            </div>
            <!-- /.box-header -->
            <div class="box-body">			
              <table id="status" class="table table-bordered table-striped">			  
                <thead>
                <tr>
				  <th>Course Week</th>
				  <th>Course Name</th>
                  <th>Course Lecturer</th>
				  <th>Course Duration</th>
				  <th>Course Intake</th>
				  <th>Course Status</th>
                </tr>
                </thead>
                <tbody>
				<?php 
					$connect = mysqli_connect("mysqldbserver.mysql.database.azure.com", "tp038166@fyp2018-mysqldbserver", "tp@038166", "fyp_db"); 
					$lecturer = $_SESSION['lecturer_full_name'];
					$sql = "SELECT * FROM course WHERE course_lecturer = '$lecturer' AND course.course_status != 'Await'";
					$result = mysqli_query($connect, $sql);				
					if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result)){
				?>				
                <tr>
				  <td><?php echo $row["course_week"]; ?></td>
                  <td><?php echo $row["course_name"]; ?></td>
				  <td><?php echo $row["course_lecturer"]; ?></td>
				  <td><?php echo $row["course_duration"]; ?></td>
				  <td><?php echo $row["course_intake"]; ?></td>
				  <td><?php echo $row["course_status"]; ?></td>
                </tr>
				<?php }
					}else{?>
                <tr>
                  <td>No data found</td>
                </tr>
				<?php }?>				
                </tbody>
                <tfoot>
                <tr>                  
				  <th>Course Week</th>
				  <th>Course Name</th>
                  <th>Course Lecturer</th>
				  <th>Course Duration</th>
				  <th>Course Intake</th>
				  <th>Course Status</th>
                </tr>
                </tfoot>
              </table>		  
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
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- page script -->
<script>
$(document).ready(function() {
	  $('#status').DataTable({
        dom: 'Bfrtip',
        buttons: [
			{
                extend: 'excelHtml5',
				title: 'Attendance List(taken)',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5 ]
                }
			},
			{
                extend: 'pdfHtml5',
				title: 'Attendance List(taken)',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5 ]
                }
			},	
			'colvis'
        ]		  
	  });
});
</script>
</body>
</html>
