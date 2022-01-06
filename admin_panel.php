<?php
 include ("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
</head>
<body>

<?php 
include "admin_menu.php"; 
?>

<div class='container'>
  <br>
  <h1 style="text-align: center">Books List</h1>
</div>

<div class="flexbox-container">
    
    <?php
        $sql="SELECT * FROM books";
        $rez=mysqli_query ($con,$sql);
				while($row=mysqli_fetch_array($rez))
				{
    ?>
    
    <div class="flip-box">
      <div class="flip-box-inner">
        <div class="flip-box-front">
           <img class="cover-image"src="covers/<?php echo $row['title'] ?>.jpg">
        </div>
        <div class="flip-box-back">
          <br>
          <div class="title-book"><?php echo $row['title']?></div>
          <br>
          <div class="title-book"><?php echo $row['author']?></div>
          <br>
          <div class="title-book"><?php echo $row['language']?></div>
          <br>
          <div class="title-book"><?php echo $row['year']?></div>
        </div>
      </div>
    </div>
    <?php
    }
		?>	

</div>

</body>
</html>