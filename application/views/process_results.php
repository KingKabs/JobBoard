-<main id="main">


    <!--==========================
      More Features Section
    ============================-->
    <section id="more-features" class="section-bg" style="margin-top: 50px;">
        <div class="container-fluid">

            <div class="section-header">
                <h3 class="section-title">Job Interviews/Tests</h3>
                <span class="section-divider"></span>
                <p class="section-description">Please take the listed interviews/tests to complete your application for this job.</p>
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

                <div class="col-lg-12" >
                    <h3>Required Interviews/Tests</h3>
                    <div class="box wow fadeInLeft"style="padding: 20px;">
                        <div style="background: #FFF; padding: 10px;">
                            <h6><span style="font-weight: bold">Test Name:</span> <?php echo $jobtestresults[0]->test_name; ?></h6>
                            <h6><span style="font-weight: bold">Pass Mark:</span> <?php echo $jobtestresults[0]->pass_mark . "%"; ?></h6>
                            <h6><span style="font-weight: bold">Your Score:</span> <?php echo $jobtestresults[0]->totalScore . "%"; ?></h6>
                            <h6>
                                <span style="font-weight: bold">Status:</span> 
                                <?php
                                if ($jobtestresults[0]->totalScore > $jobtestresults[0]->pass_mark) {
                                    echo "<label class='badge badge-success'>SUCCESSFUL</label>";
                                } else {
                                    echo "<label class='badge badge-danger'>UNSUCCESSFUL</label>";
                                }
                                ?>
                            </h6>
                        </div>

                        <?php if ($jobtestresults[0]->totalScore > $jobtestresults[0]->pass_mark): ?>
                            <a id="" href="<?php echo site_url('main/take_interview/' . $job_id . "/" . $application_id . "/" . 2); ?>" class="btn btn-sm btn-info" style="font-weight: bold;">Take Next Interview <i class="fa fa-send"></i></a>
                        <?php endif; ?>

                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">Email my Results <i class="fa fa-envelope"></i></button>
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
                                <h4 class="modal-title">Process Results</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body" style="background: #F1F1F1;">
                                <div style="background: #FFF; padding: 10px;">
                                    <h6><span style="font-weight: bold">Test Name:</span> <?php echo $jobtestresults[0]->test_name; ?></h6>
                                    <h6><span style="font-weight: bold">Pass Mark:</span> <?php echo $jobtestresults[0]->pass_mark . "%"; ?></h6>
                                    <h6><span style="font-weight: bold">Your Score:</span> <?php echo $jobtestresults[0]->totalScore . "%"; ?></h6>
                                    <h6>
                                        <span style="font-weight: bold">Status:</span> 
                                        <?php
                                        if ($jobtestresults[0]->totalScore > $jobtestresults[0]->pass_mark) {
                                            echo "<label class='badge badge-success'>SUCCESSFUL</label>";
                                        } else {
                                            echo "<label class='badge badge-danger'>UNSUCCESSFUL</label>";
                                        }
                                        ?>
                                    </h6>
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
    </section><!-- #more-features -->   

</main>