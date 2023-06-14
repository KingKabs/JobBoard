<!--==========================
      About Us Section
    ============================-->
<section id="about" style="padding-top: 100px;">
    <div class="container-fluid">

        <header class="">
            <h3 style="font-weight: bold;">Job Application Details</h3>
            <p></p>
        </header>

        <div class="row" style="">
            <div class="col-sm-6">              

                <div style="overflow-x: auto;">                   
                    <table class="table table-hover table-bordered table-responsive1">
                        <thead style="background: #F1F1F1;">
                            <tr>
                                <th style="background: #F1F1F1; width: 30%;">Item</th>
                                <th style="background: #F1F1F1;">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th style="background: #F1F1F1;">Application ID</th>
                                <td><?php echo "#" . $application[0]->application_id; ?></td>
                            </tr>
                            <tr>
                                <th style="background: #F1F1F1;">JOB TITLE</th>
                                <td><?php echo $application[0]->job_title; ?></td>
                            </tr>
                            <tr>
                                <th style="background: #F1F1F1;">Applicant</th>
                                <td><?php echo $application[0]->fname . " " . $application[0]->lname; ?></td>
                            </tr>
                            <tr>
                                <th style="background: #F1F1F1;">Email</th>
                                <td><?php echo $application[0]->email; ?></td>
                            </tr>
                            <tr>
                                <th style="background: #F1F1F1;">Phone</th>
                                <td><?php echo $application[0]->phone; ?></td>
                            </tr>
                            <tr>
                                <th style="background: #F1F1F1;">Gender</th>
                                <td><?php echo $application[0]->gender; ?></td>
                            </tr>
                            <tr>
                                <th style="background: #F1F1F1;">ID No</th>
                                <td><?php echo $application[0]->idno; ?></td>
                            </tr>
                            <tr>
                                <th style="background: #F1F1F1;">Application Date</th>
                                <td><?php echo $application[0]->application_date; ?></td>
                            </tr>
                            <tr>
                                <th style="background: #F1F1F1;">Application Status</th>
                                <td><?php echo $application[0]->application_status; ?></td>
                            </tr>
                            <tr>
                                <th style="background: #F1F1F1;">Application Comments</th>
                                <td><?php echo nl2br($application[0]->application_comments); ?></td>
                            </tr>
                            <tr>
                                <th style="background: #F1F1F1;">Application DateTime</th>
                                <td><?php echo $application[0]->date_added; ?></td>
                            </tr>

                        </tbody>
                    </table>

                </div>

            </div> 

            <div class="col-sm-6" style="background: #FFF; border-top: 3px solid #004A99;">
                <h4 style="background: #F1F1F1; font-weight: bold; padding: 10px;">Tests Results</h4>
                <hr/>
                <div class="box-body table-responsive" style="overflow-x: auto; padding-top: 10px;">                                                            
                    <table id="example1" class="table table-bordered table-hover">
                        <thead style="background: #F1F1F1;">
                            <tr>
                                <th>Test</th>
                                <th>PassMark</th>
                                <th>Score</th>
                                <th>Result</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($applicationtestresults as $test): ?>
                                <tr>
                                    <td><?php echo $test->test_name; ?></td>
                                    <td><?php echo $test->pass_mark . "%"; ?></td>
                                    <td><?php echo $test->totalScore . "%"; ?></td>
                                    <td>
                                        <?php
                                        if ($test->totalScore > $test->pass_mark) {
                                            echo "<label class='badge badge-success'>PASS</label>";
                                        } else {
                                            echo "<label class='badge badge-danger'>FAIL</label>";
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>  

        <!--Page Modals-->
        <div>
            <!-- Update Application Status Modal -->
            <div id="updateApplicationStatusModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content" style="width: 600px;">
                        <div class="modal-header">
                            <h4 class="modal-title" style="font-weight: bold;">Update Job Application Status</h4><button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form id="updateJobApplicationStatusForm" method="post" role="form" class="contactForm1" action="<?= site_url('admin/updateJobApplicationStatus/' . $application_id); ?>">
                                <div class="form-group">
                                    <label for="application_status" style="font-weight: bold;">Application Status:</label>
                                    <select name="application_status" class="form-control" id="category" required="">                                        
                                        <option value="<?php echo $application[0]->application_status; ?>" selected><?php echo $application[0]->application_status; ?></option>
                                        <option value="SUCCESSFUL">SUCCESSFUL</option>
                                        <option value="UNSUCCESSFUL">UNSUCCESSFUL</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label style="font-weight: bold;">Application Comments</label>
                                    <textarea class="form-control" name="application_comments" rows="8" placeholder="application comments" required=""><?php echo $application[0]->application_comments; ?></textarea>
                                </div>
                                <div class="text-center">
                                    <input id="applicationId" type="hidden" value="<?php echo $application_id; ?>">
                                    <button type="submit" class="btn btn-block btn-info" title="Submit" >Update Job Application Status <i class="fa fa-send"></i></button>
                                    <img id="loadUpdateJobApplicationStatus" class="hidden" src="<?php echo base_url(); ?>assets/img/142.gif" />
                                    <p id="responseUpdateJobApplicationStatus" class="text-fuchsia"></p>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer" style="background: #D9D9D9;">
                            <button type="button" class="btn btn-sm btn-info" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Delete Job Listing Modal -->
            <div id="sendMessageToApplicantModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content" style="width: 600px;">
                        <div class="modal-header">
                            <h4 class="modal-title" style="font-weight: bold;">Send Message to Applicant</h4><button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form id="sendMessageToApplicantForm" method="post" role="form" class="contactForm1" action="<?= site_url('admin/sendMessageToApplicant/' . $application_id); ?>">
                                <div class="form-group">
                                    <label style="font-weight: bold;">Subject</label>
                                    <input type="text" name="subject" class="form-control" id="subject" placeholder="subject" required=""/>
                                </div>
                                <div class="form-group">
                                    <label style="font-weight: bold;">Message</label>
                                    <textarea class="form-control" name="message" rows="8" placeholder="message" required=""></textarea>
                                </div>
                                <div class="text-center">
                                    <input id="applicationId" type="hidden" value="<?php echo $application_id; ?>">
                                    <button type="submit" class="btn btn-block btn-info" title="Submit" >Send Message to Applicant <i class="fa fa-send"></i></button>
                                    <img id="loadSendMessageToApplicant" class="hidden" src="<?php echo base_url(); ?>assets/img/142.gif" />
                                    <p id="responseSendMessageToApplicant" class="text-fuchsia"></p>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer" style="background: #D9D9D9;">
                            <button type="button" class="btn btn-sm btn-info" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section><!-- #about -->