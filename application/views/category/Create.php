<html>
<head>
<title>Create</title>
</head>
<body>
    <div style="color: #ff3726;" >
    <?php echo validation_errors(); ?>
</div>

<?php echo form_open(base_url()."category/create"); ?>

<h5>Name</h5>
<input type="text" name="name" value="" size="50" />

<h5>Description</h5>
<input type="text" name="des" value="" size="50" />

<div><input type="submit" value="Create" id="btnCreate" name="btnCreate" /></div>

</form>

</body>
</html>
