            <!-- Main Content (Resume) Starts -->
            <div id="resume" class="main-content w3-2020-vanilla-custard">
               <!-- Close Button Starts -->
               <a href="#home" class="close-menu-link">
               <i class="fas fa-times-circle fa-2x"></i>
               </a>
               <!-- Close Button Ends -->
               <!-- Content Hanging On Resume Section Starts -->
               <div class="hanging">
                  <div class="logo-hanging">
                     <i class="fas fa-newspaper"></i>
                  </div>
                  <div class="text-hanging">
                     <div class="word">
                        <h6>MY <span>RESUME</span></h6>
                     </div>
                  </div>
               </div>
               <!-- Content Hanging On Resume Section Ends -->
               <!-- Inner Content Starts -->
               <div class="inner-content">
                  <!-- Head Content Starts -->
                  <div class="head-content">
                     <h3>My <span>Resume</span></h3>
                  </div>
                  <!-- Head Content Ends -->
                  <!-- Content Starts -->
                  <div class="content">
                     <!-- Skills Starts -->
                     <div class="skills">
                        <!-- Skills Heading Starts -->
                        <h5>Skills</h5>
                        <!-- Skills Heading Ends -->
                        <div class="row no-gutters">
                           <!-- Single Skills Wrapper Starts -->
                           <div class="single-skills-wrapper col-12 col-sm-6">
                              <ul>
                                 <!-- Skills Heading Starts -->
                                 <li class="skills-heading">
                                    <span class="second-word">Soft</span>
                                    <span class="second-word">Skills</span>
                                 </li>
                                 <!-- Skills Heading Ends -->                                 
                                 <li>
                                    <ul>

                        <?php 
                           $sql="SELECT * from softskills";
                           $query = $dbh->prepare($sql);
                           $query->execute();
                           $results=$query->fetchAll(PDO::FETCH_OBJ);
                           if($query->rowCount() > 0)
                           {
                              foreach($results as $result)
                              {
                        ?>             <!-- Single Skill Starts -->
                                       <li class="single-skill">
                                          <ul>
                                             <li class="skill-name">
                                                <i class="fas fa-angle-double-right"></i><span><?php echo $result->codeskillname; ?></span>
                                             </li>
                                             <!-- Range Of Percentage 0% - 100% -->
                                             <li class="percentage"><?php echo $result->codeskillvalue; ?>%</li>
                                             <li class="progress-wrapper">
                                                <span class="progress"></span>
                                             </li>
                                          </ul>
                                       </li>
                                       <!-- Single Skill Ends -->
                        <?php
                              }
                           }
                        ?>

                                    </ul>
                                 </li>
                              </ul>
                           </div>
                           <!-- Single Skills Wrapper Ends -->
                           <!-- Single Skills Wrapper Starts -->
                           <div class="single-skills-wrapper col-12 col-sm-6">
                              <ul>
                                 <!-- Skills Heading Starts -->
                                 <li class="skills-heading">
                                    <span class="second-word">Technical</span>
                                    <span class="second-word">Skills</span>
                                 </li>
                                 <!-- Skills Heading Ends -->
                                 <li>
                                    <ul>
                              <?php 
                                 $sql="SELECT * from skills";
                                 $query = $dbh->prepare($sql);
                                 $query->execute();
                                 $results=$query->fetchAll(PDO::FETCH_OBJ);
                                 if($query->rowCount() > 0)
                                 {
                                    foreach($results as $result)
                                    {
                              ?>


                                       <!-- Single Skill Starts -->
                                       <li class="single-skill">
                                          <ul>
                                             <li class="skill-name">
                                                <i class="fas fa-angle-double-right"></i><span><?php echo $result->codeskillname; ?></span>
                                             </li>
                                             <!-- Range Of Percentage 0% - 100% -->
                                             <li class="percentage"><?php echo $result->codeskillvalue; ?>%</li>
                                             <li class="progress-wrapper">
                                                <span class="progress"></span>
                                             </li>
                                          </ul>
                                       </li>
                                       <!-- Single Skill Ends -->
                              <?php
                                    }
                                 }
                              ?>

                                    </ul>
                                 </li>
                              </ul>
                           </div>
                           <!-- Single Skills Wrapper Ends -->
                        </div>
                     </div>
                     <!-- Skills Ends -->
                     <!-- Education Starts -->
                     <div class="education">
                        <!-- Education Heading Starts -->
                        <h5>Education</h5>
                        <!-- Education Heading Ends -->
                        <div class="row no-gutters">

                  <?php 
                     $sql="SELECT * from education";
                     $query = $dbh->prepare($sql);
                     $query->execute();
                     $results=$query->fetchAll(PDO::FETCH_OBJ);
                     if($query->rowCount() > 0)
                     {
                        foreach($results as $result)
                        {
                  ?>
                           <!-- Single Education Starts -->
                           <div class="single-education col-sm-6 col-12">
                              <ul>
                                 <li class="education-when-where">
                                    <span class="when"><?php echo $result->edudegree; ?></span>
                                 </li>
                                 <li>
                                    <ul>
                                       <li class="education-name">
                                          <i class="fas fa-angle-double-right"></i><span class="where"><?php echo $result->educollege; ?></span><br>
                                          <i class="fas fa-angle-double-right"></i><span class="where"><?php echo $result->educourse; ?></span><br>
                                          <i class="fas fa-angle-double-right"></i><span class="where"><?php echo $result->edufrom; ?> - <?php echo $result->eduto; ?></span>
                                       </li>
                                    </ul>
                                 </li>
                              </ul>
                           </div>
                           <!-- Single Education Ends -->
                  <?php
                        }
                     }
                  ?>

                        </div>
                     </div>
                     <!-- Education Ends -->
                     <!-- Experience Starts -->
                     <div class="experience">
                        <!-- Experience Heading Starts -->
                        <h5>Experience</h5>
                        <!-- Experience Heading Ends -->
                        <div class="row no-gutters">

                  <?php 
                     $sql="SELECT * from experience";
                     $query = $dbh->prepare($sql);
                     $query->execute();
                     $results=$query->fetchAll(PDO::FETCH_OBJ);
                     if($query->rowCount() > 0)
                     {
                        foreach($results as $result)
                        {
                  ?>

                           <!-- Single Experience Starts -->
                           <div class="single-experience col-sm-12 col-12">
                              <ul>
                                 <li class="experience-when-where">
                                    <span class="where"><?php echo $result->expcompany; ?></span><br>
                                    <span class="when"><?php echo $result->expfrom; ?> - <?php echo $result->expto; ?></span>
                                 </li>
                                 <li>
                                    <ul>
                                       <li class="experience-name">
                                          <i class="fas fa-angle-double-right"></i><span><?php echo $result->exppost; ?></span>
                                       </li>
                                       <li><?php echo $result->exprole; ?></li>
                                    </ul>
                                 </li>
                              </ul>
                           </div>
                           <!-- Single Experience Ends -->
                  <?php    
                        }
                     }
                  ?>
                           
                        </div>
                     </div>
                     <!-- Experience Ends -->
                     <!-- Button Wrapper Starts -->
                     <div class="button-wrapper">
                        <!-- Single Button Starts -->
                        <a href="#">
                        <span class="front">
                        <i class="fas fa-file-pdf"></i><span class="value">Download <span>Resume</span></span>
                        </span>
                        <span class="back">
                        <i class="fas fa-file-pdf"></i><span class="value">Download <span>Resume</span></span>
                        </span>
                        </a>
                        <!-- Single Button Ends -->
                     </div>
                     <!-- Button Wrapper Ends -->
                  </div>
                  <!-- Content Ends -->
               </div>
               <!-- Inner Content Ends -->
            </div>
            <!-- Main Content (Resume) Ends -->