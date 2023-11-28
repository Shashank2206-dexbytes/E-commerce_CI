$('#validations').validate({
    rules:{
        product_name: {
            required: true,
        },
        // category:{
        //     required:true,
        // },
        // sub_category:{
        //     required:true,
        // },
        product_price:{
            required:true,
        },
        discount:{
            required:true,
            prices:true,
        },
        product_quantity:{
            required:true,
        },
        sku_no:{
            required:true,
        },
        Image:{
            required:true,
        }
       
   
    },
    messages:{
        product_name: {
            required: 'Please Enter the Product name',
         
        },
        // category:{
        //     required:'Please Enter the Category name',
        // },
        // sub_category:{
        //     required:'Please Enter the sub category name',
        // },
        product_price:{
            required:'Please Enter the price',
        },
        discount:{
            required:'Please Enter the valid discount',
            prices:'Discount price cannot be greater than the product price.',
        },
        product_quantity:{
            required:'Please enter the qunatity',
        },
        sku_no:{
            required:'Please enter the sku number',
        },
        Image:{
            required:'please enter the images',
        }


    },
    
    
});



;

$(document).ready(function() {
    $.validator.addMethod("prices", function(value, element) {
        var productPrice = parseFloat($('#productPrice').val());
        var discountPrice = parseFloat(value);

        return discountPrice >= 0 && discountPrice <= productPrice;
    }, "Invalid discount price");

    $('#validations').validate({
        rules: {
            discount: {
                required:true,
                prices: true // Use the 'prices' validation method
            }
        },
        messages: {
            discount: {
                required:"Enter the Valid discount",
                prices: "Discount should be between 0 and product price.",
            }
        },
        submitHandler: function(form) {
            // Handle form submission here
            // The form will only be submitted if it passes validation
        }
    });
});


document.querySelectorAll('.view-btn').forEach(button => {
    button.addEventListener('click', event => {
        const categoryId = button.getAttribute('data-category-id');
        const categoryName = button.getAttribute('data-category-name');
        const categoryDescription = button.getAttribute('data-category-description');
        const categoryImagePath = button.getAttribute('data-category-path');
        const categoryParent = button.getAttribute('data-category-parent');

        const categoryIdPlaceholder = document.getElementById('category-id-placeholder');
        categoryIdPlaceholder.textContent = categoryId;
        categoryIdPlaceholder.style.display = 'inline';

        document.getElementById('categoryname').textContent = categoryName;
        document.getElementById('category-description').textContent = categoryDescription;
        document.getElementById('category-image').src = categoryImagePath;
        document.getElementById('category-parent').textContent = categoryParent;
    });
});

CKEDITOR.replace('comment', {
    enterMode: CKEDITOR.ENTER_BR,  // Use <br> for line breaks instead of <p>
    shiftEnterMode: CKEDITOR.ENTER_P,  // Use <p> for new paragraphs on Shift+Enter
    allowedContent: true,  // Allow any content even if it's not valid HTML
    autoParagraph: false  // Disable automatic <p> tag insertion
});

var images = [];

function image_select() {
  const imageInput = document.getElementById('image');

  for (let i = 0; i < imageInput.files.length; i++) {
    const image = imageInput.files[i];

    images.push({
      "name": image.name,
      "url": URL.createObjectURL(image),
      "file": image,
    });
  }

  updateImageContainers();
}

function updateImageContainers() {
  const container = document.getElementById('container');
  container.innerHTML = image_show();

  const modalImageContainer = document.getElementById('imageContainer');
  modalImageContainer.innerHTML = image_show(false); // Pass 'false' to prevent delete icons in the modal
}

function image_show(allowDelete = true) {
  var image = " ";
  images.forEach((i, index) => {
    image += `<div class="multipleimage"><div class="justify-content-start">
    <div class="image_container d-flex justify-content-center position-relative">
    <img src="` + i.url + `" alt="Images">`;

    if (allowDelete) {
      image += `<span class="position-absolute" onclick="delete_image(` + index + `)">&times;</span>`;
    }

    image += `</div></div>`;
  })
  return image;
}

