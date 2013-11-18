<h3>Update</h3>

<?php echo form_open();?>
<label>Username: </label>
<input type="text" id="username" name="username" value="<?php echo $user->username; ?>"/></br>
<label>Password: </label>
<input type="password" id="password" name="password" value="<?php echo $user->password; ?>"/></br>
<input type="submit" id="btnUpdate" name="btnUpdate" value="Update"/>
<?php echo form_close();?>