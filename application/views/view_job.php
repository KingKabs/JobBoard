<main id="main">


    <!--==========================
      More Features Section
    ============================-->
    <section id="more-features" class="section-bg" style="margin-top: 50px;">
        <div class="container-fluid">

            <div class="section-header">
                <h3 class="section-title">Jobs</h3>
                <span class="section-divider"></span>
                <p class="section-description">Available jobs for you to apply. Browse through our job listings and click apply to submit your application.</p>
            </div>

            <div class="row">
                <?php foreach ($alljobs as $job) : ?>
                    <div class="col-lg-12" >
                        <div class="box wow fadeInLeft"style="padding: 20px;">                        
                            <h4 class="title" style="margin-left: 0px;"><a href=""><?php echo $job->job_title; ?></a></h4>
                            <p class="description" style="margin-left: 0px;"><?php echo $job->job_summary; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>                
            </div>

            <div class="row">

                <div class="col-lg-6" >
                    <h3>Required Interviews/Tests</h3>
                    <h6>Total Tests Duration: <?php echo $jobTestsTotalDuration; ?> minute(s)</h6>
                    <div class="box wow fadeInLeft"style="padding: 20px;">
                        <?php foreach ($jobtests as $test) : ?>
                            <h4 class="title" style="margin-left: 0px;"><a href=""><?php echo $test->test_name; ?></a></h4>
                            <p class="description" style="margin-left: 0px;"><?php echo $test->test_description; ?></p>
                            <p class="description" style="margin-left: 0px;">Duration: <span id="testDuration"><?php echo $test->test_duration; ?></span> minute(s)</p>
                            <hr/>
                        <?php endforeach; ?>
                    </div>

                    <div class="box wow fadeInLeft"style="padding: 20px;">
                        <h5 style="font-weight: bold;">Instructions</h5>
                        <?php echo $alljobs[0]->instructions; ?>
                    </div>
                </div>

                <div class="col-lg-6" >
                    <h3>Application Form</h3>
                    <div class="box wow fadeInLeft"style="padding: 20px; border-top: 3px solid #004A99">
                        <div class="" style="background: #FFF; padding: 5px; "> 
                            <h5>Fill in the form details to apply for this job</h5>
                            <hr/>
                            <form id="sendJobApplicationForm1" method="post" role="form" class="contactForm1" action="<?= site_url('main/sendApplication/' . $job_id); ?>" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <label style="font-weight: bold;">First Name</label>
                                        <input type="text" name="fname" class="form-control" id="name" placeholder="First Name" />
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label style="font-weight: bold;">Last Name</label>
                                        <input type="text" name="lname" class="form-control"  id="email" placeholder="Last Name" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <label style="font-weight: bold;">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Your Email" />
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label style="font-weight: bold;">Phone</label>
                                        <input type="text" name="phone" class="form-control" id="subject" placeholder="Phone" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="gender" style="font-weight: bold;">Gender:</label>
                                    <select name="gender" class="form-control" id="gender" required="">                                        
                                        <option selected disabled="">gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <label style="font-weight: bold;">Date of Birth</label>
                                        <input type="date" name="dob" class="form-control" id="dob" placeholder="date of birth"  />
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label style="font-weight: bold;">ID No/Passport No</label>
                                        <input type="text" name="idno" class="form-control" id="idno" placeholder="ID Number"  />
                                    </div>
                                </div>                          
                                <div class="text-center">
                                    <input id="jobId" type="hidden" value="<?php echo $job_id; ?>">
                                    <button type="submit" class="btn btn-block btn-info" title="Submit" >Submit Application <i class="fa fa-send"></i></button>
                                    <img id="loadSendJobApplication" class="hidden" style="visibility: hidden;" src="<?php echo base_url(); ?>assets/img/142.gif" />
                                    <p id="responseSendJobApplication" class="text-fuchsia"></p>
                                </div>
                            </form>
                            <div>
                                <p style="font-style: italic; text-decoration: underline;">N.B: Only shortlisted candidates will be contacted.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- #more-features -->   

</main>