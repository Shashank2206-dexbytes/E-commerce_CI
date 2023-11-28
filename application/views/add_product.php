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
                <h4 class="card-title">Project Management</h4>
                    <!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product View</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="modal-body">
  <div id="imageContainer" class="mt-3">
   
<div class="container">

<!-- Full-width images with number text -->
<div class="mySlides">
  <div class="numbertext">1 / 4</div>
    <img src="/Modern_Ecommerce_website/Resources/images/member/1.jpg" style="width:100%">
</div>

<div class="mySlides">
  <div class="numbertext">2 / 4</div>
    <img src="/Modern_Ecommerce_website/Resources/images/member/2.jpg" style="width:100%">
</div>

<div class="mySlides">
  <div class="numbertext">3 / 4</div>
    <img src="/Modern_Ecommerce_website/Resources/images/member/3.jpg" style="width:100%">
</div>

<div class="mySlides">
  <div class="numbertext">4 / 4</div>
    <img src="/Modern_Ecommerce_website/Resources/images/member/4.jpg" style="width:100%">
</div>

<!-- Next and previous buttons -->
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

<!-- Image text -->
<div class="caption-container">
  <p id="caption"></p>
</div>

<!-- Thumbnail images -->
<div class="row">
  <div class="column col-3">
    <img class="demo cursor" src="/Modern_Ecommerce_website/Resources/images/member/1.jpg" style="width:100%" onclick="currentSlide(1)" alt="The Woods">
  </div>
  <div class="column col-3">
    <img class="demo cursor" src="/Modern_Ecommerce_website/Resources/images/member/2.jpg" style="width:100%" onclick="currentSlide(2)" alt="Cinque Terre">
  </div>
  <div class="column col-3">
    <img class="demo cursor" src="/Modern_Ecommerce_website/Resources/images/member/3.jpg" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
  </div>
  <div class="column col-3">
    <img class="demo cursor" src="/Modern_Ecommerce_website/Resources/images/member/4.jpg" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
  </div>
</div>
</div>
  </div>
  <!-- Rest of your modal content -->
</div>

<div id="imageCarouselModal" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    
  </div>
  <a class="carousel-control-prev" href="#imageCarouselModal" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#imageCarouselModal" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
</div>

        <div class="d-flex mt-5 ml-5 pl-5">
        <div id="slickSlider" class="">
        </div>
        </div>


        <div class="mt-3 ml-3 col-md-12">
        <h6><strong></strong> <span id="productname"></span></h6>
        </div>

        <div class="col-md-12 d-flex mt-5">
        <div class=" col-md-12">
            <h4>
            <strong id="previewEmail" >Category :</strong>
            </h4>
        </div>
        </div>

        
        <div class=" d-flex col-md-12">

        <div class="col-md-4">
            <h6><strong>Price :</strong> </h6>
        </div>
        <div class="col-md-6">
            <h4>
            <span id="previewProduct"> $</span>
            </h4>
        </div>

        </div>
        <div class="mt-3 ml-3 col-md-12">
        <h6><strong>Description :</strong> <span id="productdescription"></span></h6>
        </div>

        <div class="col-md-12 d-flex mt-5">
        <div class="col-md-4">
            <div class="form-group d-flex">
            <label for="quantity"><b class="me-5">QTY:</b></label>
            <input type="number" class="form-control" id="previewQuantity">
            </div>
        </div>

        <div class="col-md-4">
            <button class="btn btn-warning"><a class="btn buynowcolor btn " href="#" role="button">Buy Now </a></button>
        </div>
        <div class="col-md-4">
            <button class="btn btn-success"><a class="btn playnowcolor btn " href="#" role="button">Pay Now </a></button>

        </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
                    
<!-- Modal -->
<button type="button" id="preview" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Product Privew</button>
<div class="basic-form">
<form action="" method="POST" id="validations" enctype="multipart/form-data">
<div class="form-row">
    <div class="form-group col-md-8">
        <label>Product Name<span class="required_details">*</span></label>
        <input type="text" class="form-control" placeholder="product name" name="product_name">
    </div>
    <div class="form-group col-md-4">
        <span id="Now_Draft">Publish Now/Draft</span>
    <label class="toggle-control">
                <input type="checkbox" checked="checked" />
                <span class="control"></span>
                </label>
    </div>
    
    <div class="form-group col-md-4">
        <label>Category</label>
        <select id="inputState" class="form-control " name="category_id">
        <?php
            foreach ($data as $row) 
            {?>
            <option value="<?php echo $row['category_id']; ?>" ><?php echo $row['category_name'] ?></option>;
            <?php } ?> 
            
        </select>
    </div>
    
                                
<div class="form-group col-md-4">
    <label>Price Per Unit<span class="required_details">*</span></label>
    <input type="number" class="form-control product_name" id="productPrice" placeholder="price" name="product_price">
</div>
<div class="form-group col-md-4">
    <label>Discount<span class="required_details">*</span></label>
    <input type="number" class="form-control product_name" id="discountPrice" placeholder="discount" name="discount">
</div>

<div class="form-group col-md-4">
    <label>Quantity<span class="required_details">*</span></label>
    <input type="text" class="form-control product_name" placeholder="Quantity" name="product_quantity">
</div>
<div class="form-group col-md-4">
    <label>SKU<span class="required_details">*</span></label>
    <input type="text" class="form-control product_name" placeholder="SKU no" name="sku_no">
</div>
<div class="col-md-4">
    <label class="m-t-20">Launch Date<span class="required_details">*</span></label>
    <input type="text" class="form-control product_name" placeholder="" id="mdate" name="launch_date">
</div>

</div>
<div class="form-group">
<label>Product Description <span class="required_details">*</span> </label>
<textarea class="form-control h-150px ck_editor_txt" rows="6" id="comment" name="product_description"></textarea>
</div>
<label for="">Product Image <span class="required_details">*</span></label><br>
<div class="input-group mb-3" id="multipleimage">
<div class="custom-file">
<input type="file" name="image[]" id="image" multiple class="d-none" onchange="image_select()" >
<button class="btn btn-sm btn-primary" type="button" onclick="document.getElementById('image').click()">Chose Image</button>

</div>

<div class="d-flex justify-content-start" id="container">

</div>

</div>

</div>
<a href="category.php">  
<button type="button" class="btn btn-danger">Cancel</button>
</a>
<a href="product.php">
<button type="submit" id="submit" class="btn btn-primary" name="product_add">Save</button>
    </a>
</form>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>
    <!-- #/ container -->
</div>
        <!--Content body end-->
<?php include "template/footer.php" ?>

    