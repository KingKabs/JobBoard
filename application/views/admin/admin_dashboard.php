<main id="main">
    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" style="margin-top: 70px;">
        <div class="container-fluid">
            <div class="row wow fadeInUp">
                <div class="col-sm-12">
                    <div class="contact-about">
                        <h4>Job Listings</h4>
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Add Job <i class="fa fa-plus"></i></button>

                        <div class="box-body table-responsive" style="overflow-x: auto; padding-top: 10px;">                                                            
                            <table id="example1" class="table table-bordered table-hover">
                                <thead style="background: #F1F1F1;">
                                    <tr>
                                        <th>S/no</th>
                                        <th>Job Title</th>                                                                       
                                        <th>Job Summary</th>
                                        <th>Opening Date</th>
                                        <th>Closing Date</th>
                                        <th>Status</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($alljobs as $job): ?>
                                        <tr>
                                            <td><?php echo $job->job_id; ?></td>
                                            <td><?php echo $job->job_title; ?></td>
                                            <td><?php echo $job->job_summary; ?></td>
                                            <td><?php echo $job->opening_date; ?></td>
                                            <td><?php echo $job->closing_date; ?></td>
                                            <td><?php echo $job->status; ?></td>
                                            <td><?php echo $job->description; ?></td>
                                            <td>
                                                <div class="btn-group" style="background: #023F54;">
                                                    <a href="<?php echo site_url('admin/view_job/' . $job->job_id) ?>" class="btn btn-sm btn-info"> <i class="fa fa-eye"></i></a>
                                                    <a href="<?php echo site_url('admin/job_listing_applications/' . $job->job_id); ?>" class="btn btn-sm btn-success"> <i class="fa fa-users"></i></a>
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

            <!--BEGIN Page Modals-->
            <div>
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Job</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body" style="background: #F1F1F1;">
                                <div style="background: #FFF; padding: 10px;">
                                    <form role="form" method="POST" action="<?= site_url('admin/addJob/'); ?>" >
                                        <div class="form-group">
                                            <label for="job_title" style="font-weight: bold;">Job Title:</label>
                                            <input type="text" class="form-control" name="job_title" id="job_title" placeholder="job title" required="" />
                                        </div>
                                        <div class="form-group">
                                            <label for="opening_date" style="font-weight: bold;">Opening Date:</label>
                                            <input type="date" class="form-control" name="opening_date" id="opening_date" placeholder="opening date" required="" />
                                        </div>
                                        <div class="form-group">
                                            <label for="closing_date" style="font-weight: bold;">Closing Date:</label>
                                            <input type="date" class="form-control" name="closing_date" id="opening_date" placeholder="closing date" required="" />
                                        </div>
                                        <div class="form-group">
                                            <label for="job_summary" style="font-weight: bold;">Job Summary:</label>
                                            <textarea class="form-control" name="job_summary" rows="5" placeholder="job summary"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="description" style="font-weight: bold;">Description:</label>
                                            <textarea class="form-control" name="description" rows="5" placeholder="description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="instructions" style="font-weight: bold;">Instructions:</label>
                                            <textarea class="form-control" name="instructions" rows="5" placeholder="instructions"></textarea>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" title="Add Job" class="btn btn-success btn-block">Add Job <i class="fa fa-plus"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--END Page Modals-->

        </div>
    </section><!-- #contact -->

</main>