<center>

    <h2>List users</h2>
    
    <!--Link create user-->
    <a href="<?php echo base_url()."index.php/user/create";?>">Create</a>
    
    <!--Show list user-->
    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($user as $item){ ?>
                <tr>
                    <td><?php echo $item->id; ?></td>
                    <td><?php echo $item->username; ?></td>
                    <td>
                        <!--Link update user-->
                    	<a href="<?php echo base_url()."index.php/user/update/".$item->id;?>">Update</a>&nbsp;|&nbsp;
                        
                        <!--Link delete user + alert-->
                        <a href="<?php echo base_url()."index.php/user/delete/".$item->id;?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</center>
