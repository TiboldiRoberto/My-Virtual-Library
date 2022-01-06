<?php
include("connection.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Page</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Sweet Box Message Alert! -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

    <?php
    include "admin_menu.php";
    ?>
    <div class="container">
        <br>
        <h1>Insert Books</h1>
        <form action="insert_book.php" method="POST" enctype="multipart/form-data">
            <table class="user-table" style="width:100%; text-align: center;">
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Language</th>
                </tr>
                <tr>
                    <td><input type="text" name="title"></td>
                    <td><input type="text" name="author"></td>
                    <td><input type="text" name="language"></td>
                </tr>
                <tr>
                    <th>Subject</th>
                    <th>Year</th>
                    <th>Pages</th>
                </tr>
                <tr>
                <td><input type="text" name="subject"></td>
                    <td><input type="number" name="year"></td>
                    <td><input type="number" name="nr_pages"></td>
                </tr>
                <tr>
                    <th>Images</th>
                    <th>Cover Image Preview</th>
                    <th>Pdf</th>
                </tr>
                <tr>
                    <td><input style="width: 180px;" type="file" name="cover_image" id="inpFile"></td>
                    <td>
                        <div class="image-preview" id="imagePreview">
                            <img src="" alt="Image Preview" class="image-preview__image">
                            <span class="image-preview__default-text">Image Preview</span>
                        </div>
                    </td>
                    <td><input style="width: 180px;" type="file" name="pdf"></td>
                    
                </tr>
                <tr>
                <td></td>
                    <td style="padding-top: 10px;"><input type="submit" value="Insert" class="generic-btn buy-btn"></td>
                    <td></td>
                </tr>
            </table>
        </form>
        <br>
        <br>

        

    </div>
    </body>

</html>

<?php
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo '<script>swal("Great job!", "You added a new user!", "success");</script>';
    echo '<script>
                var url= document.location.href;
                window.history.pushState({}, "", url.split("?")[0]);
                </script>';
}
if (isset($_GET['success']) && $_GET['success'] == 2) {
    echo '<script>swal("Info!", "Someone was already registred with this email!", "info");</script>';
    echo '<script>
                var url= document.location.href;
                window.history.pushState({}, "", url.split("?")[0]);
                </script>';
}
if (isset($_GET['success']) && $_GET['success'] == 11) {
    echo '<script>swal("Great job!", "You added a new book!", "success");</script>';
    echo '<script>
                var url= document.location.href;
                window.history.pushState({}, "", url.split("?")[0]);
                </script>';
}
?>

<!-- Image Preview script -->
<script>
    const inpFile = document.getElementById("inpFile");
    const previewContainer = document.getElementById("imagePreview");
    const previewImage = previewContainer.querySelector(".image-preview__image");
    const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");

    inpFile.addEventListener("change", function(){
        const file = this.files[0];

        // Read file like data url
        if(file) {
            const reader = new FileReader();

            previewDefaultText.style.display = "none";
            previewImage.style.display = "block";

            reader.addEventListener("load", function(){
                console.log(this);
                previewImage.setAttribute("src", this.result);
            });

            reader.readAsDataURL(file);
        }
        else {
            previewDefaultText.style.display = null;
            previewImage.style.display = null;
            previewImage.setAttribute("src", "");
        }
    });

</script>