<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Courses</title>

    <meta name="description" content="">
    <meta name="author" content="">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>
    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
            <div class="row">
				<div class="space">
				</div>
			</div>
			
			<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
				<div class="navbar-header">
					 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button> <a class="navbar-brand" href="#">MyUni</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li>
							<a href="index.php">Courses</a>
						</li>
						<li class="active">
							<a href="course.php">Individual course</a>
						</li>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#">Facebook</a>
						</li>
                        <li>
							<a href="#">Twitter</a>
						</li>
                        <li>
							<a href="#"></a>
						</li>
					</ul>
				</div>
				
			</nav>
			
        <div class="row">
				<div class="space">
				</div>
			</div>    
           
        <div class="row">
            <div class="col-md-7 col-md-offset-2">
<?php
   
    $id = $_GET['id'];
    
    mysql_connect("localhost","veronikarosicova_co_uk","Ty7ih6ot");
    mysql_select_db("veronikarosicova_co_uk");
    
    $construct ="SELECT * FROM course WHERE id='$id'";
    $run = mysql_query($construct);
     
        while($runrows = mysql_fetch_assoc($run)) {
            $id = $runrows ['id'];
            $title = $runrows ['title'];
            $href = $runrows ['href'];
            $level = $runrows ['level'];
            $award = $runrows ['award'];
            $summary = $runrows ['summary'];
            $dept = $runrows ['dept'];
            $subject = $runrows ['subject'];
            $overview = $runrows ['$overview'];
            $wyl = $runrows ['wyl'];
            $careers = $runrows ['careers'];
            
             
            $result1 = "<a href='course.php'><b>$title</b></a><br><br>"; 
            $result2 = "$summary<br>";
            $result3 = "<a href='$href'>$href</a><p><br>";
            $panel = '<div class ="panel" >';
            $panelheading = '<div class ="panelh" >';
            $hide = '<div class ="hide" >';
            $enddiv = '</div>';
                            
            //-display  the result of the array 
            echo  "$panel"."<h2>$result1</h2>"."<h3>ID: </h3>"."<p>$id</p>"."<h3>Level: </h3>"."<p>$level</p>"."<h3>Award: </h3>"."<p> $award<br></p>"."<h3>Summary: </h3>"."<p><br>$result2</p><br>"."<h3>Subject: </h3>"."<p>$subject</p>"."<h3>Overview: </h3>"."<p>$overview</p>"."$wyl"."<h3>Careers: </h3>"."<p>$careers</p>"."$enddiv";
        }   
 
?>
            </div><!-- /.col-lg-8 -->
            <div class="col-md-2">
                <h4>Course modules: </h4>
							
<?php  
																
    $query = "SELECT module.title, module.id as id 
					FROM cm 
					JOIN module ON cm.module = module.id
					WHERE cm.course = '$id'";
						$res = mysql_query($query);
							while($r = mysql_fetch_assoc($res)) {
							    echo  "$panel";
    							echo "<br><b>" . $r['title'] . "</b>";
    							echo "<br>" . $r['id'];  
    							echo "<br>"; 
    							echo  "$enddiv";
										}  
?>
        </div><!-- /.col-md-2 end -->
    </div><!-- /.row -->
            
			
		</div>
        </div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>