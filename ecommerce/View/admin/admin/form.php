<div class="container my-2">
    <h2>Add Admin</h2>
    <form id="adminSave" action="<?php echo $this->getFormUrl(); ?>" method="post">

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Admin Name</span>
            <input type="text" class="form-control" placeholder="admin Name" name="admin[userName]">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Admin Name</span>
            <input type="password" class="form-control" placeholder="admin password" name="admin[password]">
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Status</label>
            <select class="form-select" id="inputGroupSelect01" name="admin[status]">
                <?php foreach($this->getStatusOptions() as $key => $value) : ?>
                <option value='<?php echo $key ?>' ?>
                    <?php echo $value ?>
                </option>
                <?php  endforeach; ?>
            </select>
        </div>
        <input type="submit" class="btn btn-dark my-2" value="save" onclick="object.setForm('#adminSave').load()">
        <input type="reset" class="btn btn-dark my-2" value="reset">
    </form>
</div>