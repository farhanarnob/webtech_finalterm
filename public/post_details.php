<?php include "../include/header_profileindex.php" ;
require_once('../include/connection.php');
?>
<div class="sidebar">
	<ul>
		<li>link 1</li>
		<li>link 2</li>
		<li>link 3</li>
		<li>link 4</li>
		<li>link 5</li>
	</ul>
</div>
<div id="main">


	
<?php 
    if($_GET["ID"]!=""){
        $ID = $_GET["ID"];
        $sql = "SELECT post_head,post_body, image FROM blogpost where ID=".$ID;
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            $image=$row["image"];
            if($image == "image/"){
            	$image = "image/1.jpg";
            }
            $post_head=$row["post_head"];
            $post_body=$row["post_body"];
            echo '<div class="blog-post clearfix">
			<div class="blog-imgfull">
			<img src="'.$image.'" alt="image">	
			</div>
			<div class="picture_blog-description ">'.
			'<h2>'.$post_head.'</h2><br><hr>'.
			'<p>'.$post_body.'</p></div><br><br>';
	        }
	    }
	}else {
            echo "0 results";
    }
 ?>
	<!-- <div class="blog-post clearfix">
		<div class="blog-imgfull">
			<img src="image/1.jpg" alt="image">	
		</div>
		<div class="picture_blog-description ">
			<h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum ex corporis reiciendis, sit debitis illum, quo quam in eaque culpa excepturi explicabo magnam repellendus, earum praesentium! Distinctio ipsam incidunt nobis aspernatur fugit aliquam iusto necessitatibus impedit porro perferendis facilis at, quam, quis! Cumque, quas, molestias.Nostrum ex corporis reiciendis, sit debitis illum, quo quam in eaque culpa excepturi explicabo magnam repellendus, earum praesentium! Distinctio ipsam incidunt nobis aspernatur fugit aliquam iusto necessitatibus impedit porro perferendis facilis at, quam, quis! Cumque, quas, molestias.Nostrum ex corporis reiciendis, sit debitis illum, quo quam in eaque culpa excepturi explicabo magnam repellendus, earum praesentium! Distinctio ipsam incidunt nobis aspernatur fugit aliquam iusto necessitatibus impedit porro perferendis facilis at, quam, quis! Cumque, quas, molestias.Nostrum ex corporis reiciendis, sit debitis illum, quo quam in eaque culpa excepturi explicabo magnam repellendus, earum praesentium! Distinctio ipsam incidunt nobis aspernatur fugit aliquam iusto necessitatibus impedit porro perferendis facilis at, quam, quis! Cumque, quas, molestias.Nostrum ex corporis reiciendis, sit debitis illum, quo quam in eaque culpa excepturi explicabo magnam repellendus, earum praesentium! Distinctio ipsam incidunt nobis aspernatur fugit aliquam iusto necessitatibus impedit porro perferendis facilis at, quam, quis! Cumque, quas, molestias.Nostrum ex corporis reiciendis, sit debitis illum, quo quam in eaque culpa excepturi explicabo magnam repellendus, earum praesentium! Distinctio ipsam incidunt nobis aspernatur fugit aliquam iusto necessitatibus impedit porro perferendis facilis at, quam, quis! Cumque, quas, molestias.Nostrum ex corporis reiciendis, sit debitis illum, quo quam in eaque culpa excepturi explicabo magnam repellendus, earum praesentium! Distinctio ipsam incidunt nobis aspernatur fugit aliquam iusto necessitatibus impedit porro perferendis facilis at, quam, quis! Cumque, quas, molestias.</p>
		</div> -->

	</div>
	
	
	
	
	
	
</div>
<?php include "../include/footer.php" ?>