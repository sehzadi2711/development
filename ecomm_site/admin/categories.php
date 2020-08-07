<?php 
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type = get_safe_value($conn,$_GET['type']);
	if($type=='status'){
		$operation = get_safe_value($conn,$_GET['operation']);
		$id = get_safe_value($conn,$_GET['id']);
		if($operation=='active'){
			$status='1'; // for active operation 1=active
		}else{
			$status='0'; // deactive operation 0 = deactive
		}
		$update_status = "UPDATE categories SET status='$status' WHERE id='$id'";
		mysqli_query($conn,$update_status); 
	}
	if($type=='delete'){
		$id = get_safe_value($conn,$_GET['id']);
		$delete_sql = "DELETE FROM categories WHERE id='$id'";
		mysqli_query($conn,$delete_sql); 
	}
}

$sql = "SELECT * FROM categories order by categories asc";
$res = mysqli_query($conn,$sql);
?>
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<div class="content pb-0">
	<div class="orders">
		<div class="row">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-body">
						<h4 class="box-title" style="font-size: 20px;">Categories </h4>
						<a class="box-link" href="manage_categories.php" >ADD Category</a>

					</div>
					<div class="card-body--">
						<div class="table-stats order-table ov-h">
							<table class="table ">
								<thead>
									<tr>
										<th class="serial">#</th>
										<th>ID</th>
										<th>Categories</th>
										<th>Status</th>
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
										<td><?php echo $row['categories']; ?>  </td>
										<td><?php if($row['status']==1){
											echo "<span class=\"badge badge-complete\"><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
										}else{
											echo "<span class=\"badge badge-pending\"><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
										}
										echo "<span class=\"badge badge-edit\"><a href='manage_categories.php?type=edit&id=".$row['id']."'>Edit</a></span>&nbsp;";
										echo "<span class=\"badge badge-delete\"><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
										// echo "&nbsp;<a href='?type=edit&id=".$row['id']."'>Edit</a>";
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