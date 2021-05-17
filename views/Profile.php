<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header brdcum">
      <h1 >
      Profile & Company Details
      <ol class="breadcrumb pts16 ">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Profile & Company Details</li>
      </ol>
      </h1>
    </section>

      <?php $row= mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM users WHERE email ='".$_SESSION['email']."' ")); ?>



    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="assest/dist/img/user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center">Mayank</h3>

              <p class="text-muted text-center">Ebilling Software</p>
<!-- 
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-sitemap margin-r-5"></i> Organization</strong>

              <p class="text-muted">Private Sector</p>

              <hr>

              <strong><i class="fa fa-building-o margin-r-5"></i> Type of Business</strong>

              <p class="text-muted">Fund Administration</p>

            

              <hr>

              <!-- <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->


        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">User Profile</a></li>
              <li><a href="#timeline" data-toggle="tab">Company Profile</a></li>
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <form role="form">
                    <div class=" row box-body ">
                    <div class="form-group col-lg-4">
                          <label class="fontsizunst" >Upload Image</label>
                          <input type="file" class="form-control" >
                      </div>
                      <!-- <div class="form-group col-lg-4">
                          <label class="fontsizunst" >Title</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-text-height"></i>
                                </div>
                                <select class="form-control select2" style="width: 100%;">
                                   
                                    <option>Mr.</option>
                                    <option>Ms.</option>
                                    <option>Mrs.</option>
                                    <option>Dr.</option>
                                    <option>Prof.</option>
                                  
                                </select>
                              </div>
                      </div> -->
                      <div class="form-group col-lg-4">
                          <label class="fontsizunst" >Name</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user-circle-o"></i>
                                </div>
                              <input type="text" class="form-control" value="<?php echo $row['name'];?>"  placeholder="Enter Name">
                            </div>
                      </div>

                      <div class="form-group col-lg-4">
                          <label class="fontsizunst">Professional Email</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <input type="text" class="form-control" value="<?php echo $row['professional_email']?>" placeholder="Enter Email">
                            </div>    
                      </div>

                      <div class="form-group col-lg-4">
                          <label class="fontsizunst" >Company Website</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                <input type="text" class="form-control" value="<?php echo $row['company_website']?>"  placeholder="Enter Date of Birth" id="datepicker">
                            </div>  
                      </div>
                      <div class="form-group col-lg-4">
                          <label class="fontsizunst" >Mobile No</label>
                          <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-mobile"></i>
                                </div>
                                <input type="text" class="form-control" value="<?php echo $row['company_website']?>" placeholder="Enter Mobile Number">
                            </div>
                      </div>
                      <!-- <div class="form-group col-lg-4">
                          <label class="fontsizunst" >Country</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <input type="text" class="form-control"  placeholder="Enter Country">
                            </div> 
                      </div> -->
                      
                      <div class="form-group col-lg-4">
                          <label class="fontsizunst" >GSTIN Number</label>
                          <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-file-archive-o"></i>
                                </div>
                                <input type="text" class="form-control"  placeholder="Enter Pin Code">
                            </div>
                      </div><div class="form-group col-lg-4">
                          <label class="fontsizunst" >Pan Number</label>
                          <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-file-archive-o"></i>
                                </div>
                                <input type="text" class="form-control"  placeholder="Enter Pin Code">
                            </div>
                      </div>
                      <div class="form-group col-lg-4">
                          <label class="fontsizunst" >State</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-scribd"></i>
                                </div>
                                <input type="text" class="form-control"  placeholder="Enter State">
                            </div> 
                      </div>
                      <div class="form-group col-lg-4">
                          <label class="fontsizunst" >Pin Code</label>
                          <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-file-archive-o"></i>
                                </div>
                                <input type="text" class="form-control"  placeholder="Enter Pin Code">
                            </div>
                      </div>
                        <div class="form-group col-lg-4">
                          <label class="fontsizunst" >Type of Business</label>
                          <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                </div>
                                <input type="text" class="form-control"  placeholder="Enter Type of Business">
                            </div>
                      </div>
                      <div class="form-group col-lg-8">
                          <label class="fontsizunst" >Address</label>
                          <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <textarea class="form-control" rows="2" placeholder="Enter Full Address"></textarea>
                                <!-- <input type="text" class="form-control"  placeholder="Enter Address"> -->
                            </div>
                      </div>
                      
                    

                      
                      
                     

                      <div class="form-group col-lg-12">
                          <button type="button" class="btn btn-primary pull-right"><i class="fa fa-pencil-square"></i> Update</button>
                          
                      </div>
                      
                  </div>
                </form>
               
               
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
              
                <ul class="timeline timeline-inverse">
                 
                  <li class="time-label">
                        <span class="bg-red">
                          1 Jan. 2021
                        </span>
                  </li>
                 
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> Company Name:</span>
                      <h3 class="timeline-header"><a href="#">Mayank Hardware & Sanitory Store</a></h3>
                    </div>
                  </li>
                 
                  <li>
                    <i class="fa fa-globe bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i>Country , City, State </span>
                      <h3 class="timeline-header no-border"><a href="#">India</a> Dehradun, Uttarakhand
                      </h3>
                    </div>
                  </li>
                 
                  <li>
                    <i class="fa fa-map-marker bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> Address</span>
                      <h3 class="timeline-header"><a href="#">105 Shergarh Road Resham Majari,Near Durga Mandir</a></h3>
                    </div>
                  </li>

                  <li>
                    <i class="fa fa-phone-square bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> Company phone</span>
                      <h3 class="timeline-header"><a href="#">+91 9634620829</a></h3>
                    </div>
                  </li>

                  <li>
                    <i class="fa fa-envelope bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> Comapany Email </span>
                      <h3 class="timeline-header"><a href="#">mayankkumar0700@gmail.com</a></h3>
                    </div>
                  </li>
                  <li>
                    <i class="fa fa-envelope bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> Comapany Website </span>
                      <h3 class="timeline-header"><a href="#">https://MomentumCoreTech.com/</a></h3>
                    </div>
                  </li>

                  <li>
                    <i class="fa fa-globe bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i>GSTIN </span>
                      <h3 class="timeline-header"><a href="#">05AUPPK8838F1Z7</a></h3>
                    </div>
                  </li>
                  <li>
                    <i class="fa fa-pinterest-p"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> Pan Card No</span>
                      <h3 class="timeline-header"><a href="#">53413413</a></h3>
                    </div>
                  </li>

                  <li>
                    <i class="fa fa-audio-description bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i>Additional Details</span>
                      <h3 class="timeline-header"><a href="#">Test</a></h3>
                    </div>
                  </li>
                 



                  <li>
                    <i class="fa fa-file-archive-o bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> Zip</span>
                      <h3 class="timeline-header"><a href="#">248140</a></h3>
                    </div>
                  </li>

                  <li>
                    <i class="fa fa-inr bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i>Currency</span>
                      <h3 class="timeline-header"><a href="#">4567</a></h3>
                    </div>
                  </li>

                 
                 
                  
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
            


              <div class="tab-pane" id="settings">
                <form role="form">
                    <div class=" row box-body ">
                  
                        <div class="form-group col-lg-12">
                            <label class="fontsizunst" >Email</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-envelope"></i>
                                  </div>
                                  <input type="text" class="form-control" disabled="" placeholder="Enter Email">
                              </div>    
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="fontsizunst" >Password</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-key"></i>
                                  </div>
                                  <input type="password" class="form-control" placeholder="Enter Password">
                              </div>    
                        </div>

                        <div class="form-group col-lg-12">
                            <label class="fontsizunst" >Confirm Password</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-key"></i>
                                  </div>
                                  <input type="password" class="form-control" placeholder="Enter Confirm Password">
                              </div>    
                        </div>

                        <div class="form-group col-lg-12">
                            <button type="button" class="btn btn-primary pull-right"><i class="fa fa-pencil-square"></i> Update</button>
                        </div>
                        
                    </div>
                  </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>