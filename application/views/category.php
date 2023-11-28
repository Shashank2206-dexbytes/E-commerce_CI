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
                    <a href="<?php echo base_url('Category/addcategory'); ?>">
                            <button class="btn-primary" id="Addnew" style="float:right">Add New +</button>
                        </a>

                        <h4 class="card-title">Category</h4>
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped zero-configuration">
                        <thead>
                        <tr>
                            <th>Category</th>
                            <th>Parent Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($category as $row=>$value): ?>
                            <tr>
                                
                                <td><?php echo $value['name']; ?></td>    

                                <td><?php echo $value['parent_category_name']; ?></td>

                                
                                <td>
                                    <?php if(isset($value['status']) && $value['status'] == 1){ ?>
                                    <a class="btn btn-success" href="<?php echo base_url()?>Category/active_status_user/<?= $value['id']?>">Active</a>

                                    <?php } else { ?>

                                <a class="btn btn-danger" href="<?php echo base_url()?>Category/deactiv_status_user/<?= $value['id']?>">Deactive</a>
                                    <?php }?>
                
                                </td>
                                <td>
                                
                                <button type="button" class="btn view-btn" data-toggle="modal"
                                data-target="#exampleModal"
                                data-category-id="<?= $value['id'] ?>"
                                data-category-name="<?= $value['name'] ?>"
                                data-category-description="<?= $value['description'] ?>"
                                data-category-path="/Modern_Ecommerce_website/Resources/images/member/<?= $value['image'] ?>"
                                data-category-parent="<?= $value['parent_category_name'] ?>">
                                <img src="/Modern_Ecommerce_website/Resources/images/view_logo.png"
                                    class="imageweightview" alt="view">
                                </button>
                            <a href="<?php echo base_url()?>Category/editcategory/<?= $value['id'] ?>">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button id="edit_button">
                                <img id="edit" src="/Modern_Ecommerce_website/Resources/images/edit_logo.png"
                                alt="eidt_logo" height="20px" id="data-category-id">
                                </button>
                            </a>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center" id="exampleModalLabel">Category</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="modelbox d-flex">
                                                <img id="category-image" class="p-3 mb-5 bg-body rounded w-25" src="" alt="Category Image" />
                                                <div class="text p-3 w-75 ">
                                                    <h6 class="fw-bold tables tablesize">
                                                        <b>Category: </b><span class="float-end fw-normal" id="categoryname"></span></h6>

                                                    <h6 class=" fw-bold tablesize"><b>Parent Category: </b>
                                                    <span class="float-end fw-normal" id="category-parent"></span></h6>

                                                    <h6 class="tablesize fw-bold "><b>Descrition:</b>
                                                    <span class="fw-normal" id="category-description"></span>
                                                    </h6>
                                                    <p class="invisible">Category ID: <span id="category-id-placeholder"></span></p>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>

                                        </div>
                                    </div>
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