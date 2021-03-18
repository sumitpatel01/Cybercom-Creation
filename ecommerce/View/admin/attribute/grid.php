<?php  $attributes = $this->getAttributes(); ?>
<div class="container my-2 text-center">
    <h2 class="fw-bold">Manage Attributes</h2>
    <a class="btn btn-outline-dark my-1 float-middle" href='<?php echo $this->getUrl()->getURl('form',null,null,true)?>'>Add Attribute</a>
    <table class="table table-light" id="product_table">
        <thead>
            <tr>
                <th>Attribute Id</th>
                <th>EntityTypeId</th>
                <th>Name</th>
                <th>code</th>
                <th>input type</th>
                <th>backendType</th>
                <th>sortOrder</th>
                <th>BackendModel</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if($attributes) : ?>
            <?php foreach ($attributes as $attributeKey => $attribute) : ?>
            <tr>
                <td>
                    <?php echo $attribute->attributeId; ?>
                </td>
                <td>
                    <?php echo $attribute->entityTypeId; ?>
                </td>
                <td>
                    <?php echo $attribute->name; ?>
                </td>
                <td>
                    <?php echo $attribute->code; ?>
                </td>
                <td>
                    <?php echo $attribute->inputType; ?>
                </td>
                <td>
                    <?php echo $attribute->backendType; ?>
                </td>
                <td>
                    <?php echo $attribute->sortOrder; ?>
                </td>
                <td>
                    <?php echo $attribute->backendModel; ?>
                </td>
                <td>
                    <a class='btn btn-success' href='<?php echo $this->getUrl()->getURL('edit','admin\attribute',['id'=>
                        $attribute->attributeId]); ?>'>
                        Edit
                    </a>
                    <a class='btn btn-danger' href='<?php echo $this->getUrl()->getURL('delete','admin\attribute',['id'=>
                        $attribute->attributeId]); ?>'>
                        Delete
                    </a>
                    <a class='btn btn-primary' href='<?php echo $this->getUrl()->getURL('option','admin\attribute',['id'=>
                        $attribute->attributeId]); ?>'>
                        Option
                    </a>
                </td>
                </td>
            </tr>

            <?php endforeach; ?>
            <?php else : ?>    
                <tr>
                    <td colspan="9">No Attributes found</td>
                </tr>
    <?php endif; ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function () {
        $('#product_table').DataTable();
    });
</script>
</body>

</html>