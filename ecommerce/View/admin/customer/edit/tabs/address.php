<?php $shipping = $this->getShipping()[0];;?>
<?php $billing = $this->getBilling()[0];?>
<div class="container my-2">
        
        <form action="<?php echo $this->getFormUrl()?>" method="post">
            
            <div class="col-md-12 d-flex flex-row m-5">
            <div class="col-md-5">
            <h2>Billing address</h2>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Adderss</span>
                <input type="text" class="form-control" placeholder="address" name="customer[billing][address]" value="<?php echo $billing->address;?>">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">ZipCode</span>
                <input type="text" class="form-control" placeholder="zipcode" name="customer[billing][zipcode]" value="<?php echo $billing->zipcode;?>">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">City</span>
                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" placeholder="City" name="customer[billing][city]" value="<?php echo $billing->city;?>">
            </div> 

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">State</span>
                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" placeholder="State" name="customer[billing][state]" value="<?php echo $billing->state;?>">
            </div> 

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Country</span>
                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" placeholder="Country" name="customer[billing][country]" value="<?php echo $billing->country;?>">
            </div> 

            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
            <h2>Shipping Address</h2>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Adderss</span>
                <input type="text" class="form-control" placeholder="address" name="customer[shipping][address]" value="<?php echo $shipping->address;?>">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">ZipCode</span>
                <input type="text" class="form-control" placeholder="zipcode" name="customer[shipping][zipcode]" value="<?php echo $shipping->zipcode;?>">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">City</span>
                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" placeholder="city" name="customer[shipping][city]" value="<?php echo $shipping->city;?>">
            </div> 

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">State</span>
                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" placeholder="state" name="customer[shipping][state]" value="<?php echo $shipping->state;?>">
            </div> 

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Country</span>
                <input type="nutextmber" class="form-control" id="basic-url" aria-describedby="basic-addon3" placeholder="country" name="customer[shipping][country]" value="<?php echo $shipping->country;?>">
            </div> 
            </div>
            </div>
            <div class="d-flex justify-content-center m-3">
                <input type="submit" class="btn btn-dark mx-2 col-md-2" value="save">
                <input type="reset" class="btn btn-dark mx-2 col-md-2" value="reset">
            </div>
            
        </form>
    </div>