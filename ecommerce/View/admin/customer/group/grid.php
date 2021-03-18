<?php $groups = $this->getGroups()?>
<div class="container my-2 text-center">
<h2 class="fw-bold">Manage Customer-Groups</h2>
<a class="btn btn-outline-dark my-1 float-end" href="<?php echo $this->getUrl()->getURl('form','admin\customer\group')?>">Add Group</a>
<table class="table table-light" id="Group_table">
<thead>
<tr>
<th>Group ID</th>
<th>Group Name</th>
<th>status</th>
<th>Created date</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php if($groups) : ?>
<?php foreach ($groups as $GroupKey => $Group) : ?>
<?php if($Group->status) :?>
<?php $color = 'primary'; $status = 'Enabled' ?>
<?php else: ?>
<?php $color = 'secondary'; $status = 'Disabled' ?>
<?php endif; ?>
    <tr>
        <td>
            <?php echo $Group->customerGroupId; ?>
        </td>
        <td>
            <?php echo $Group->name; ?>
        </td>
        <td>
            <a class='btn btn-<?php echo $color; ?>' href='<?php echo $this->getUrl()->getUrl('status','admin\customer\group',['id' => $Group->customerGroupId]) ?>'>
                <?php echo $status; ?>
            </a>
        </td>
        <td>
            <?php echo $Group->createdDate; ?>
        </td>
        <td>
            <a class='btn btn-success' href='<?php echo $this->getUrl()->getUrl('edit','admin\customer\group',['id' => $Group->customerGroupId]) ?>'>
                Edit
            </a>
            <a class='btn btn-danger'  href='<?php echo $this->getUrl()->getUrl('delete','admin\customer\group',['id' => $Group->customerGroupId]) ?>'>
                Delete
            </a>
        </td>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php else : ?>    
                <tr>
                    <td colspan="5">No customer Groups found</td>
                </tr>
    <?php endif; ?>
</tbody>
</table>
</div>
<script>
$(document).ready( function () {
    $('#Group_table').DataTable();
} );
</script>
</body>
</html>




