
/*
 Template Name: Veltrix - Responsive Bootstrap 4 Admin Dashboard
 Author: Themesbrand
 File: Form Editor
 */

$(document).ready(function () {
    if($("#elm1").length > 0){
        tinymce.init({
            selector: "textarea#elm1",
            theme: "modern",
            height:300,
            plugins: [
                "advlist autolink link image lists charmap preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code insertdatetime media",
                "save table contextmenu directionality paste textcolor"
            ],
            toolbar: "undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | media fullpage | forecolor backcolor",
        });
    }

});
