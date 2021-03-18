<?php $attribute = $this->getTableRow();?>
<div class="container my-2">
    <h2>Edit Attribute</h2>
    <form id="editAttribute" action="<?php echo $this->getFormUrl()?>" method="post">

    <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupSelect01">Entity Type</label>
        <select class="form-select" id="inputGroupSelect01" name="attribute[entityTypeId]">
            <?php foreach($this->getAttributeModel()->getEntityTypeOptions() as $groupId => $groupName): ?>
            <option value="<?php echo $groupId ?>" <?php if($attribute->entityTypeId == $groupId){echo "selected";} ?>><?php echo $groupName ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Name</span>
        <input type="text" class="form-control" placeholder="Name" name="attribute[name]" value="<?php echo $attribute->name?>">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">code</span>
        <input type="text" class="form-control" placeholder="code" name="attribute[code]" value="<?php echo $attribute->code?>">
    </div>

    <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupSelect01">Input Type</label>
        <select class="form-select" id="inputGroupSelect01" name="attribute[inputType]">
            <?php foreach($this->getAttributeModel()->getInputTypeOptions() as $groupId => $groupName): ?>
            <option value="<?php echo $groupId ?>" <?php if($attribute->inputType == $groupId){echo "selected";} ?>><?php echo $groupName ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupSelect01">Backend Type</label>
        <select class="form-select" id="inputGroupSelect01" name="attribute[backendType]">
            <?php foreach($this->getAttributeModel()->getBackendTypeOptions() as $groupId => $groupName): ?>
                <option value="<?php echo $groupId ?>" <?php if($attribute->backendType == $groupId){echo "selected";} ?>><?php echo $groupName ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon3">sortOrder</span>
        <input type="number" class="form-control" id="basic-url" aria-describedby="basic-addon3" placeholder="sortOrder" name="attribute[sortOrder]" value="<?php  echo $attribute->sortOrder?>">
    </div> 

    <div class="input-group mb-3">
        <span class="input-group-text">Backend Model</span>
        <input type="text" class="form-control" placeholder="Backend Model" name="attribute[backendModel]" value="<?php echo $attribute->backendModel?>">
    </div>

    
    <input type="submit" class="btn btn-dark my-2" value="save" onclick="object.setForm('#editAttribute').load()">
    <input type="reset" class="btn btn-dark my-2" value="reset">
    </form>
</div>

    </div>