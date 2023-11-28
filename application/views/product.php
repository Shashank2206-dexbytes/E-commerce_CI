<?php include "template/header.php" ?>

<div id="main-wrapper">
<?php include 'template/navbar.php' ?>
<?php include "template/sidebar.php" ?>
<div class="content-body">
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="addproduct.php">
                        <button class="btn-primary" id="Addnew" style="float:right">Add New +</button>
                    </a>
                    <div class="form-group">
                                    
                    <select id="productselect" class="form-control" name="parent_category">
                        <option>Category</option>
                        <option>Electronic</option>
                        <option>Footwear</option>
                        <option>Furniture</option>
                    </select>
                    </div>

                    <h4 class="card-title">Product</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped zero-configuration">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Price/Unit</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($product as $row=>$value): ?>
                                <tr>
                                <td><?php echo $value['product_name']; ?></td>

                                <td><?php echo $value['product_category_name'];?></td>

                                <td><?php echo $value['product_quantity'];?></td>
                                
                                <td><?php echo $value['product_price']; ?></td>

                                <td>
                                
                                <?php if(isset($value['status']) && $value['status'] == 1){ ?>
                                    <a class="btn btn-success" href="<?php echo base_url()?>Category/active_status_user/<?= $value['product_id']?>">Active</a>

                                    <?php } else { ?>

                                <a class="btn btn-danger" href="<?php echo base_url()?>Category/deactiv_status_user/<?= $value['product_id']?>">Deactive</a>
                                    <?php }?>
                                
                                </td>

                            <td>
                                <div class="elements">
                                <a href="">
                                    <img class="edit" src="/Ecommerce_ci/Assets/Images/edit_logo.png" alt="edit_logo" height="20px">
                                </a>

                                <div class="form-group col-md-4">
                                <label class="toggle-control">
                               
                                <input type="checkbox" class="toggleone" <?php if($value['status'] == '1') {echo 'checked';} ?> onclick="toggleStatus(<?php echo $value['product_id']; ?>)">
                                <span class="control"></span>
                                </label>
                                </div>
    
                                    
                                <a href=""> <img class="delete_icon" src="/Ecommerce_ci/Assets/Images/delete_icon.png" alt="delete_icon">
                                </a>

                                </div>
                            </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

  
<?php include "template/footer.php" ?>

