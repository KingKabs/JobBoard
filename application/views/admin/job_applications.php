<!--==========================
      About Us Section
    ============================-->
<section id="about" style="padding-top: 100px;">
    <div class="container-fluid">

        <header class="">
            <h3 style="font-weight: bold;">Job Applications</h3>
            <p></p>
        </header>

        <div class="row" style="">
            <div class="btn-group" style="padding: 20px;">
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#ApplicationsStatisticsModal">Application Statistics <i class="fa fa-dashboard"></i></button>                
            </div>

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

            </div>                
        </div>  

        <!--Page Modals-->
        <div>
            <!-- Job Applications Statistics Modal -->
            <div id="ApplicationsStatisticsModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content" style="width: 600px;">
                        <div class="modal-header">
                            <h4 class="modal-title" style="font-weight: bold;">Job Application Statistics</h4><button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-hover table-bordered table-responsive1">
                                <thead style="background: #F1F1F1;">
                                    <tr>
                                        <th>#</th>
                                        <th>Job Listing</th>
                                        <th>Applications Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($application_stats as $stat): ?>
                                        <tr>
                                            <td><?php echo $stat->job_id; ?></td>
                                            <td><?php echo $stat->job_title; ?></td>                                            
                                            <td><label class="badge badge-info"><?php echo $stat->jobListingApplicationsCount; ?></label></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <th>TOTAL</th>
                                        <td></td>
                                        <td><label class="badge badge-dark"><?php echo $noOfApplications; ?></label></td>
                                    </tr>
                                </tbody>
                            </table>
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