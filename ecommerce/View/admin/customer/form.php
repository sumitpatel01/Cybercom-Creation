<div class="container my-2">
    <h2>Add Customer</h2>
    <form id="customerSave" action="<?php echo $this->getFormUrl()?>" method="post">

    <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupSelect01">Customer Group</label>
        <select class="form-select" id="inputGroupSelect01" name="customer[customerGroup]">
            <?php foreach($this->getCustomerGroup() as $groupId => $groupName): ?>
            <option value="<?php echo $groupId ?>"><?php echo $groupName ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">First Name</span>
        <input type="text" class="form-control" placeholder="First Name" name="customer[firstName]">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Last Name</span>
        <input type="text" class="form-control" placeholder="Last Name" name="customer[lastName]">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">E-mail</span>
        <input type="text" class="form-control" placeholder="xyz@server.com" name="customer[email]">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon3">Mobile</span>
        <input type="number" class="form-control" id="basic-url" aria-describedby="basic-addon3" placeholder="mobile" name="customer[mobile]">
    </div> 

    <div class="input-group mb-3">
        <span class="input-group-text">Password</span>
        <input type="password" class="form-control" placeholder="password" name="customer[password]">
    </div>

    <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupSelect01">Status</label>
        <select class="form-select" id="inputGroupSelect01" name="customer[status]">
            <?php foreach($this->getStatusOptions() as $key => $value) : ?>
                    <option value='<?php echo $key ?>'?><?php echo $value ?></option>
            <?php  endforeach; ?>
        </select>
    </div>
    <input type="submit" class="btn btn-dark my-2" value="save" onclick="object.setForm('#customerSave').load()">
    <input type="reset" class="btn btn-dark my-2" value="reset">
    </form>
</div>
