      <?php          
         $sql="SELECT * from aboutme";
         $query = $dbh->prepare($sql);
         $query->execute();
         $result=$query->fetch();
         if($query->rowCount() > 0)
         {
      ?>      
            
            <!-- Main Content (Contact) Starts -->
            <div id="contact" class="main-content w3-2020-vanilla-custard">
               <!-- Close Button Starts -->
               <a href="#home" class="close-menu-link">
               <i class="close-button fas fa-times-circle fa-2x"></i>
               </a>
               <!-- Close Button Ends -->
               <!-- Content Hanging On Contact Section Starts -->
               <div class="hanging">
                  <div class="logo-hanging">
                     <i class="fas fa-envelope"></i>
                  </div>
                  <div class="text-hanging">
                     <div class="word">
                        <h6>CONTACT <span>ME</span></h6>
                     </div>
                  </div>
               </div>
               <?php 
                  if($_SESSION['msg']!="")
                  { 
               ?>
                     <div class="alert alert-error" style="color: #00ff99;">
                        <button type="button" class="close" data-dismiss="alert" style="color: #00ff99;border:none;">×</button>
                           <?php echo htmlentities($_SESSION['msg']); ?>
                           <?php echo htmlentities($_SESSION['msg']=""); ?>
                        </div>
               <?php 
                  }
               ?>
               <!-- Content Hanging On Contact Section Ends -->
               <!-- Inner Content Starts -->
               <div class="inner-content">
                  <!-- Head Content Starts -->
                  <div class="head-content">
                     <h3>Contact <span>Me</span></h3>
                  </div>
                  <!-- Head Content Ends -->
                  <!-- Content Starts -->
                  <div class="content">
                     <!-- Contact Info Starts -->
                     <div id="contact-info">
                        <!-- Contact Info Heading Starts -->
                        <h5>Contact Info</h5>
                        <!-- Contact Info Heading Ends -->
                        <div class="row no-gutters">
                           <!-- List Contact Info Starts -->
                           <div class="list-contact-info col-12">
                              <ul class="row no-gutters">
                                 <!-- Single Contact Info Starts -->
                                 <li class="col-sm-6 col-12">
                                    <span class="contact-info-name">Address</span>
                                    <span class="icon-of-value">
                                    <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                    <span class="value"><?php echo $result["address"]; ?></span>
                                 </li>
                                 <!-- Single Contact Info Ends -->
                                 <!-- Single Contact Info Starts -->
                                 <li class="col-sm-6 col-12">
                                    <span class="contact-info-name">Phone</span>
                                    <span class="icon-of-value">
                                    <i class="fas fa-mobile-alt"></i>
                                    </span>
                                    <span class="value"><?php echo $result["mobile"]; ?></span>
                                 </li>
                                 <!-- Single Contact Info Ends -->
                                 <!-- Single Contact Info Starts -->
                                 <li class="col-sm-6 col-12">
                                    <span class="contact-info-name">Email</span>
                                    <span class="icon-of-value">
                                    <i class="fas fa-envelope"></i>
                                    </span>
                                    <span class="value"><?php echo $result["email"]; ?></span>
                                 </li>
                                 <!-- Single Contact Info Ends -->
                                 <!-- Single Contact Info Starts -->
                                 <li class="col-sm-6 col-12">
                                    <span class="contact-info-name">Website</span>
                                    <span class="icon-of-value">
                                    <i class="fas fa-globe"></i>
                                    </span>
                                    <span class="value">www.yourwebsite.com</span>
                                 </li>
                                 <!-- Single Contact Info Ends -->
                                 <!-- Single Contact Info Starts -->
                                 <li class="col-12">
                                    <span class="contact-info-name">Social Media</span>
                                    <ul class="social-media">
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
                                 </li>
                                 <!-- Single Contact Info Ends -->
                              </ul>
                           </div>
                           <!-- List Contact Info Ends -->
                        </div>
                     </div>
                     <!-- Contact Info Ends -->
      <?php      
         }
      ?>
                     <!-- Contact Form Starts -->
                     <div id="contact-form">
                        <!-- Contact Form Heading Starts -->
                        <h5>Contact Form</h5>
                        <!-- Contact Form Heading Ends -->                        
                        <div class="row no-gutters">
                           <!-- Note Starts -->
                           <div class="note col-lg-9 col-md-9 col-12">
                              <!-- Single Paragraph Starts -->
                              <p>Want to chat? Send me a message!</p>
                              <!-- Single Paragraph Ends -->
                           </div>
                           <!-- Note Ends -->
                           <!-- Alert/Contact Message Starts -->
                           <div class="alert contact-msg col-lg-9 col-md-9 col-12"></div>
                           <!-- Alert/Contact Message Ends -->
                           <!-- Form Wrapper Starts -->
                           <div class="form-wrapper col-lg-9 col-md-9 col-12">
                              <form method="POST" enctype="multipart/form-data">
                                 <div class="form-group clearfix">
                                    <div class="inner-form-group">
                                       <input type="text" name="name" placeholder="Name" class="form-control" autocomplete="off" required>
                                    </div>
                                    <div class="inner-form-group">
                                       <input type="email" name="email" placeholder="Email" class="form-control" autocomplete="off" required>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <input type="text" name="subject" placeholder="Subject" class="form-control" autocomplete="off" required>
                                 </div>
                                 <div class="form-group">
                                    <textarea name="message" placeholder="Message" class="form-control" autocomplete="off" required></textarea>
                                 </div>
                                 <div class="form-group">
                                    <button type="submit" name="submit">
                                    <span class="front">
                                    <i class="fas fa-paper-plane"></i>
                                    <span class="value">Send <span>Message</span></span>
                                    </span>
                                    <span class="back">
                                    <i class="fas fa-paper-plane"></i>
                                    <span class="value">Send <span>Message</span></span>
                                    </span>
                                    </button>
                                 </div>
                              </form>
                           </div>
                           <!-- Form Wrapper Ends -->
                        </div>
                     </div>
                     <!-- Contact Form Ends -->
                  </div>
                  <!-- Content Ends -->
               </div>
               <!-- Inner Content Ends -->
            </div>
            <!-- Main Content (Contact) Ends -->