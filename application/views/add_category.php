<?php include "template/header.php" ?>


<div id="main-wrapper">
<?php include 'template/navbar.php' ?>
<?php include "template/sidebar.php" ?>

<div class="content-body">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">ADD Category</h4>
                    <div class="basic-form">
                        <form method="post" action="" id="validations">
 
                        <div class="form-row">

                            <div class="form-group col-md-6">
                            <label>Category name<span class="required_details">*</span></label>
                            <input type="text" class="form-control" placeholder="Name" name="category_name">
                            <?php echo form_error('category_name') ?>
                            </div>

                            <div class="form-group col-md-4">
                            <label>Parent Category </label>
                            <select id="inputState" class="form-control" name="parent_category">
                            
                          
                            <?php
                                foreach ($category as $row) {
                                    ?>
                                    <option value="<?php echo $row['id']; ?>" ><?php echo $row['name']; ?></option>
                                   <?php } ?>
                                   <?php echo '<option value="0">No Parent Categories</option>'?>
                                    
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Category Description <span class="required_details">*</span> </label>
                            <textarea class="form-control h-150px ck_editor_txt" rows="6" id="comment" name="category_description"></textarea>
                        </div>

                        <label for="">Category Image<span class="required_details">*</span></label><br>
                        <div class="input-group mb-3" id="selectimage">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" onchange=readUrl(this) name="category_image" id="category_images">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           
                            <img src="/Ecommerce_ci/Assets/images/member/noimage.png" alt="member" id="bulk" height="50px" width="">
                            </div>
                            
                        </div>
                                        
                        <a href="category.php">  
                        <button type="button" class="btn btn-danger">Cancel</button>
                        </a>
                
                        <a href="<?php echo base_url('category'); ?>">
                        <button type="submit" class="btn btn-primary" name="category_add">Save</button>
                        </a>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
 </div>
</div>


<?php include "template/footer.php" ?>

