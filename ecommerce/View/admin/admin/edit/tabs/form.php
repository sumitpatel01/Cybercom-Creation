<?php $admin = $this->getTableRow();?>
<div class="container my-2">
    <h2>Edit Admin</h2>
    <form id="editAdmin" action="<?php echo $this->getFormUrl(); ?>" method="post">

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Admin Name</span>
            <input type="text" class="form-control" placeholder="Admin Name" name="admin[userName]"
                value="<?php echo $admin->userName;?>">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Admin Name</span>
            <input type="password" class="form-control" placeholder="admin password" name="admin[password]"
                value="<?php echo $admin->password;?>">
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Status</label>
            <select class="form-select" id="inputGroupSelect01" name="Admin[status]">
                <?php foreach($this->getStatusOptions() as $key => $value) { ?>
                <option value='<?php echo $key ?>' <?php if($admin->status == $key) {echo 'selected'; }?>>
                    <?php echo $value ?>
                </option>
                <?php  } ?>
            </select>
        </div>
        <input type="submit" class="btn btn-dark my-2" value="save" onclick="object.setForm('#editAdmin').load()">
        <input type="reset" class="btn btn-dark my-2" value="reset">
    </form>
</div>