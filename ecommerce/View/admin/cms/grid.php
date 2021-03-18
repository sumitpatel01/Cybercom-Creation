<?php $cmss = $this->getCmss(); ?>
<div class="container my-2 text-center">
<h2 class="fw-bold">Manage Contents</h2>
<a class="btn btn-outline-dark my-1 float-end" href='<?php echo $this->getUrl()->getURl('form','admin\cms',null,true)?>').resetParams().load();">Add Content</a>
<table class="table table-light" id="cms_table">
<thead>
<tr>
<th>Page ID</th>
<th>Title</th>
<th>Unique Key</th>
<th>content</th>
<th>status</th>
<th>Created date</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php if($cmss) :?>
<?php foreach ($cmss as $cmsKey => $cms) : ?>
<?php if($cms->status) :?>
<?php $color = 'primary'; $status = 'Enabled' ?>
<?php else: ?>
<?php $color = 'secondary'; $status = 'Disabled' ?>
<?php endif; ?>
    <tr>
        <td>
            <?php echo $cms->pageId; ?>
        </td>
        <td>
            <?php echo $cms->title; ?>
        </td>
        <td>
            <?php echo $cms->uniqueKey; ?>
        </td>
        <td>
            <?php echo $cms->content; ?>
        </td>
        <td>
            <a class='btn btn-<?php echo $color; ?>' href='<?php echo $this->getUrl()->getUrl('status','admin\cms',['id' => $cms->pageId ]) ?>'>
                <?php echo $status; ?>
            </a>
        </td>
        <td>
            <?php echo $cms->createdDate; ?>
        </td>
        <td>
            <a class='btn btn-success' href='<?php echo $this->getUrl()->getUrl('edit','admin\cms',['id' => $cms->pageId ]) ?>'>
                Edit
            </a>
            <a class='btn btn-danger'  href='<?php echo $this->getUrl()->getUrl('delete','admin\cms',['id' => $cms->pageId ]) ?>'>
                Delete
            </a>
        </td>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php else : ?>    
                <tr>
                    <td colspan="7">No contents found</td>
                </tr>
    <?php endif; ?>
</tbody>
</table>
</div>
<script>
$(document).ready( function () {
    $('#cms_table').DataTable();
} );
</script>
</body>
</html>




