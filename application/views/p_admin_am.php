<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin List</title>
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
              <h3 class="box-title">Admin List</h3>							  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<?php if($this->uri->segment(2) == "fail_insert_admin"){
					echo '<p class="text-danger">Fail to add Admin</p>';
				}?>	
				<?php if($this->uri->segment(2) == "admin_inserted"){
					echo '<p class="text-success">Successfully added Admin</p>';
				}?>	
				<?php if($this->uri->segment(2) == "admin_deleted"){
					echo '<p class="text-success">Successfully delete Admin</p>';
				}?>			
              <table id="status" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Admin ID</th>
				  <th>Admin Username</th>
                  <th>Admin Name</th>
				  <th>Admin Password</th>				  
				  <?php if($_SESSION['admin_name'] == 'admin'){
					  echo '<th>Delete</th>';}?>
				  <?php if($_SESSION['admin_name'] == 'admin'){	  
					  echo '<th>Update</th>';}?>			  
                </tr>
                </thead>				
                <tbody>
				<?php if($fetch_admin->num_rows() > 0){
					foreach($fetch_admin->result() as $row){				
				?>				
                <tr>
                  <td><?php echo $row->admin_id; ?></td>
                  <td><?php echo $row->admin_username; ?></td>
                  <td><?php echo $row->admin_name; ?></td>
				  <td><?php echo $row->admin_password; ?></td>
				  <?php if($_SESSION['admin_name'] == 'admin'){
						echo '<td><button type="button" class="btn btn-danger btn-xs delete_admin" id="'.$row->admin_id.'"><i class="fa fa-trash-o"></i> Delete</button></td>';}?>
				  <?php if($_SESSION['admin_name'] == 'admin'){
						echo '<td><a href="'.base_url().'admin/update_admin/'.$row->admin_id.'"><i class="fa fa-edit"></i> Edit</a></td>"';}?>
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
                  <th>Admin ID</th>
				  <th>Admin Username</th>
                  <th>Admin Name</th>
				  <th>Admin Password</th>	
				  <?php if($_SESSION['admin_name'] == 'admin'){
					  echo '<th>Delete</th>';}?>
				  <?php if($_SESSION['admin_name'] == 'admin'){	  
					  echo '<th>Update</th>';}?>	
                </tr>
                </tfoot>
              </table>
			  <div class="box-body">
			  	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-user-plus"></i> Add
				</button>
			  </div>			  
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
        <h4 class="modal-title" id="myModalLabel">Add new Admin</h4>
      </div>
      <div class="modal-body">
	  <form method="post" action="<?php echo base_url()?>admin/insert_admin">	  
        <div class="form-group">
            <span class="input-group-addon">Admin Username</span>
            <input type="text" class="form-control" name="admin_username" maxlength="20" placeholder="e.g. MKL">
        </div>
        <div class="form-group">
            <span class="input-group-addon">Admin Name</span>
            <input type="text" class="form-control" name="admin_name" maxlength="70" placeholder="e.g. Joe Junior">
        </div>	
        <div class="form-group">
            <span class="input-group-addon">Admin Password</span>
            <input type="text" class="form-control" name="admin_password" maxlength="10" placeholder="e.g. abc123">
        </div>		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
				title: 'Admin List',
                exportOptions: {
                    columns: [ 0,1,2,3 ]
                }
			},
			{
                extend: 'pdfHtml5',
				title: 'Admin List',
                exportOptions: {
                    columns: [ 0,1,2,3 ]
                }
			},	
			'colvis'
        ]		  
	  });
	  $('.delete_admin').click(function(){
		  var id = $(this).attr("id");
		  if(confirm("Are you sure you want to delete this record?")){
			window.location="<?php echo base_url(); ?>index.php/admin/delete_admin/"+id;
		  }else{
			return false; 
		  }
	  });
  });
</script>
</body>
</html>