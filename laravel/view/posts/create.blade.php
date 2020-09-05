<!DOCTYPE html>
<html>
<head>
	<title>Create Form</title>
</head>
<body>
    <h2>Create new Post</h2>
    <form action="<?php echo route('post.store'); ?>" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" /><br>
        <textarea name="content" id="" cols="30" rows="10"></textarea><br>
        <label><input type="checkbox" name="check[]" id="">Computer</label>
        <label><input type="checkbox" name="check[]" id="">General</label>
        <label><input type="checkbox" name="check[]" id="">Science</label>
        <label><input type="checkbox" name="check[]" id="">Arts</label>
        <label><input type="checkbox" name="check[]" id="">Business</label><br><br>
        <label for="">Select an Image: <input type="file" name="photo"></label>
        <input type="submit" value="Add new Post">
    </form>
</body>
</html>