function delete_image(e) {
  images.splice(e, 1);
  updateImageContainers();
}





     
    
  $(document).ready(function () {
    $('.slider').slick({
      autoplay: false,
      centerMode: true, // Center the active slide
      centerPadding: 50,
      slidesToShow: 1, // Display one slide at a time
      arrows: true, // Show navigation arrows
      prevArrow: '<button type="button" class="slick-prev">Previous</button>',
      nextArrow: '<button type="button" class="slick-next">Next</button>',
    });
  });


  $(document).ready(function() {
    // Store selected images in an array
    var selectedImages = [];
  
    // Handle the Product Preview button click
    $("#preview").click(function() {
      // Get the values from the form fields
      var productName = $("input[name='product_name']").val();
      var category = $("#inputState option:selected").text();
      var price = $("#productPrice").val();
      var description = CKEDITOR.instances.comment.getData();
  
      // Update the modal content with the form values
      $("#productname").text(productName);
      $("#previewEmail").text("Category: " + category);
      $("#previewProduct").text("$" + price);
      $("#productdescription").text(description);
  
      // Clear the selectedImages container
      $("#selectedImages").empty();
  
      // Add selected images to the container
      selectedImages.forEach(function(imageUrl, index) {
        var imageElement = $('<img src="/Modern_Ecommerce_website/Resources/images/member/' + imageUrl + '" class="d-block w-100" alt="Selected Image ' + (index + 1) + '">');
        $("#selectedImages").append(imageElement);
      });
  
      // Show the modal
      $('#exampleModal').modal('show');
    });
  
    // Function to handle image selection
    function image_select() {
      var files = document.getElementById('image').files;
  
      // Clear the selectedImages array
      selectedImages = [];
  
      // Clear the selectedImages container
      $("#selectedImages").empty();
  
      for (var i = 0; i < files.length; i++) {
        // Add selected images to the array and container
        selectedImages.push(URL.createObjectURL(files[i]));
  
        var imageElement = $('<img src="' + URL.createObjectURL(files[i]) + '" class="d-block w-100" alt="Selected Image ' + (i + 1) + '">');
        $("#selectedImages").append(imageElement);
      }
    }
  });
  


  

  
  
  
  
  const statusButtons = document.querySelectorAll('.status-toggle');
  statusButtons.forEach(button => {
      button.addEventListener('click', function() {
          const categoryId = this.getAttribute('data-categoryid');
          let currentStatus = this.getAttribute('data-status');
  
          // Toggle the status
          const newStatus = (currentStatus === 'publish') ? 'unpublish' : 'publish';
  
          // Update the button text and data-status attribute
          this.setAttribute('data-status', newStatus);
          this.innerHTML = newStatus;
  
          // Update the hidden input value
          const activeInput = this.closest('form').querySelector('input[name="active"]');
          activeInput.value = newStatus;
  
          // Update the button's class to change the text color
          this.classList.toggle('publish');
          this.classList.toggle('unpublish');
  
          // Display toastr notifications based on the status
          if (newStatus === 'publish') {
              toastr.success('Status updated to Active', 'Status:');
          } else {
              toastr.error('Status updated to Deactive', 'Status:');
          }
  
          // Manually submit the form
          this.closest('form').submit();
      });
  });
  
  const checkboxes = document.querySelectorAll('.form-check-input');
  checkboxes.forEach(checkbox => {
      checkbox.addEventListener('change', function() {
          // Toggle the status
          const currentStatus = this.checked ? 'publish' : 'unpublish';
  
          // Update the hidden input value
          const activeInput = this.closest('form').querySelector('input[name="publish"]');
          activeInput.value = currentStatus;
  
          // Manually submit the form
          this.closest('form').submit();
      });
  });
  
    (function ($) {
      $(function () {
        $('.slider').slick({
          dots: true,
          arrows: false, // Set arrows to false to remove the navigation buttons
          customPaging: function (slick, index) {
            var slide = slick.$slides.eq(index);
            var slideContent = slide.html(); // Get the HTML content of the slide
  
            // Create a custom indicator using the slide's content
            var customIndicator = '<div class="custom-slide-indicator">' + slideContent + '</div>';
  
            return customIndicator;
          }
        });
      });
    })(jQuery);
  
        function changeStatusColor(element) {
    if (element.classList.contains('text-primary')) {
      element.classList.remove('text-primary');
      element.classList.add('text-danger');
      element.textContent = 'Deactivated';
    } else {
      element.classList.remove('text-danger');
      element.classList.add('text-primary');
      element.textContent = 'Activated';
    }
  }


  let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("demo");
  let captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;


}