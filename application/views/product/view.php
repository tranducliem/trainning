<?php
    echo "<h2>Ban dang trong product view</h2>";
?>
<script>
function confirmAction(){
    var confirmed = confirm("Are you sure? This will remove this entry forever.");
    return confirmed;
}
</script>
<table border="1">
    <tr>
        <td>Product Name</td>
        <td>Category</td>
        <td>Price</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
    <?php foreach ($products as $product) { ?>
    <tr>
        <td><?php echo $product['name']; ?></td>
        <td><?php echo $product['category_name']; ?></td>
        <td><?php echo $product['price']; ?></td>
        <td>
            <a href="<?php echo base_url()."product/edit/".$product['id']; ?>">Edit</a>
        </td>
        <td>
            <a href="<?php echo base_url()."product/delete/".$product['id']; ?>" onclick="return confirmAction()">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table> 
<br>
<a href="product/add">Add new Product</a>

