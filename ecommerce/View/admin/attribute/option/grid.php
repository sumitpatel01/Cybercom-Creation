<pre>
<?php $attribute = $this->getAttribute();?>
<?php $attributeOption =$attribute->getOptions(); ?>
<div class="container my-2 text-center">
<h2 class="fw-bold">Manage Attribute-Options</h2>
<form action="<?php echo $this->getFormUrl()?>" method="post">
<input type="submit" class="btn btn-success m-2" name="update" value="update">
<input type="button" class="btn btn-success m-2" name="addOption" value="addOptions" onclick="addRow();">
<table id="existOption" class="table table-dark text-center">
<thead>
<tr>
<th>Option Name</th>
<th>sort Order</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php if($attributeOption) :?>
<?php foreach($attributeOption as $key => $option): ?>
    <tr>
        <td><input type="text" name="attribute[exist][<?php echo $option->optionId;?>][name]" value="<?php echo $option->name;?>"></td>
        <td><input type="text" name="attribute[exist][<?php echo $option->optionId;?>][sortOrder]" value="<?php echo $option->sortOrder;?>"></td>
        <td><input type="button" class="btn btn-danger" name="attribute[exist][<?php echo $option->optionId;?>][removeOption]" value="removeOptions" onclick="removeRow(this);"></td>
    </tr>
<?php endforeach; ?>
<?php else: ?>
<tr><td colspan="3">No options Available</td></tr>
<?php endif; ?>
</tbody>
</table>
</form>
</div>
<div style="display : none">
<table id="newOption">
    <tr>
        <td><input type="text" name="attribute[new][name][]"></td>
        <td><input type="text" name="attribute[new][sortOrder][]"></td>
        <td><input type="submit" name="attribute[new][removeOption][]"></td>
    </tr>
</table>
</div>

<script>
function addRow(){
    $('#existOption').append('<tr><td><input type="text" name="attribute[new][name][]"></td><td><input type="text" name="attribute[new][sortOrder][]"></td><td><input type="submit" class="btn btn-danger" name="attribute[new][removeOption][]" value="removeOption" onclick="removeRow(this);"></td></tr>');
}
function removeRow(row){
    var object = $(row).closest('tr');
    object.remove();
}
</script>