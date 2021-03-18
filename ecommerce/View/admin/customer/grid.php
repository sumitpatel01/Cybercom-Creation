<?php $customers = $this->getCustomers(); ?>
<div class="container my-2 text-center">
<h2 class="fw-bold">Manage Customers</h2>
<a class="btn btn-outline-dark my-1 float-end" href='<?php echo $this->getUrl()->getUrl('form','admin\customer') ?>'>Add Customer</a>
<table class="table table-light" id="customer_table">
<thead>
<tr>
<th>customer Id</th>
<th>group Name</th>
<th>first Name</th>
<th>last Name</th>
<th>E-mail</th>
<th>Mobile</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php if($customers) : ?>
<?php foreach ($customers as $customerKey => $customer) : ?>
<?php if($customer->status) :?>
<?php $color = 'primary'; $status = 'Enabled' ?>
<?php else: ?>
<?php $color = 'secondary'; $status = 'Disabled' ?>
<?php endif; ?>
    <tr>
        <td>
            <?php echo $customer->customerId; ?>
        </td>
        <td>
            <?php echo $customer->customerGroup; ?>
        </td>
        <td>
            <?php echo $customer->firstName; ?>
        </td>
        <td>
            <?php echo $customer->lastName; ?>
        </td>
        <td>
            <?php echo $customer->email; ?>
        </td>
        
        <td>
            <?php echo $customer->mobile; ?>
        </td>
        <td>
            <a class='btn btn-success' href='<?php echo $this->getUrl()->getUrl('edit','admin\customer',['id' => $customer->customerId ]) ?>'>
                Edit
            </a>
            <a class='btn btn-danger'  href='<?php echo $this->getUrl()->getUrl('delete','admin\customer',['id' => $customer->customerId ]) ?>'>
                Delete
            </a>
        </td>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php else : ?>    
                <tr>
                    <td colspan="7">No customers found</td>
                </tr>
    <?php endif; ?>
</tbody>
</table>
</div>
<script>
$(document).ready( function () {
    $('#customer_table').DataTable();
} );
</script>





