            <!-- Main Content (Portfolio) Starts -->
            <div id="portfolio" class="main-content w3-2020-vanilla-custard">
               <!-- Close Button Starts -->
               <a href="#home" class="close-menu-link">
               <i class="close-button fas fa-times-circle fa-2x"></i>
               </a>
               <!-- Close Button Ends -->
               <!-- Content Hanging On Portfolio Section Starts -->
               <div class="hanging">
                  <div class="logo-hanging">
                     <i class="fas fa-toolbox"></i>
                  </div>
                  <div class="text-hanging">
                     <div class="word">
                        <h6>MY <span>PORTFOLIO</span></h6>
                     </div>
                  </div>
               </div>
               <!-- Content Hanging On Portfolio Section Ends -->
               <!-- Inner Content Starts -->
               <div class="inner-content">
                  <!-- Head Content Starts -->
                  <div class="head-content">
                     <h3>My <span>Portfolio</span></h3>
                  </div>
                  <!-- Head Content Ends -->
                  <!-- Content Starts -->
                  <div class="content">
                     <!-- Projects Starts -->
                     <div id="projects">
                        <!-- Projects Heading Starts -->
                        <h5>Projects</h5>
                        <!-- Projects Heading Ends -->
                        <div class="row no-gutters">
                           <!-- Portfolio Filter Starts -->
                           <div class="portfolio-filter col-12">
                              <ul>
                                 <!-- Single Filter Starts -->
                                 <li>
                                    <a href="#" data-filter="*" class="current">All Elements</a>
                                 </li>
                                 <!-- Single Filter Ends -->
                                 <!-- Single Filter Starts -->
                                 <li>
                                    <a href="#" data-filter=".web-template">Web Templates</a>
                                 </li>
                                 <!-- Single Filter Ends -->
                                 <!-- Single Filter Starts -->
                                 <li>
                                    <a href="#" data-filter=".web-application">Web Applications</a>
                                 </li>
                                 <!-- Single Filter Ends -->
                                 <!-- Single Filter Starts -->
                                 <li>
                                    <a href="#" data-filter=".ui-element">UI Elements</a>
                                 </li>
                                 <!-- Single Filter Ends -->
                              </ul>
                           </div>
                           <!-- Portfolio Filter Ends -->
                           <!-- Portfolio Item Starts -->
                           <div class="portfolio-item col-12">
                              <div class="item-wrapper row">

                        <?php   
                           $sql="SELECT * from works";
                           $query = $dbh->prepare($sql);
                           $query->execute();
                           $results=$query->fetchAll(PDO::FETCH_OBJ);
                           if($query->rowCount() > 0)
                           {
                              foreach($results as $result)
                              {
                                 $cat = strtolower($result->categoryname);
                                 $arr = explode(" ",$cat);
                                 $cat = implode("-",$arr);
                                 $head = strtolower($result->heading);
                                 $arr = explode(" ",$head);
                                 $head = implode("-",$arr);
                        ?>      
                                 <!-- Single Item Starts -->
                                 <div class="item <?php echo $cat; ?> col-md-4 col-sm-6 col-12">
                                    <!-- Image Starts -->
                                    <div class="image">
                                       <img src="admin/<?php echo $result->thumbnailimage; ?>". alt="<?php echo $result->heading; ?>">
                                    </div>
                                    <!-- Image Ends -->
                                    <!-- Overlay Starts -->
                                    <div class="overlay">
                                       <!-- View More (Button) Starts -->
                                       <a class="view-more" href="#<?php echo $head; ?>">
                                       <span class="front">
                                       <i class="far fa-eye"></i><span class="value">View <span>More</span></span>
                                       </span>
                                       <span class="back">
                                       <i class="far fa-eye"></i><span class="value">View <span>More</span></span>
                                       </span>
                                       </a>
                                       <!-- View More (Button) Ends -->
                                       <!-- Image Info Starts -->
                                       <div class="image-info">
                                          <!-- Project Name Starts -->
                                          <span class="project-name"><?php echo $result->heading; ?></span>
                                          <!-- Project Name Ends -->
                                          <!-- Project Tags Starts -->
                                          <span class="project-tags">
                                             <!-- Tag Icon Starts -->
                                             <span class="tag-icon">
                                             <i class="fas fa-tags"></i>
                                             </span>
                                             <!-- Tag Icon Ends -->
                                             <!-- Tag Label Starts -->
                                             <span class="tag-label"><?php echo $result->categoryname; ?></span>
                                             <!-- Tag Label Ends -->
                                          </span>
                                          <!-- Project Tags Ends -->
                                       </div>
                                       <!-- Image Info Ends -->
                                    </div>
                                    <!-- Overlay Ends -->
                                    <!-- Project Popup Starts -->
                                    <div id="<?php echo $head; ?>" class="project-popup mfp-hide">
                                       <!-- Project Picture On Popup Starts -->
                                       <img class="project-picture" src="admin/<?php echo $result->thumbnailimage; ?>" alt="<?php echo $result->heading; ?>">
                                       <!-- Project Picture On Popup Ends -->
                                       <!-- Project Name Starts -->
                                       <h5 class="project-name"><?php echo $result->heading; ?></h5>
                                       <!-- Project Name Ends -->
                                       <!-- Project Info Starts -->
                                       <div class="project-info">
                                          <!-- List Info Project Starts -->
                                          <ul class="list-info-project">
                                             <!-- Single List Starts -->
                                             <li>
                                                <span class="label">Categories</span>
                                                <span class="separator">:</span>
                                                <span class="value"><?php echo $result->categoryname; ?></span>
                                             </li>
                                             <!-- Single List Ends -->
                                          </ul>
                                          <!-- List Info Project Ends -->
                                          <!-- Project Description Starts -->
                                          <div class="project-description">
                                             <!-- Single Paragraph Starts -->
                                             <p><?php echo $result->details; ?></p>
                                             <!-- Single Paragraph -->
                                          </div>
                                          <!-- Project Description Ends -->
                                       </div>
                                       <!-- Project Info Ends -->
                                       <!-- Project Source Button Starts -->
                                       <a class="project-source" href="<?php echo $result->github; ?>" target="_blank">
                                       <span class="front">
                                       <i class="fas fa-github"></i>
                                       <span class="value">Visit <span>Github</span></span>
                                       </span>
                                       <span class="back">
                                       <i class="fas fa-long-arrow-alt-right"></i>
                                       <span class="value">Visit <span>Github</span></span>
                                       </span>
                                       </a>
                                       <!-- Project Source Button Ends -->
                                       <!-- Project Source Button Starts -->
                                       <a class="project-source" href="<?php echo $result->demo; ?>" target="_blank">
                                       <span class="front">
                                       <i class="fas fa-website"></i>
                                       <span class="value">Visit <span>Live Demo</span></span>
                                       </span>
                                       <span class="back">
                                       <i class="fas fa-long-arrow-alt-right"></i>
                                       <span class="value">Visit <span>Live Demo</span></span>
                                       </span>
                                       </a>
                                       <!-- Project Source Button Ends -->
                                    </div>
                                    <!-- Project Popup Ends -->
                                 </div>
                                 <!-- Single Item Ends -->
                        <?php
                              }
                           }
                        ?>

                              </div>
                           </div>
                           <!-- Portfolio Item Ends -->
                        </div>
                     </div>
                     <!-- Projects Ends -->
                  </div>
                  <!-- Content Ends -->
               </div>
               <!-- Inner Content Ends -->
            </div>
            <!-- Main Content (Portfolio) Ends -->