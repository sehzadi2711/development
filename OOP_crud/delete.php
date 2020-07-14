<?php 
include('model.php');
$model = new Model();
$id= $_GET['id'];
$delete = $model->delete($id);

?>
