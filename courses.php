<?php
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Courses</title>

    <meta name="description" content="">
    <meta name="author" content="">
    <link href="apple-touch-icon.png" rel="apple-touch-icon" />
    <link href="favicon.png" rel="icon" type="image/png">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>
    <div id="wrapper">
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
            <section id="inner-headline">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
                            <li class="active">Courses</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
            <p class="text-center">
				Use our search button to find the courses available at Edinburgh Alter University
			</p>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 ">
                    <form role="search" action="courses.php" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" id="course" name= "search" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-theme btn-lg" type="submit" name="submit" value="search">Go!</button>
                            </span>
                        </div>
                    </form>
                </div><!-- /.col-lg-8 -->
            </div><!-- /.row -->
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 ">
<?php
   
    $button = $_GET ['submit'];
    $search = $_GET ['search']; 
    
    if(!$button)
             echo "You didn't submit a keyword";
       else {
             if( strlen( $search ) <= 1 )
                    echo "<p>Search term too short</p>";
             else {
                    echo "<p>You searched for <b> $search </b> <hr size='1' > </ br > </p>";
                    //connect  to the database 
                    mysql_connect("veronikarosicova.co.uk.mysql","veronikarosicova_co_uk","Ty7ih6ot");
                    //-select  the database to use
                    mysql_select_db("veronikarosicova_co_uk");
                    
                    $search_exploded = explode (" ", $search);
                    $x = 0;
                    foreach($search_exploded as $search_each) {
                        $x++;
                        if($x==1)
                            $construct .="title LIKE '%$search_each%'";
                        else
                            $construct .="AND title LIKE '%$search_each%'";
    
                    }
                    //-query  the database table 
                    $construct ="SELECT * FROM course WHERE $construct ORDER BY title ASC";
                    //-run  the query against the mysql query function
                    $run = mysql_query($construct);
                    //-count  results
                    $foundnum = mysql_num_rows($run);
                    
                    if ($foundnum==0)
                        echo "<p>Sorry, there are no matching result for <b>$search</b>.Please check your spelling</p>";
                    else {
                        echo "<p>$foundnum results found !</p>";
                        
                        //-create  while loop and loop through result set
                        while($runrows = mysql_fetch_assoc($run)) {
                            $title = $runrows ['title'];
                            $award = $runrows ['award'];
                            $summary = $runrows ['summary'];
                            $href = $runrows ['href'];
                            $id = $runrows ['id'];
                            
                            //-results as var
                            $result1 = "<h2>$title $award</h2><br><br>"; 
                            $result2 = "$summary<br>";
                            $result3 = "<a href='course.php?id=$id'><button>Read more</button></a><br><br><br>";
                            $panel = '<div class ="panel" >';
                            $panelheading = '<div class ="panelh" >';
                            $hide = '<div class ="hide" >';
                            $enddiv = '</div>';
                            
                           
                            //-display  the result of the array 
                            echo  "$panel"."<h2>$result1</h2>"."<p>$result2</p>"."$result3"."$enddiv";
                        }
                    }
    
            }
    }
 
?>
            </div><!-- /.col-lg-8 -->
        </div><!-- /.row -->
            
			
            
            
            
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
                                    <button type="button" class="btn btn-add">Subscribe</button>
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
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>			
  	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <!--<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>-->
    <script>
        $(function() {
            $( "#course" ).autocomplete({
            source: 'search.php'
            });
        });
  </script>
  </body>
</html>