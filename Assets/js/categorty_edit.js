var a=document.getElementById("bulk");
function readUrl(input)
{
        if(input.files){
            var reader=new FileReader();
            reader.readAsDataURL(input.files[0]);
            reader.onload=(e)=>{
                a.src=e.target.result;
            }
        }
}



// Initialize CKEditor
// Initialize CKEditor


// Replace the text area with CKEditor
CKEDITOR.replace('comment', {
    enterMode: CKEDITOR.ENTER_BR,
    shiftEnterMode: CKEDITOR.ENTER_P,
    allowedContent: true,
    autoParagraph: false,
    ignoreEmptyParagraph: true
});

// Function to set data in CKEditor
function setDataToCKEditor(data) {
    CKEDITOR.instances['comment'].setData(data);
}

// Assuming you have an "edit" button with an ID 'editButton'
document.getElementById('editButton').addEventListener('click', function() {
    // Get the description data from PHP (replace this with your actual data)
    var descriptionData = '<?php echo addslashes($edit["description"]) ?>';

    // Set data to CKEditor when the "edit" button is clicked
    setDataToCKEditor(descriptionData);
});




