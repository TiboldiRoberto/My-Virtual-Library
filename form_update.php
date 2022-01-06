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
    <div class='container'>
        <br>
        <h1>Update books data</h1>
        <hr>
        <h2>Select book ID</h2>
        <br>

        <form method="post">
            <input type="text" name="id_book" placeholder="Insert ID" required>
            <input type="submit" name="search_book" value="Search">
        </form>

        <br>
        <h2>Old info</h2>
        <br>
        <table class="user-table">
            <tr>
                <th>Info</th>
                <th>Book Id</th>
                <th>Title</th>
                <th>Author</th>
                <th>Language</th>
                <th>Subject</th>
                <th>Year</th>
                <th>Pages</th>
            </tr>
            <tr>
                <td>info</td>
                <?php
                if (isset($_POST['search_book'])) {
                    $id_book = $_POST['id_book'];
                    $sql = "SELECT * FROM books where id_book = '$id_book' limit 1";
                    $rez = mysqli_query($con, $sql);
                    // $rez = $rez->num_rows ? 'true' : 'false';
                    // echo $rez;
                    if ($rez->num_rows > 0) {
                        while ($row = mysqli_fetch_array($rez)) {
                            echo "<td>" . $row['id_book'] . "</td>
                                        <td>" . $row['title'] . "</td>
                                        <td>" . $row['author'] . "</td>
                                        <td>" . $row['language'] . "</td>
                                        <td>" . $row['subject'] . "</td>
                                        <td>" . $row['year'] . "</td>
                                        <td>" . $row['nr_pages'] . "</td>";
                        }
                    } else {
                        echo '<script>swal("Whoops!", "No book found with this id!", "warning");</script>';
                    }
                } else {
                    echo    "<td>No Selection</td> 
                                    <td>No Selection</td>
                                    <td>No Selection</td>
                                    <td>No Selection</td>
                                    <td>No Selection</td>
                                    <td>No Selection</td>
                                    <td>No Selection</td>";
                }
                ?>
            </tr>
        </table>
        <br>
        <h2>New info</h2>
        <br>
        <form action="update_book.php" method="POST">
            <table class="user-table">
                <tr>
                    <th>Info</th>
                    <th>Book Id</th>
                    <th>Title</th>
                    <th>Author</th>
                </tr>
                <tr>
                    <td>information</td>
                    <td><input type="text" name="id_book" value="<?php if (isset($_POST['search_book'])) {
                                                                        echo $id_book;
                                                                    } ?>" required></td>
                    <td><input type="text" name="title" required></td>
                    <td><input type="text" name="author" required></td>
                </tr>
                <tr>
                    <th>Language</th>
                    <th>Subject</th>
                    <th>Year</th>
                    <th>Pages</th>
                </tr>
                <tr>
                    <td><input type="text" name="language" required></td>
                    <td><input type="text" name="subject" required></td>
                    <td><input type="text" name="year" required></td>
                    <td><input type="text" name="nr_pages" required></td>
                </tr>
                <tr>
                    <td> <input type="submit" name="update" value="Update" class="generic-btn buy-btn"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>

<?php
if (isset($_GET['success']) && $_GET['success'] == 11) {
    echo '<script>swal("Great job!", "This book has been updated!", "success");</script>';
    echo '<script>
                var url= document.location.href;
                window.history.pushState({}, "", url.split("?")[0]);
                </script>';
}
?>