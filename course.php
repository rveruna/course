<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edinburgh Alter University | Course</title>
    <link href="apple-touch-icon.png" rel="apple-touch-icon" />
    <link href="favicon.png" rel="icon" type="image/png">
    <meta name="description" content="Edinburgh Alter University course">
    <meta name="author" content="Veronika Rosicova" />
 <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  <body>
    <div id="wrapper">
	<div class="row">
		<div class="col-md-12">
            <!-- start header -->
        <header>
            <div class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                        <a class="navbar-brand" href="index.html"><img src="img/logo.png" alt="Edinburgh Alter University logo" /></a>
                    </div>
                    <div class="navbar-collapse collapse ">
                        <ul class="nav navbar-nav">
                            <li><a href="index.html">Home</a></li>
                            <li class="active"><a href="courses.php">Courses</a></li>
                            <li><a href="">Study with us</a></li>
                            <li><a href="">Alumni</a></li>
                            <li><a href="contact.html">About us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- end header -->
			
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
    <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-lg-3">
                        <address>
                            <b>Craiglockhart Campus</b><br>
					            219 Colinton Road<br>
					            Edinburgh, EH14 1DJ 
                        </address>
                        <p>
                            <i class="fa fa-phone"></i> 0131 455 4616 <br>
                            <i class="fa fa-envelope"></i> craiglockhart.reception@<br>Alter.ac.uk
                        </p>
                    </div>
                    <div class="col-sm-3 col-lg-3">
                        <address>
					            <b>Merchiston Campus</b><br>
					            10 Colinton Road<br>
					            Edinburgh, EH10 5DT 
                            </address>
                        <p>
                            <i class="fa fa-phone"></i> 0131 455 2412 <br>
                            <i class="fa fa-envelope "></i> enquiries@Alter.ac.uk
                        </p>
                    </div>
                    <div class="col-sm-3 col-lg-3">
                        <address>
					            <b>Sighthill Campus</b><br>
					            9 Sighthill Court<br>
					            Edinburgh, EH11 4BN
                            </address>
                        <p>
                            <i class="fa fa-phone"></i> 0131 455 3555 <br>
                            <i class="fa fa-envelope"></i> sigreception@Alter.ac.uk
                        </p>
                    </div>
                    <div class="col-sm-3 col-lg-3">
                        <h4>Newsletter</h4>
                        <p>Fill your email and sign up for monthly newsletter to keep updated</p>
                        <div class="form-group multiple-form-group input-group">
                            <input type="email" name="email " class="form-control">
                            <span class="input-group-btn">
                                    <button type="button" class="btn-theme btn-lg">Subscribe</button>
                                </span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sub-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="copyright">
                                <p>Website created for educational purposes only. Alter based on Napier University.</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="social-network">
                                <li><a href="https://www.facebook.com/EdinburghNapierUniversity/" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/EdinburghNapier " title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.linkedin.com/school/17489?pathWildcard=17489" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="https://plus.google.com/104252332147513621215 " title="Google plus"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>