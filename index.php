<?php
 include ("connection.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>My Virtual Library</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
          <!-- Instant Search jquery & bootstrap -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <br>
        <h1 id="main-title">My Virtual Library</h1>
        <br>

        <div class="banner">
            <img src="images/b4.jpg" class="banner-img">
            
            <div class="search-box">
            <div class="search">
            <div class="icon"></div>
            <div class="input">
                <input type="text" placeholder="Search" id="mysearch" name="mysearch" required>  
            </div>
            <span class="clear" onclick="document.getElementById('mysearch').value = '' "></span>
            </div>
            </div>

        </div>

        <br>
        <div class="flexbox-container">
        <h2>Search results:</h2>
        </div>
        <br>

        <div id="result" class="flexbox-container"></div>

        <br>
        <h1 class="info-text">ALL BOOKS</h1>

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
          <br><br><br>
          <div><a class="generic-btn buy-btn" style="text-decoration: none;" href="pdf/<?php echo $row['title'] ?>.pdf">Read</a></div>
        </div>
      </div>
    </div>
    <?php
    }
		?>	
    </body>
</html>

<script>
const icon = document.querySelector('.icon');
const search = document.querySelector('.search');
icon.onclick = function(){
  search.classList.toggle('active');
}

</script>


<!-- Script for instant search -->
<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"instant_search.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#mysearch').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>