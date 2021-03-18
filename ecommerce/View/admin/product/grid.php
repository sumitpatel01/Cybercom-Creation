<?php $products = $this->getProducts() ?>
<div class="container my-2 text-center">
    <h2 class="fw-bold">Manage Products</h2>
    <a class="btn btn-outline-dark my-1 float-middle" href='<?php echo $this->getUrl()->getURl('form',null,null,true)?>'>Add Product</a>
    <table class="table table-light" id="product_table">
        <thead>
            <tr>
                <th>Product Id</th>
                <th>SKU</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Discount(%)</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if($products) : ?>
            <?php foreach ($products as $productKey => $product) : ?>
            <?php 
                if ($product->status) {
                    $color = 'primary';
                    $status = 'Enabled';
                } else {
                    $color = 'secondary';
                    $status = 'Disabled';
                }
            ?>
            <tr>
                <td>
                    <?php echo $product->productId; ?>
                </td>
                <td>
                    <?php echo $product->sku; ?>
                </td>
                <td>
                    <?php echo $product->productName; ?>
                </td>
                <td>
                    <?php echo $product->price; ?>
                </td>
                <td>
                    <?php echo $product->discount; ?>
                </td>
                <td>
                    <?php echo $product->quantity; ?>
                </td>
                <td>
                    <a class='btn btn-<?php echo $color; ?>' href='<?php echo $this->getUrl()->getURL('status','product',['id'=> $product->productId]); ?>'>
                        <?php echo $status; ?>
                    </a>
                </td>
                <td>
                    <?php echo $product->description; ?>
                </td>
                <td>
                    <a class='btn btn-success' href='<?php echo $this->getUrl()->getUrl('edit','product',['id' => $product->productId ]) ?>'>
                        Edit
                    </a>
                    <a class='btn btn-danger'  href='<?php echo $this->getUrl()->getUrl('delete','product',['id' => $product->productId ]) ?>'>
                        Delete
                    </a>
                </td>
                </td>
            </tr>

            <?php endforeach; ?>
            <?php endforeach; ?>
    <?php else : ?>    
                <tr>
                    <td colspan="9">No Products found</td>
                </tr>
    <?php endif; ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function () {
        $('#product_table').DataTable();
    });
</script>
