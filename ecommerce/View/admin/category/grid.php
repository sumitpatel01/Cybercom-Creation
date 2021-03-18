<?php $categories = $this->getCategories();?>
<div class="container my-2 text-center">
<h2 class="fw-bold">Manage Categories</h2>
<a class="btn btn-outline-dark my-1 float-end" href='<?php echo $this->getUrl()->getURl('form',null,null,true)?>'>Add Category</a>
<table class="table table-light" id="category_table">
<thead>
<tr>
<th>category Id</th>
<th>parent Category</th>
<th>category Name</th>
<th>Path</th>
<th>status</th>
<th>Description</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php if($categories): ?>
<?php foreach ($categories as $categoryKey => $category) : ?>
<?php if($category->status) :?>
<?php $color = 'primary'; $status = 'Enabled' ?>
<?php else: ?>
<?php $color = 'secondary'; $status = 'Disabled' ?>
<?php endif; ?>
            <tr>
                <td>
                    <?php echo $category->categoryId; ?>
                </td>
                <td>
                    <?php echo $category->parentCategory; ?>
                </td>
                <td>
                    <?php echo $this->getName($category) ?>
                </td>
                <td>
                    <?php echo $category->path; ?>
                </td>
                <td>
                    <a class='btn btn-<?php echo $color; ?>' href='<?php echo $this->getUrl()->getUrl('status','admin\category',['id' => $category->categoryId]) ?>'>
                        <?php echo $status; ?>
                    </a>
                </td>
                <td>
                    <?php echo $category->description; ?>
                </td>
                <td>
                    <a class='btn btn-success' href='<?php echo $this->getUrl()->getUrl('edit','admin\category',['id' => $category->categoryId ]) ?>'>
                        Edit
                    </a>
                    <a class='btn btn-danger' href='<?php echo $this->getUrl()->getURL('delete','admin\category',['id'=>$category->categoryId]) ?>'>
                        Delete
                    </a>
                </td>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else : ?>    
                <tr>
                    <td colspan="7">No categories found</td>
                </tr>
    <?php endif; ?>
</tbody>
</table>
</div>
<script>
$(document).ready( function () {
    $('#category_table').DataTable();
} );
</script>





