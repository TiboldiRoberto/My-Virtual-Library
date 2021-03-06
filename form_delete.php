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
        <h1>Delete Books</h1>
        <form action="delete_book.php" method="POST">
            <table class="user-table" style="width:100%; text-align: center;">
                <tr>
                    <th>Id</th>
                </tr>
                <tr>
                    <td><input type="text" name="id_book" required></td>
                </tr>

                <tr>
                    <td style="padding-top: 10px;"><input type="submit" value="Delete" class="generic-btn delete-btn"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>

<?php
if (isset($_GET['success']) && $_GET['success'] == 11) {
    echo '<script>swal("Great job!", "This book has been deleted!", "success");</script>';
    echo '<script>
                var url= document.location.href;
                window.history.pushState({}, "", url.split("?")[0]);
                </script>';
}
if (isset($_GET['success']) && $_GET['success'] == 22) {
    echo '<script>swal("Whoops!", "No book found with this id!", "warning");</script>';
    echo '<script>
                var url= document.location.href;
                window.history.pushState({}, "", url.split("?")[0]);
                </script>';
}
?>