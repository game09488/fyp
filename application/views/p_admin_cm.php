<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Course</title>
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
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
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
              <h3 class="box-title">Course List</h3>					  
            </div>
            <!-- /.box-header -->
            <div class="box-body">	
				<?php if($this->uri->segment(2) == "fail_insert_course"){
					echo '<p class="text-danger">Fail to add Course</p>';
				}?>	
				<?php if($this->uri->segment(2) == "course_inserted"){
					echo '<p class="text-success">Successfully added Course</p>';
				}?>	
				<?php if($this->uri->segment(2) == "course_deleted"){
					echo '<p class="text-success">Successfully delete Course</p>';
				}?>				
              <table id="status" class="table table-bordered table-striped">			  
                <thead>
                <tr>
                  <th>Course ID</th>
				  <th>Course Week</th>
				  <th>Course Name</th>
                  <th>Course Lecturer</th>
				  <th>Course Duration</th>				  
				  <th>Course Intake</th>
				  <th>Course Status</th>
				  <th>Delete</th>
				  <th>Update</th>				  
                </tr>
                </thead>				
                <tbody>
				<?php  
						$connect = mysqli_connect("mysqldbserver.mysql.database.azure.com", "tp038166@fyp2018-mysqldbserver", "tp@038166", "fyp_db");  
						$sql = "SELECT * FROM course";  
						$result = mysqli_query($connect, $sql);
						if(mysqli_num_rows($result) > 0){
						while($row = mysqli_fetch_array($result)){
				?>				
                <tr>
                  <td><?php echo $row["course_id"]; ?></td>
				  <td><?php echo $row["course_name"]; ?></td>
                  <td><?php echo $row["course_lecturer"]; ?></td>
                  <td><?php echo $row["course_week"]; ?></td>
				  <td><?php echo $row["course_duration"]; ?></td>
				  <td><?php echo $row["course_intake"]; ?></td>
				  <td><?php echo $row["course_status"]; ?></td>
				  <td><button type="button" class="btn btn-danger btn-xs delete_course" id="<?php echo $row["course_id"]; ?>"><i class="fa fa-trash-o"></i> Delete</button></td>
				  <td><a href="<?php echo base_url(); ?>admin/update_course/<?php echo $row["course_id"]; ?>"><i class="fa fa-edit"></i> Edit</a></td>
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
                  <th>Course ID</th>
				  <th>Course Week</th>
				  <th>Course Name</th>
                  <th>Course Lecturer</th>
				  <th>Course Duration</th>
				  <th>Course Intake</th>
				  <th>Course Status</th>
				  <th>Delete</th>
				  <th>Update</th>
                </tr>
                </tfoot>
              </table>
			  <div class="box-body">
			  	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-calendar-plus-o"></i> Add
				</button>		
			  </div>			  
            </div>
            <!-- /.box-body -->
          </div>
		  <br>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Attendance List(taken)</h3>					  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<?php if($this->uri->segment(2) == "fail_add_attendance"){
					echo '<p class="text-danger">Fail to add Attendance</p>';
				}?>				
				<?php if($this->uri->segment(2) == "attendance_inserted"){
					echo '<p class="text-success">Successfully add Attendance</p>';
				}?>	
				<?php if($this->uri->segment(2) == "attendance_deleted"){
					echo '<p class="text-success">Successfully delete Attendance</p>';
				}?>				
              <table id="status2" class="table table-bordered table-striped">			  
                <thead>
                <tr>
				  <th>ID</th>
				  <th>Course Week</th>			  
				  <th>Course Name</th>
                  <th>Course Lecturer</th>
				  <th>Student TP</th>				  
				  <th>Student Name</th>
				  <th>Student Status</th>
				  <th>Delete</th>
				  <th>Update</th>				  
                </tr>
                </thead>				
                <tbody>
				<?php  
						$sql2 = "SELECT * FROM present INNER JOIN student ON present.student_tp = student.student_tp";
						$result = mysqli_query($connect, $sql2);
						if(mysqli_num_rows($result) > 0){
						while($row = mysqli_fetch_array($result)){
				?>				
                <tr>
				  <td><?php echo $row["present_id"]; ?></td>
				  <td><?php echo $row["course_week"]; ?></td>		  
                  <td><?php echo $row["course_name"]; ?></td>
                  <td><?php echo $row["course_lecturer"]; ?></td>
				  <td><?php echo $row["student_tp"]; ?></td>
				  <td><?php echo $row["student_full_name"]; ?></td>
				  <td><?php echo $row["status"]; ?></td>	
				  <td><button type="button" class="btn btn-danger btn-xs delete_attendance" id="<?php echo $row["present_id"]; ?>"><i class="fa fa-trash-o"></i> Delete</button></td>				  
				  <td><a href="<?php echo base_url(); ?>admin/update_attendance/<?php echo $row["present_id"]; ?>"><i class="fa fa-edit"></i> Edit</a></td>
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
				  <th>ID</th>
				  <th>Course Week</th>			  
				  <th>Course Name</th>
                  <th>Course Lecturer</th>
				  <th>Student TP</th>				  
				  <th>Student Name</th>
				  <th>Student Status</th>
				  <th>Delete</th>
				  <th>Update</th>				  
                </tr>
                </tfoot>
              </table>		  
            </div>
            <!-- /.box-body -->	
          </div>		  
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Full Attendance List</h3>					  
            </div>
            <!-- /.box-header -->
            <div class="box-body">				
              <table id="status3" class="table table-bordered table-striped">			  
                <thead>
                <tr>
				  <th>Course Name</th>
                  <th>Course Lecturer</th>
				  <th>Student Intake</th>				  
				  <th>Student TP</th>				  
				  <th>Student Name</th>	
                </tr>
                </thead>				
                <tbody>
				<?php if($fetch_attendance->num_rows() > 0){
					foreach($fetch_attendance->result() as $row){				
				?>				
                <tr>			  
                  <td><?php echo $row->course_name; ?></td>
                  <td><?php echo $row->course_lecturer; ?></td>
				  <td><?php echo $row->student_intake; ?></td>
				  <td><?php echo $row->student_tp; ?></td>
				  <td><?php echo $row->student_full_name; ?></td>
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
				  <th>Course Name</th>
                  <th>Course Lecturer</th>
				  <th>Student Intake</th>				  
				  <th>Student TP</th>				  
				  <th>Student Name</th>	
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
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add new Course</h4>
      </div>
      <div class="modal-body">
	  <form method="post" action="<?php echo base_url()?>admin/insert_course">	  
        <div class="form-group">
            <span class="input-group-addon">Course Name</span>
            <input type="text" class="form-control" name="course_name" maxlength="100" placeholder="e.g. Algorithm">
        </div>
        <div class="form-group">
            <span class="input-group-addon">Course Lecturer</span>
            <input type="text" class="form-control" name="course_lecturer" maxlength="70" placeholder="e.g. Joe Junior">
        </div>	
        <div class="form-group">
            <span class="input-group-addon">Course Week</span>
            <input type="text" class="form-control" name="course_week" maxlength="7" placeholder="e.g. Week 10">
        </div>			
        <div class="form-group">
            <span class="input-group-addon">Course Duration</span>
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
            <input type="text" class="form-control" name="course_intake" maxlength="15" placeholder="e.g. UC3F1075SE">
        </div>		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<input type="hidden" name="course_status" value="Await">
        <input type="submit" class="btn btn-primary" name="insert" value="Add"/>
	  </form>
      </div>
    </div>
  </div>
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
  $(document).ready(function(){
	  $('#status').DataTable({
        dom: 'Bfrtip',
        buttons: [
			{
                extend: 'excelHtml5',
				title: 'Course List',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6 ]
                }
			},
			{
                extend: 'pdfHtml5',
				title: 'Course List',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6 ]
                }
			},	
			'colvis'
        ]		
	  });
	  $('#status2').DataTable({
        dom: 'Bfrtip',
        buttons: [
			{
                extend: 'excelHtml5',
				title: 'Attendance List(taken)',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6 ]
                }
			},
			{
                extend: 'pdfHtml5',
				title: 'Attendance List(taken)',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6 ]
                }
			},	
			'colvis'
        ]		  
	  });
	  $('#status3').DataTable({
        dom: 'Bfrtip',
        buttons: [
			{
                extend: 'excelHtml5',
				title: 'Full Attendance List',
                exportOptions: {
                    columns: [ 0,1,2,3,4 ]
                }
			},
			{
                extend: 'pdfHtml5',
				title: 'Full Attendance List',
                exportOptions: {
                    columns: [ 0,1,2,3,4 ]
                }
			},	
			'colvis'
        ]		  
	  });	  
	  $('.delete_course').click(function(){
		  var id = $(this).attr("id");
		  if(confirm("Are you sure you want to delete this record?")){
			window.location="<?php echo base_url(); ?>admin/delete_course/"+id;
		  }else{
			return false; 
		  }
	  });
	  $('.delete_attendance').click(function(){
		  var id = $(this).attr("id");
		  if(confirm("Are you sure you want to delete this record?")){
			window.location="<?php echo base_url(); ?>admin/delete_attendance/"+id;
		  }else{
			return false; 
		  }
	  });	  
  });
</script>
</body>
</html>
