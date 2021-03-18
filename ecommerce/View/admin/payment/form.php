    <div class="container my-2">
        <h2>Add payment</h2>
        <form id="paymentSave" action="<?php echo $this->getFormUrl()?>" method="post">

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Method Name</span>
                <input type="text" class="form-control" placeholder="Payment Name" name="payment[name]">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Code</span>
                <input type="text" class="form-control" placeholder="code" name="payment[code]">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Payment Description</span>
                <textarea class="form-control" aria-label="With textarea" placeholder="payment Description" name="payment[description]"></textarea>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Status</label>
                <select class="form-select" id="inputGroupSelect01" name="paymnet[status]">
                <?php foreach($this->getStatusOptions() as $key => $value) : ?>
                    <option value='<?php echo $key ?>'?><?php echo $value ?></option>
                <?php  endforeach; ?>
                </select>
            </div>
            <input type="submit" class="btn btn-dark my-2" value="save" onclick="object.setForm('#paymentSave').load()">
            <input type="reset" class="btn btn-dark my-2" value="reset">
        </form>
    </div>
</body>

</html>