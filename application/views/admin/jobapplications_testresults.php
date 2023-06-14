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
                <h5 style="font-weight: bold; text-decoration: underline">Successful Applications</h5>
                <div style="overflow-x: auto;">
                    <table id="example1" class="table table-hover table-bordered table-responsive1">
                        <thead style="background: #F1F1F1;">
                            <tr>
                                <th>S/no</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th style="white-space: nowrap;">Application Date</th>
                                <th>Test</th>
                                <th style="white-space: nowrap;">Total Score</th>
                                <th>Result</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($applications_pass as $applicant): ?>
                                <tr>
                                    <td><?php echo $applicant->application_id; ?></td>
                                    <td><?php echo $applicant->fname . " " . $applicant->lname; ?></td>
                                    <td><?php echo $applicant->email; ?></td>
                                    <td><?php echo $applicant->phone; ?></td>
                                    <td><?php echo $applicant->application_date; ?></td>
                                    <td><?php echo $applicant->test_name; ?></td>
                                    <td><?php echo $applicant->totalScore; ?></td>
                                    <td><label class="badge badge-success">PASS</label></td>
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

            <div class="col-sm-12">
                <h5 style="font-weight: bold; text-decoration: underline">UnSuccessful Applications</h5>
                <div style="overflow-x: auto;">
                    <table id="example1" class="table table-hover table-bordered table-responsive1">
                        <thead style="background: #F1F1F1;">
                            <tr>
                                <th>S/no</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Application Date</th>
                                <th>Test</th>
                                <th>Total Score</th>
                                <th>Result</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($applications_fail as $applicant): ?>
                                <tr>
                                    <td><?php echo $applicant->application_id; ?></td>
                                    <td><?php echo $applicant->fname . " " . $applicant->lname; ?></td>
                                    <td><?php echo $applicant->email; ?></td>
                                    <td><?php echo $applicant->phone; ?></td>
                                    <td><?php echo $applicant->application_date; ?></td>
                                    <td><?php echo $applicant->test_name; ?></td>
                                    <td><?php echo $applicant->totalScore; ?></td>
                                    <td><label class="badge badge-danger">FAIL</label></td>
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



    </div>
</section><!-- #about -->