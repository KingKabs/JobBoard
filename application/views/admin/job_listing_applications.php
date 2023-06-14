<!--==========================
      About Us Section
    ============================-->
<section id="about" style="padding-top: 100px;">
    <div class="container-fluid">

        <header class="">
            <h3 style="font-weight: bold;">Job Applications</h3>
            <label class="badge badge-success">Job Listing: </label>
            <label class="badge badge-primary"><?php echo $joblisting[0]->job_title; ?></label>
        </header>

        <div class="row" style="">

            <div class="col-sm-12">

                <div style="overflow-x: auto;">
                    <table id="example1" class="table table-hover table-bordered table-responsive1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>JOB</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>PHONE</th>
                                <th>APPLICATION DATE</th>
                                <th>APPLICATION STATUS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($applications as $applicant): ?>
                                <tr>
                                    <td><?php echo $applicant->application_id; ?></td>
                                    <td><?php echo $applicant->job_title; ?></td>
                                    <td><?php echo $applicant->fname . " " . $applicant->lname; ?></td>
                                    <td><?php echo $applicant->email; ?></td>
                                    <td><?php echo $applicant->phone; ?></td>
                                    <td><?php echo $applicant->application_date; ?></td>
                                    <td><?php echo $applicant->application_status; ?></td>
                                    <td>
                                        <div class="btn-group" style="background: #023F54;">
                                            <a href="<?php echo site_url('admin/view_job_application/' . $applicant->application_id); ?>" class="btn btn-info"> <i class="fa fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <hr/>
            </div>                
        </div>

        <div class="row">
            <div class="col-sm-6">
                <h4 style="font-weight: bold;">View Applicants by Test Results</h4>
                <div class="box-body table-responsive" style="overflow-x: auto; padding-top: 10px;">                                                            
                    <table id="example1" class="table table-bordered table-hover">
                        <thead style="background: #F1F1F1;">
                            <tr>
                                <th>Test Name</th>
                                <th>Pass Mark</th>
                                <th>Level</th>
                                <th>Applicants</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($jobtests_applicants as $test): ?>
                                <tr>
                                    <td><?php echo $test->test_name; ?></td>
                                    <td><?php echo $test->pass_mark; ?></td>
                                    <td><?php echo $test->level; ?></td>
                                    <td><?php echo $test->totalApplicants; ?></td>
                                    <td>
                                        <div class="btn-group" style="background: #023F54;">
                                            <a href="<?php echo site_url('admin/jobapplications_testresults/' . $job_id . "/" . $test->test_id); ?>" class="btn btn-info"> <i class="fa fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section><!-- #about -->