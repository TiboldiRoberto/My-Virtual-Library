<?php

include 'connection.php';

$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($con, $_POST["query"]);
	$query = "SELECT * FROM books WHERE title LIKE '%".$search."%' OR author LIKE '%".$search."%'";
}
else
{
    $query="SELECT * FROM books";
}
if(isset($_POST["query"])){
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_array($result))
	{
		$output .= '
		<div class="flip-box">
      <div class="flip-box-inner">
        <div class="flip-box-front">
           <img class="cover-image"src="covers/'.$row['title'].'.jpg">
        </div>
        <div class="flip-box-back">
          <br>
          <div class="title-book">'.$row['title'].'</div>
          <br>
          <div class="title-book"> '.$row['author'].'</div>
          <br>
          <div class="title-book"> '.$row['language'].'</div>
          <br>
          <div class="title-book"> '.$row['year'].'</div>
          <br><br><br>
          <div><a class="generic-btn buy-btn" style="text-decoration: none;" href="pdf/'.$row['title'].'.pdf">Read</a></div>
        </div>
      </div>
    </div>
		';
    }
    echo $output;
}
else
{
	echo 'Data Not Found';
}
}

?>