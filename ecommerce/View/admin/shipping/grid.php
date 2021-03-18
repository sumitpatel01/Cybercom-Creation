<?php $shippings = $this->getShippings(); ?>
<div class="container my-2 text-center">
<h2 class="fw-bold">Manage Shippings</h2>
<a class="btn btn-outline-dark my-1 float-end" href ='<?php echo $this->getUrl()->getURl('form',null,null,true)?>'>Add Shipping</a>
<table class="table table-light" id="shipping_table">
<thead>
<tr>
<th>shipping Id</th>
<th>shipping Name</th>
<th>Code</th>
<th>Amount</th>
<th>Status</th>
<th>Description</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php if($shippings) : ?>
<?php foreach ($shippings as $shippingKey => $shipping) : ?>
    <?php 
        if ($shipping->status) {
            $color = 'primary';
            $status = 'Enabled';
        } else {
            $color = 'secondary';
            $status = 'Disabled';
        }
    ?>
    <tr>
        <td>
            <?php echo $shipping->methodId; ?>
        </td>
        <td>
            <?php echo $shipping->name; ?>
        </td>
        <td>
            <?php echo $shipping->code; ?>
        </td>
        <td>
            <?php echo $shipping->amount; ?>
        </td>
        <td>
            <a class='btn btn-<?php echo $color; ?>' href ='<?php echo $this->getUrl()->getUrl('status','admin\shipping',['id' => $shipping->methodId]) ?>'>
                <?php echo $status; ?>
            </a>
        </td>
        <td>
            <?php echo $shipping->description; ?>
        </td>
        <td>
            <a class='btn btn-success' href ='<?php echo $this->getUrl()->getUrl('edit','admin\shipping',['id' => $shipping->methodId ]) ?>'>
                Edit
            </a>
            <a class='btn btn-danger'  href ='<?php echo $this->getUrl()->getUrl('delete','admin\shipping',['id' => $shipping->methodId ]) ?>'>
                Delete
            </a>
        </td>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php else : ?>    
                <tr>
                    <td colspan="7">No Shippings found</td>
                </tr>
    <?php endif; ?>
</tbody>
</table></div>
<script>
$(document).ready( function () {
    $('#shipping_table').DataTable();
} );
</script>





