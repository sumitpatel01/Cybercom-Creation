<div class="container my-2">
    <h2>Add Product</h2>
    <form id="productSave" action="<?php echo $this->getFormUrl()?>" method="post">

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Product Name</span>
            <input type="text" class="form-control" placeholder="Product Name" name="product[productName]">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">SKU</span>
            <input type="text" class="form-control" placeholder="Product Serial Key Unique" name="product[sku]">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Price(in Rupee)</span>
            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)"
                placeholder="price in rupee" name="product[price]">
            <span class="input-group-text">.00</span>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon3">Discount(%)</span>
            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3"
                placeholder="Discount" name="product[discount]">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Quantity</span>
            <input type="number" class="form-control" placeholder="quantity" name="product[quantity]">
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Status</label>
            <select class="form-select" id="inputGroupSelect01" name="product[status]">
            <?php foreach($this->getStatusOptions() as $key => $value) : ?>
                    <option value='<?php echo $key ?>'?><?php echo $value ?></option>
            <?php  endforeach; ?>
            </select>   
        </div>
        <input type="submit" class="btn btn-dark my-2" value="save" onclick="object.setForm('#productSave').load()">
        <input type="reset" class="btn btn-dark my-2" value="reset">
    </form>
</div>
