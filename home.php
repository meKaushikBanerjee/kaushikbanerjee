<?php 
   include("includes/header.php");
   $_SESSION['msg']="";
          if(isset($_POST['submit']))
         {
            function random_id_strings($length_of_string)
            {
               $str_id = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
               return substr(str_shuffle($str_id),0,$length_of_string);
            }
            $randid = random_id_strings(6);
            $sql="SELECT * from enquiry";
            $query = $dbh->prepare($sql);
            $query->execute();
            $row=$query->rowCount();
            if($row>=0)
            {
               $row += 1;
               $id="ENQ_".$row.$randid;
            }
            $nm=$_POST['name'];
            $em=$_POST['email'];
            $ms=$_POST['message'];
            $sb=$_POST['subject'];
            $sql="INSERT into enquiry(enquiryid,enquiryname,enquiryemail,enquirysubject,enquirymessage) VALUES(:id,:nm,:em,:sb,:ms)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':id',$id,PDO::PARAM_STR);     
            $query->bindParam(':nm',$nm,PDO::PARAM_STR);
            $query->bindParam(':em',$em,PDO::PARAM_STR);  
            $query->bindParam(':ms',$ms,PDO::PARAM_STR);   
            $query->bindParam(':sb',$sb,PDO::PARAM_STR);
            if($query->execute())
            {
               $to = $em;
	            $subject = "Congratulations! Message has been received successfully!";
               $from = 'banerjeekaushik1994@gmail.com';
	         
	            $message = '<html>
							<head>
								<title>Service Request Mail</title>
							</head>
							<body>
								<p>Thank You!'. ' ' .$nm. ' for sending a service request</p>
								<p>Your Request ID is :' .$id. '</p>
								<p>Kindly note this ID for future contacts regarding this request thread.</p>
								<p>Thanking You,</p>
								<p>Kaushik Banerjee</p>
                        <p><a href="mailto:banerjeekaushik1994@gmail.com">banerjeekaushik1994@gmail.com</a></p>
                        <p><a href="#"></a></p>
							</body>
						</html>';
	         
               $headers = 'From: '. $from ."\r\n".'Reply-To: '.$from."\r\n".'X-Mailer: PHP/'.phpversion();
               $headers .= 'Cc: banerjeekaushik1994@gmail.com \r\n';
	            $headers .= 'MIME-Version: 1.0' . "\r\n";
               $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
	         
               $retval = mail($to,$subject,$message,$headers);
                  
               if( $retval == true ) 
               {
                  $to = 'banerjeekaushik1994@gmail.com';
                  $subject = "Message has been received from ".$nm;
                  $from = $em;
               
                  $message = '<html>
                        <head>
                           <title>Service Request Mail</title>
                        </head>
                        <body>
                           <p>Service request sent by '. ' ' .$nm. '</p>
                           <p>Request ID is :' .$id. '</p>
                           <p>'.$ms.'</p>
                           <p>'.$nm.' mail id - <a href="mailto:'.$em.'">'.$em.'</a></p>
                        </body>
                     </html>';
               
                  $headers = 'From: '. $from ."\r\n".'Reply-To: '.$from."\r\n".'X-Mailer: PHP/'.phpversion();
                  $headers .= 'MIME-Version: 1.0' . "\r\n";
                  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
               
                  $retval = mail($to,$subject,$message,$headers);
                  if( $retval == true ) 
                  {
                     $_SESSION['msg']="Message sent successfully!!";
                  }
               }
               else
               {
                  $_SESSION['msg']="Message could not be sent!!";
               }         
            }
            else
            {
               echo "<script>alert('Records could not be added');</script>";
            }
         }   
?>

<!-- Pre Load Starts -->
<div id="pre-load">
   <div class="load-circle"></div>
</div>
<!-- Pre Load Ends -->
<!-- Wrapper Starts -->
<div id="wrapper">
   <div class="container-fluid">
      <div class="row no-gutters v-full">
         <!-- Left Wrapper Starts -->
         <div id="left-wrapper" class="col-12 col-lg-8">
            <!-- Main Content (Home) Starts -->
            <div id="home" class="main-content w3-2020-vanilla-custard">
               <!-- Content Hanging On Home Section Starts -->
               <div class="hanging">
                  <div class="logo-hanging">
                     <i class="fas fa-globe"></i>
                  </div>
                  <div class="text-hanging">
                     <div class="word">
                        <h6><span class="helloworld"></span></h6>
                     </div>
                  </div>
               </div>
               <!-- Content Hanging On Home Section Ends -->
               <!-- Inner Content Starts -->
               <div class="inner-content">
                  <!-- Head Content Starts -->
                  <div class="head-content">
                     <h3>I'M <span class="name">Kaushik Banerjee</span></h3>
                     <h5>As a <span class="passion"></span></h5>
                  </div>
                  <!-- Head Content Ends -->
                  <!-- Content Starts -->
                  <div class="content">
                     <!-- About Menu Starts -->
                     <div id="about-menu" class="box-wrapper">
                        <div class="inner-box-wrapper">
                           <a href="#about" class="menu-link">
                              <div class="valign-center">
                                 <i class="fas fa-id-card fa-3x"></i>
                                 <h5>About <span>Me</span></h5>
                              </div>
                           </a>
                        </div>
                     </div>
                     <!-- About Menu Ends -->
                     <!-- Resume Menu Starts -->
                     <div id="resume-menu" class="box-wrapper">
                        <div class="inner-box-wrapper">
                           <a href="#resume" class="menu-link">
                              <div class="valign-center">
                                 <i class="fas fa-newspaper fa-3x"></i>
                                 <h5>My <span>Resume</span></h5>
                              </div>
                           </a>
                        </div>
                     </div>
                     <!-- Resume Menu Ends -->
                     <!-- Portfolio Menu Starts -->
                     <div id="portfolio-menu" class="box-wrapper">
                        <div class="inner-box-wrapper">
                           <a href="#portfolio" class="menu-link">
                              <div class="valign-center">
                                 <i class="fas fa-toolbox fa-3x"></i>
                                 <h5>My <span>Portfolio</span></h5>
                              </div>
                           </a>
                        </div>
                     </div>
                     <!-- Portfolio Menu Ends -->
                     <!-- Contact Menu Starts -->
                     <div id="contact-menu" class="box-wrapper">
                        <div class="inner-box-wrapper">
                           <a href="#contact" class="menu-link">
                              <div class="valign-center">
                                 <i class="fas fa-envelope fa-3x"></i>
                                 <h5>Contact <span>Me</span></h5>
                              </div>
                           </a>
                        </div>
                     </div>
                     <!-- Contact Menu Ends -->
                  </div>
                  <!-- Content Ends -->
               </div>
               <!-- Inner Content Ends -->
            </div>
            <!-- Main Content (Home) Ends -->
            
			<?php include("includes/about-me.php");?>

			<?php include("includes/resume.php");?>

			<?php include("includes/portfolio.php");?>
         
			<?php include("includes/contact.php");?>         
            
         </div>
         <!-- Left Wrapper Ends -->
         <!-- Right Wrapper Starts -->
         <div id="right-wrapper" class="col-lg-4">
            <!-- Large Profile Picture Starts -->
            <div class="lg-profile-picture"></div>
            <!-- Large Profile Picture Ends -->
         </div>
         <!-- Right Wrapper Ends -->
      </div>
   </div>
</div>
<!-- Wrapper Ends -->

<?php include("includes/footer.php");?>