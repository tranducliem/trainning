<html>
<head>
<title>Update</title>
</head>
<body>
<div style="color: #ff3726;" >
    <?php echo validation_errors(); ?>
</div>

<?php echo form_open(base_url()."category/edit/".$item->id); ?>

<h5>Name</h5>
<input type="text" name="name" value="<?php echo $item->name;?>" size="50" />

<h5>Description</h5>
<input type="text" name="des" value="<?php echo $item->description;?>" size="50" />
<div><input type="submit" value="Update" id="btnUpdate" name="btnUpdate" /></div>

</form>

</body>
</html>

