<?php 
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type = get_safe_value($conn,$_GET['type']);
	if($type=='delete'){
		$id = get_safe_value($conn,$_GET['id']);
		$delete_sql = "DELETE FROM users WHERE id='$id'";
		mysqli_query($conn,$delete_sql); 
	}
}

$sql = "SELECT * FROM users order by id desc";
$res = mysqli_query($conn,$sql);
?>
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<div class="content pb-0">
	<div class="orders">
		<div class="row">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-body">
						<h4 class="box-title" style="font-size: 20px;">Users </h4>
					</div>
					<div class="card-body--">
						<div class="table-stats order-table ov-h">
							<table class="table ">
								<thead>
									<tr>
										<th class="serial">#</th>
										<th>ID</th>
										<th>Name</th>
										<th>Email</th>
										<th>Mobile</th>
										<th>Date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$i = 1;
									while ($row = mysqli_fetch_array($res)) {
							
									
									?>
									<tr>
										<td class="serial"><?php echo $i; ?></td>
										<td><?php echo $row['id']; ?> </td>
										<td><?php echo $row['name']; ?> </td>
										<td><?php echo $row['email']; ?> </td>
										<td><?php echo $row['mobile']; ?> </td>
										<td><?php echo $row['add_on']; ?>  </td>
										<td><?php 
											echo "<span class=\"badge badge-delete\"><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
										 ?> </td>
										
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
require('footer.inc.php');
?>
<script type="text/javascript"></script>
<style>
.field_error{
    color: red;
    margin-top: 15px;
}
.card .box-link {
    font-weight: 600;
    font-size: 17px;
    padding: 5px 0
}
.box-link {
    color: #000;
    text-decoration: underline;
}
.badge a{
    color: #fff;
    font-weight: 800;
}
.order-table .badge-delete {
    background: #FF0000;
}
.order-table .badge-complete {
    background: #00c245
}

.order-table .badge-pending {
    background: #66bb6a
}
.order-table .badge-edit {
    background: #3e5be8
}

</style>