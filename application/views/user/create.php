<h3>Sign In</h3>

<div style="color: #ff3726;" >
    <?php echo validation_errors(); ?>
</div>

<?php echo form_open();?>
<label>Username: </label>
<input type="text" id="username" name="username"/></br>
<label>Password: </label>
<input type="password" id="password" name="password"/></br>
<input type="submit" id="btnCreate" name="btnCreate" value="Create"/>
<?php echo form_close();?>