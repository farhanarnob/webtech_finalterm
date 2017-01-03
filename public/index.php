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
		$sql = "SELECT ID,post_head, post_body, image FROM blogpost";
		$result = mysqli_query($conn, $sql);


		if ($result->num_rows > 0) {
	    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	$head = $row["post_head"];
		    	if(strlen($head)>50){
		    		$head = substr($head, 0,50);
		    		$head.='...';
		    	}
		    	$body = $row["post_body"];
		    	if(strlen($body)>350){
		    		$body = substr($body, 0,350);
		    		$body.='...';
		    	}
		        echo '<div class="blog-post clearfix">
		        <div class="blog-img">
				<img src="';

				if($row["image"] == "image/"){
					echo "image/1.jpg";
				}else{
					echo $row["image"];
				}
				echo '" alt="image">
				</div>
				<div class="blog-description">
				<h2><a href="post_details.php?ID='
				.$row["ID"].'">' 
				. $head. '</a></h2>
				<p>' . $body. '</p>
				</div></div><br><br>';
		    }
			} else {
			    echo "0 results";
			}
			$conn->close();
	 ?>
</div>
<?php include "../include/footer.php" ?>
