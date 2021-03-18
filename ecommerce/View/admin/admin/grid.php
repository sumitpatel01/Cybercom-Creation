<?php $admins = $this->getAdmins(); ?>
<div class="container my-2 text-center">
<h2 class="fw-bold">Manage Admins</h2>
<a class="btn btn-outline-dark my-1 float-end" href='<?php echo $this->getUrl()->getURl('form',null,null,true)?>').resetParams().load();">Add admin</a>
<table class="table table-light" id="admin_table">
<thead>
<tr>
<th>Admin ID</th>
<th>Admin Name</th>
<th>Password</th>
<th>status</th>
<th>Created date</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php if($admins) :?>
<?php foreach ($admins as $adminKey => $admin) : ?>
<?php if($admin->status) :?>
<?php $color = 'primary'; $status = 'Enabled' ?>
<?php else: ?>
<?php $color = 'secondary'; $status = 'Disabled' ?>
<?php endif; ?>
    <tr>
        <td>
            <?php echo $admin->adminId; ?>
        </td>
        <td>
            <?php echo $admin->userName; ?>
        </td>
        <td>
            <?php echo $admin->password; ?>
        </td>
        <td>
            <a class='btn btn-<?php echo $color; ?>' href='<?php echo $this->getUrl()->getUrl('status','admin\admin',['id' => $admin->adminId ]) ?>'>
                <?php echo $status; ?>
            </a>
        </td>
        <td>
            <?php echo $admin->createdDate; ?>
        </td>
        <td>
            <a class='btn btn-success' href='<?php echo $this->getUrl()->getUrl('edit','admin\admin',['id' => $admin->adminId ]) ?>'>
                Edit
            </a>
            <a class='btn btn-danger'  href='<?php echo $this->getUrl()->getUrl('delete','admin\admin',['id' => $admin->adminId ]) ?>'>
                Delete
            </a>
        </td>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php else : ?>    
                <tr>
                    <td colspan="6">No admins found</td>
                </tr>
    <?php endif; ?>
</tbody>
</table>
</div>
<script>
$(document).ready( function () {
    $('#admin_table').DataTable();
} );
</script>





