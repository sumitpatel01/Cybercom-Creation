    <div class="container my-2">
        <h2>Add Shipping</h2>
        <form id="shippingSave" action="<?php echo $this->getFormUrl()?>" method="post">

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Shipping Name</span>
                <input type="text" class="form-control" placeholder="shipping Name" name="shipping[name]">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Amount</span>
                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)"
                    placeholder="Amount" name="shipping[amount]">
                <span class="input-group-text">.00</span>
            </div>


            <div class="input-group mb-3">
                <span class="input-group-text">Code</span>
                <input type="text" class="form-control" placeholder="Code" name="shipping[code]">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">shipping Description</span>
                <textarea class="form-control" aria-label="With textarea" placeholder="shipping Description" name="shipping[description]"></textarea>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Status</label>
                <select class="form-select" id="inputGroupSelect01" name="shipping[status]">
                <?php foreach($this->getStatusOptions() as $key => $value) : ?>
                    <option value='<?php echo $key ?>'?><?php echo $value ?></option>
                <?php  endforeach; ?>
                </select>
            </div>
            <input type="submit" class="btn btn-dark my-2" value="save" onclick="object.setForm('#shippingSave').load()">
            <input type="reset" class="btn btn-dark my-2" value="reset">
        </form>
    </div>
</body>

</html>