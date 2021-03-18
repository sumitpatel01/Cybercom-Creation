<?php $customerGroupPrice = $this->getCustomergroup(); ?>
<h2 class="text-center m-5">Manage Customer Group Price</h2>
<form action="<?php echo $this->getFormUrl()?>" method="post">
<table class="table table-striped mx-5">
    <tr>
        <th>Group Id</th>
        <th>GroupName</th>
        <th>Price</th>
        <th>Group Price</th>
    </tr>
        <?php foreach($customerGroupPrice as $key => $value): ?>
        <?php $rowStatus = ($value->entityId) ? 'exist' : 'new'; ?>
    <tr>
        <td><?php echo $value->customerGroupId; ?></td>
        <td><?php echo $value->name; ?></td>
        <td><?php echo $value->productPrice; ?></td>
        <td><input type="text" name="groupPrice[<?php echo $rowStatus;?>][<?php echo $value->customerGroupId;?>]" value="<?php echo $value->price;?>" ></td>
    </tr>
        <?php endforeach;?>
</table>
<input type="submit" class="btn btn-dark m-5" value="Submit" name="submit">
</form>