<div class="container my-2">
        <h2>Update Customer Group</h2>
        <form action="<?php echo $this->getFormUrl()?>" method="post">

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">First Name</span>
                <input type="text" class="form-control" placeholder="First Name" name="customer[firstName]" value="<?php echo $this->customer['firstName'];?>">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Last Name</span>
                <input type="text" class="form-control" placeholder="Last Name" name="customer[lastName]" value="<?php echo $this->customer['lastName'];?>">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">E-mail</span>
                <input type="text" class="form-control" placeholder="xyz@server.com" name="customer[email]" value="<?php echo $this->customer['email'];?>">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Mobile</span>
                <input type="number" class="form-control" id="basic-url" aria-describedby="basic-addon3" placeholder="mobile" name="customer[mobile]" value="<?php echo $this->customer['mobile'];?>">
            </div> 

            <div class="input-group mb-3">
                <span class="input-group-text">Password</span>
                <input type="password" class="form-control" placeholder="password" name="customer[password]" value="<?php echo $this->customer['password'];?>">
            </div>
            <div class="d-flex justify-content-center m-3">
                <input type="submit" class="btn btn-dark mx-2 col-md-2" value="save">
                <input type="reset" class="btn btn-dark mx-2 col-md-2" value="reset">
            </div>
        </form>
    </div>