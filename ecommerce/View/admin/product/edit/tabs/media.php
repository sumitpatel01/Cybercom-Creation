<div class="container-fluid m-5 col-md-11">
    <h2>Media Details</h2>
    <div class="d-flex justify-content-end col-md-11">
        <form action="<?php echo $this->getFormUrl()?>" method="post" enctype="multipart/form-data">
            <input type="submit" name="update" value="Update" class="btn btn-success m-2">
            <input type="submit" name="delete" value="Delete" class="btn btn-danger m-2">
    </div>
    <div class="m-3">
        <table class="table table-light" id="product_table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>label</th>
                    <th>small</th>
                    <th>thumbnail</th>
                    <th>Base</th>
                    <th>Gallery</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php if($this->getProductImages()) : ?>
                <?php foreach ($this->getProductImages() as $productKey => $productImage) : ?>
                <tr>
                    <td>
                        <?php echo $productImage->id?>
                    </td>
                    <td>
                        <img width="100px" height="100px" src='<?php echo $productImage->image?>'>
                    </td>
                    <td>
                        <input type='text' name='<?php echo $productImage->id?>[label]' value="<?php echo$productImage->label?>">
                    </td>
                    <td>
                        <input type='radio' class="isSmall" name='<?php echo $productImage->id?>[small]' <?php if($productImage->small == 1){echo 'checked';} ?>>
                    </td>
                    <td>
                        <input type='radio' class="isThumb" name='<?php echo $productImage->id?>[thumbnail]' <?php if($productImage->thumbnail == 1){echo 'checked';}?>>
                    </td>
                    <td>
                        <input type='radio' class="isBase" name='<?php echo $productImage->id?>[base]' <?php if($productImage->base == 1){echo 'checked';} ?>>
                    </td>
                    <td>
                        <input type='checkbox' name='<?php echo $productImage->id?>[gallery]' <?php if($productImage->gallery == 1){echo 'checked';} ?>>
                    </td>
                    <td>
                        <input type='checkbox' name='<?php echo $productImage->id?>[remove]' <?php if($productImage->remove == 1){echo 'checked';} ?>>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan='8' class='text-center'>No Media Available</td>
                    </tr>;               
                    <?php endif; ?>
            </tbody>
        </table>
        <div class="md-col-9 mt-5">
            <div class="col-md-4">
                <label for="formFile" class="form-label">Upload Product Image</label>
                <input class="form-control" type="file" name="image">
            </div>
            <div class="col-md-2">
                <input type="submit" name="upload" value="Upload" class="btn btn-dark m-2">
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".isSmall").change(function () {
                $('.isSmall').not(this).prop('checked', false);
            });

            $(".isThumb").change(function () {
                $('.isThumb').not(this).prop('checked', false);
            });

            $(".isBase").change(function () {
                $('.isBase').not(this).prop('checked', false);
            });
        });
    </script>
</div>