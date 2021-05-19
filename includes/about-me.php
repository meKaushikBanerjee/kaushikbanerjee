      <?php 
         $sql="SELECT * from aboutme";
         $query = $dbh->prepare($sql);
         $query->execute();
         $result=$query->fetch();
         if($query->rowCount() > 0)
         {
      ?>
            <!-- Main Content (About) Starts -->
            <div id="about" class="main-content w3-2020-vanilla-custard">
               <!-- Close Button Starts -->
               <a href="#home" class="close-menu-link">
               <i class="close-button fas fa-times-circle fa-2x"></i>
               </a>
               <!-- Close Button Ends -->
               <!-- Content Hanging On About Section Starts -->
               <div class="hanging">
                  <div class="logo-hanging">
                     <i class="fas fa-id-card"></i>
                  </div>
                  <div class="text-hanging">
                     <div class="word">
                        <h6>ABOUT <span>ME</span></h6>
                     </div>
                  </div>
               </div>
               <!-- Content Hanging On About Section Ends -->
               <!-- Inner Content Starts -->
               <div class="inner-content">
                  <!-- Head Content Starts -->
                  <div class="head-content">
                     <h3>About <span>Me</span></h3>
                  </div>
                  <!-- Head Content Ends -->
                  <!-- Content Starts -->
                  <div class="content">
                     <!-- Personal Info Starts -->
                     <div id="personal-info">
                        <!-- Personal Info Heading Starts -->
                        <h5>Personal Info</h5>
                        <!-- Personal Info Heading Ends -->
                        <div class="row no-gutters">
                           <!-- Profile Picture Starts -->
                           <div class="profile-picture col-md-2 col-sm-3 col-12"></div>
                           <!-- Profile Picture Ends -->
                           <!-- Summary Starts -->
                           <div class="summary col-md-10 col-sm-9 col-12">
                              <!-- Single Paragraph Starts -->
                              <p><?php echo $result["details"]; ?></p>
                              <!-- Single Paragraph Ends -->
                           </div>
                           <!-- Summary Ends -->
                           <!-- Single Profile Starts -->
                           <div class="profile col-12 col-sm-6">
                              <ul>
                                 <!-- Single Content On Profile Starts -->
                                 <li>
                                    <span class="label">
                                    <i class="fas fa-angle-double-right"></i><span>First Name</span>
                                    </span>
                                    <span class="dash">-</span>
                                    <span class="value"><?php echo $result["firstname"]; ?></span>
                                 </li>
                                 <!-- Single Content On Profile Ends -->
                                 <!-- Single Content On Profile Starts -->
                                 <li>
                                    <span class="label">
                                    <i class="fas fa-angle-double-right"></i><span>Last Name</span>
                                    </span>
                                    <span class="dash">-</span>
                                    <span class="value"><?php echo $result["lastname"]; ?></span>
                                 </li>
                                 <!-- Single Content On Profile Ends -->
                                 <!-- Single Content On Profile Starts -->
                                 <li>
                                    <span class="label">
                                    <i class="fas fa-angle-double-right"></i><span>Date of Birth</span>
                                    </span>
                                    <span class="dash">-</span>
                                    <span class="value"><?php echo $result["dob"]; ?></span>
                                 </li>
                                 <!-- Single Content On Profile Ends -->
                                 <!-- Single Content On Profile Starts -->
                                 <li>
                                    <span class="label">
                                    <i class="fas fa-angle-double-right"></i><span>Nationality</span>
                                    </span>
                                    <span class="dash">-</span>
                                    <span class="value"><?php echo $result["nationality"]; ?></span>
                                 </li>
                                 <!-- Single Content On Profile Ends -->
                              </ul>
                           </div>
                           <!-- Single Profile Ends -->
                           <!-- Single Profile Starts -->
                           <div class="profile col-12 col-sm-6">
                              <ul>
                                 <!-- Single Content On Profile Starts -->
                                 <li>
                                    <span class="label">
                                    <i class="fas fa-angle-double-right"></i><span>Phone</span>
                                    </span>
                                    <span class="dash">-</span>
                                    <span class="value"><?php echo $result["mobile"]; ?></span>
                                 </li>
                                 <!-- Single Content On Profile Ends -->
                                 <!-- Single Content On Profile Starts -->
                                 <li>
                                    <span class="label">
                                    <i class="fas fa-angle-double-right"></i><span>Email</span>
                                    </span>
                                    <span class="dash">-</span>
                                    <span class="value"><?php echo $result["email"]; ?></span>
                                 </li>
                                 <!-- Single Content On Profile Ends -->
                                 <!-- Single Content On Profile Starts -->
                                 <li>
                                    <span class="label">
                                    <i class="fas fa-angle-double-right"></i><span>Address</span>
                                    </span>
                                    <span class="dash">-</span>
                                    <span class="value"><?php echo $result["address"]; ?></span>
                                 </li>
                                 <!-- Single Content On Profile Ends -->
                                 <!-- Single Content On Profile Starts -->
                                 <li>
                                    <span class="label">
                                    <i class="fas fa-angle-double-right"></i><span>Languages</span>
                                    </span>
                                    <span class="dash">-</span>
                                    <span class="value"><?php echo $result["language"]; ?></span>
                                 </li>
                                 <!-- Single Content On Profile Ends -->
                              </ul>
                           </div>
                           <!-- Single Profile Ends -->
                           <!-- Social Media Starts -->
                           <div class="social-media col-12">
                              <ul>
                                 <!-- Single Social Media Starts -->
                                 <li>
                                    <a href="https://github.com/meKaushikBanerjee">
                                    <span class="front">
                                    <i class="fab fa-github"></i>
                                    </span>
                                    <span class="back">
                                    <i class="fab fa-github"></i>
                                    </span>
                                    </a>
                                 </li>
                                 <!-- Single Social Media Ends -->
                                 <!-- Single Social Media Starts -->
                                 <li>
                                    <a href="https://www.linkedin.com/in/mekaushikbanerjee/">
                                    <span class="front">
                                    <i class="fab fa-linkedin-in"></i>
                                    </span>
                                    <span class="back">
                                    <i class="fab fa-linkedin-in"></i>
                                    </span>
                                    </a>
                                 </li>
                                 <!-- Single Social Media Ends -->
                              </ul>
                           </div>
                           <!-- Social Media Ends -->
                           <!-- Button Wrapper Starts -->
                           <div class="button-wrapper col-12">
                              <!-- Single Button Starts -->
                              <div class="single-button">
                                 <a href="#">
                                 <span class="front">
                                 <i class="fas fa-file-pdf"></i><span class="value">Download <span>CV</span></span>
                                 </span>
                                 <span class="back">
                                 <i class="fas fa-file-pdf"></i><span class="value">Download <span>CV</span></span>
                                 </span>
                                 </a>
                              </div>
                              <!-- Single Button Ends -->
                              <!-- Single Button Starts -->
                              <div class="single-button" id="contact-me">
                                 <a href="#contact" id="contact-button">
                                 <span class="front">
                                 <i class="fas fa-envelope"></i><span class="value">Contact <span>Me</span></span>
                                 </span>
                                 <span class="back">
                                 <i class="fas fa-envelope"></i><span class="value">Contact <span>Me</span></span>
                                 </span>
                                 </a>
                              </div>
                              <!-- Single Button Ends -->
                           </div>
                           <!-- Button Wrapper Ends -->
                        </div>
                     </div>
                     <!-- Personal Info Ends -->

                     <!-- Services Starts -->
                     <div id="services">
                        <!-- Services Heading Starts -->
                        <h5>Services</h5>
                        <!-- Services Heading Ends -->
                        <div class="row no-gutters">

      <?php   
         }

         $sql="SELECT * from services";
         $query = $dbh->prepare($sql);
         $query->execute();
         $results=$query->fetchAll(PDO::FETCH_OBJ);
         if($query->rowCount() > 0)
         {
            foreach($results as $result)
            {
      ?>                   <!-- Single Service Starts -->
                           <div class="single-service col-sm-6 col-12">
                              <ul>
                                 <li>
                                    <ul>
                                       <li class="service-name">
                                          <i class="fas fa-angle-double-right"></i><span><?php echo $result->servicename; ?></span>
                                       </li>
                                       <li class="service-body"><?php echo $result->servicedetails; ?></li>
                                    </ul>
                                 </li>
                              </ul>
                           </div

      <?php
            }
         }
      ?>
      >
                        </div>
                     </div>
                     <!-- Services Ends -->
                  </div>
                  <!-- Content Ends -->
               </div>
               <!-- Inner Content Ends -->
            </div>
            <!-- Main Content (About) Ends -->