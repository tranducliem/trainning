<html>
<head>
    <title>Products Manager</title>
</head>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
 $(document).ready(function(){
     var config = {
        base: "<?php echo base_url(); ?>",
     };
     $.ajax({
            type: "POST",
            url: config.base+"/index.php/product/getCategories",
            data: { ajax: '1' }
        }).done(function(data){
                data = $.parseJSON(data);
                var options = '';
                for(var i = 0; i < data.length; i++){
                    options += '<option value="'+data[i].id +'" >'+data[i].name +'</option>';
                }
                $("#productCategory").html(options);
    });
 });
</script>
<body>

    <?php echo validation_errors(); ?>

    <?php echo form_open();?>

        <h5>Product Name</h5>
        <input type="text" name="productName" value="<?php if(isset($product)){echo $product->name;}
                                                        else{echo set_value('productName');} ?>" size="50" />

        <h5>Category</h5>
        <select name="productCategory" id="productCategory" onchange="" >
          
        </select>
        
        <h5>Price</h5>
        <input type="text" maxlength="11" name="productPrice" value="<?php if(isset($product)){echo $product->price;}
                                                     else{echo set_value('productPrice');} ?>" size="50" />
        
        <div><input name="btnSubmit" type="submit" value="Submit" /></div>

    </form>

</body>
</html>
        