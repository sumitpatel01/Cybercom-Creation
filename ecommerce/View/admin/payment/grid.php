<?php $payments = $this->getPayments(); ?>
<div class="container my-2 text-center">
<h2 class="fw-bold">Manage Payments</h2>
<a class="btn btn-outline-dark my-1 float-middle" href='<?php echo $this->getUrl()->getURl('form',null,null,true)?>').resetParams().load();">Add Payment</a>
<table class="table table-light" id="payment_table">
<thead>
<tr>
<th>Payment method Id</th>
<th> Name</th>
<th>Code</th>
<th>status</th>
<th>Description</th>
<th>created date</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php if($payments) : ?>
<?php foreach ($payments as $paymentKey => $payment) : ?>
    <?php 
        if ($payment->status) {
            $color = 'primary';
            $status = 'Enabled';
        } else {
            $color = 'secondary';
            $status = 'Disabled';
        }
    ?>
    <tr>
        <td>
            <?php echo $payment->paymentId; ?>
        </td>
        <td>
            <?php echo $payment->name; ?>
        </td>
        <td>
            <?php echo $payment->code; ?>
        </td>
        <td>
            <a class='btn btn-<?php echo $color; ?>' href='<?php echo $this->getUrl()->getUrl('status','admin\payment',['id' => $payment->paymentId]) ?>'>
                <?php echo $status; ?>
            </a>
        </td>
        <td>
            <?php echo $payment->description; ?>
        </td>
        
        <td>
            <?php echo $payment->createdDate; ?>
        </td>
        <td>
            <a class='btn btn-success' href='<?php echo $this->getUrl()->getUrl('edit','admin\payment',['id' => $payment->paymentId ]) ?>'>
                Edit
            </a>
            <a class='btn btn-danger'  href='<?php echo $this->getUrl()->getUrl('delete','admin\payment',['id' => $payment->paymentId ]) ?>'>
                Delete
            </a>
        </td>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php else : ?>    
                <tr>
                    <td colspan="7">No paymnets found</td>
                </tr>
    <?php endif; ?>
</tbody>
</table>
</div>
<script>
$(document).ready( function () {
    $('#payment_table').DataTable();
} );
</script>





