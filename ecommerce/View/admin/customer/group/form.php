    <div class="container my-2">
        <h2>Add group</h2>
        <form action="<?php echo $this->getFormUrl()?>" method="post">

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Group Name</span>
                <input type="text" class="form-control" placeholder="Group Name" name="group[name]">
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Status</label>
                <select class="form-select" id="inputGroupSelect01" name="group[status]">
                    <?php foreach($this->getStatusOptions() as $key => $value) : ?>
                        <option value='<?php echo $key ?>'?><?php echo $value ?></option>
                    <?php  endforeach; ?>
                </select>
            </div>
            <input type="submit" class="btn btn-dark my-2" value="save">
            <input type="reset" class="btn btn-dark my-2" value="reset">
        </form>
    </div>
</body>

</html>