<?php $parentCategory = $this->getParentCategoryOptions();?>
<?php $category = $this->getTableRow();?>
<div class="container my-2">
        <h2>Edit Category</h2>
        <form id="editCategory" action="<?php echo $this->getFormUrl()?>" method="post">

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Parent Category</label>
                <select class="form-select" id="inputGroupSelect01" name="category[parentCategory]">
                    <?php foreach ($parentCategory as $key => $value): ?>
                        <option value="<?php echo $key;?>" <?php if($category->parentCategory == $key){ echo "selected"; }?>><?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Category Name</span>
                <input type="text" class="form-control" placeholder="Category Name" name="category[name]" value="<?php echo $category->name;?>">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Category Description</span>
                <textarea class="form-control" aria-label="With textarea" placeholder="category Description" name="category[description]"><?php echo $category->description;?></textarea>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Status</label>
                <select class="form-select" id="inputGroupSelect01" name="category[status]">
                    <?php foreach($this->getStatusOptions() as $key => $value) : ?>
                        <option value='<?php echo $key ?>' <?php if($category->status == $key) {echo 'selected'; }?>><?php echo $value ?></option>
                    <?php  endforeach; ?>
                </select>
            </div>
            <input type="submit" class="btn btn-dark my-2" value="save" onclick="object.setForm('#editCategory').load()">
            <input type="reset" class="btn btn-dark my-2" value="reset">
        </form>
    </div>