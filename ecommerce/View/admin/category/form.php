    <?php $parentCategory = $this->getParentCategoryOptions()?>
    <div class="container my-2">
        <h2>Add Category</h2>
        <form id="categorySave" action="<?php echo $this->getFormUrl()?>" method="post">

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Parent Category</label>
                <select class="form-select" id="inputGroupSelect01" name="category[parentCategory]">
                    
                    <?php foreach ($parentCategory as $key => $value):  ?>
                        <option value="<?php echo $key;?>"><?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Category Name</span>
                <input type="text" class="form-control" placeholder="Category Name" name="category[name]">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Category Description</span>
                <textarea class="form-control" aria-label="With textarea" placeholder="category Description" name="category[description]"></textarea>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Status</label>
                <select class="form-select" id="inputGroupSelect01" name="category[status]">
                    <?php foreach($this->getStatusOptions() as $key => $value) : ?>
                        <option value='<?php echo $key ?>'?><?php echo $value ?></option>
                    <?php  endforeach; ?>
                </select>
            </div>
            <input type="submit" class="btn btn-dark my-2" value="save" onclick="object.setForm('#categorySave').load()">
            <input type="reset" class="btn btn-dark my-2" value="reset">
        </form>
                    </div>