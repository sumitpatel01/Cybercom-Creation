<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="">QuesteCom</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav d-flex">
      <li class="nav-item">
        <a class='btn btn-dark mx-1' href='<?php echo $this->getUrl()->getURL('grid','admin\product',null,true);?>'>Product</a>
        </li>
        <li class="nav-item">
        <a class='btn btn-dark mx-1' href='<?php echo $this->getUrl()->getURL('grid','admin\shipping',null,true);?>'>Shipping</a>
        </li>
        <li class="nav-item">
        <a class='btn btn-dark mx-1' href='<?php echo $this->getUrl()->getURL('grid','admin\payment',null,true);?>'>Payment</a>
        </li>
        <li class="nav-item">
        <a class='btn btn-dark mx-1' href='<?php echo $this->getUrl()->getURL('grid','admin\customer',null,true);?>'>Customer</a>
        </li>
        <li class="nav-item">
        <a class='btn btn-dark mx-1' href='<?php echo $this->getUrl()->getURL('grid','admin\category',null,true);?>'>Category</a>
        </li>
        <li class="nav-item">
        <a class='btn btn-dark mx-1' href='<?php echo $this->getUrl()->getURL('grid','admin\Customer\Group',null,true);?>'>Customer Group</a>
        </li>
        <li class="nav-item">
        <a class='btn btn-dark mx-1' href='<?php echo $this->getUrl()->getURL('grid','admin\Cms',null,true);?>'>CMS</a>
        </li>
        <li class="nav-item">
        <a class='btn btn-dark mx-1' href='<?php echo $this->getUrl()->getURL('grid','admin\admin',null,true);?>'>Admin</a>
        </li>
        <li class="nav-item">
        <a class='btn btn-dark mx-1' href='<?php echo $this->getUrl()->getURL('grid','admin\attribute',null,true);?>'>Attribute</a>
        </li>
      </ul>
    </div>
  </div>
</nav>