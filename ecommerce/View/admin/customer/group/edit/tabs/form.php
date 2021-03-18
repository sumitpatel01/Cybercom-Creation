<?php $customerGroup = $this->getTableRow();?>
<div class="container my-2">
        <h2>Edit Customer Group</h2>
        <form action="<?php echo $this->getFormUrl()?>" method="post">

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Group Name</span>
                <input type="text" class="form-control" placeholder="Group Name" name="Group[name]" value="<?php echo $customerGroup->name;?>">
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Status</label>
                <select class="form-select" id="inputGroupSelect01" name="Group[status]">
                <?php foreach($this->getStatusOptions() as $key => $value) { ?>
                    <option value='<?php echo $key ?>' <?php if($customerGroup->status == $key) {echo 'selected'; }?>><?php echo $value ?></option>
                   <?php  } ?>
                </select>
            </div>
            <input type="submit" class="btn btn-dark my-2" value="save">
            <input type="reset" class="btn btn-dark my-2" value="reset">
        </form>
    </div>