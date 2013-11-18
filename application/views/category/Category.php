<html>
    <head>
        <title><?php echo $title;?></title>
    </head>
    <body>
        <p> <?php 
        if(isset($status)) echo $status; ?>
        </p>
        <form action="<?php echo base_url('category'); ?>" id="frmSearch" method="post">
            <label for="name">Search</label>
            <input type="text" id="name" name="name"/>
            <input type="submit" id="btnSearch" name="btnSearch" value="Search" >
        </form>
        <p><a href="<?php echo base_url()."category/create";?>">Create</a></p>
        <table border="1">
            <thead>
                <tr>
                    <td> Id </td>
                    <td> name </td>
                    <td > Description </td>
                    <td> Action</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($category as $item) { ?>
                    <tr>
                        <td> <?php echo $item->id; ?> </td>
                        <td> <?php echo $item->name; ?> </td>
                        <td ><?php echo $item->description; ?> </td>
                        <td><a href="<?php echo base_url()."category/edit/".$item->id;?>">Update</a>|
                            <a href="<?php echo base_url()."category/delete/".$item->id;?>">delete</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        
    </body>
</html> 
