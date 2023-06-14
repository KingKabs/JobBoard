<main id="main">


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
                        <?php foreach ($jobtests as $test) : ?>
                            <h4 class="title" style="margin-left: 0px;"><a href=""><?php echo $test->test_id . ". " . $test->test_name; ?></a></h4>
                            <p class="description" style="margin-left: 0px;"><?php echo $test->test_description; ?></p>
                            <p class="description" style="margin-left: 0px;"><?php echo "Level " . $test->level; ?></p>
                            <p class="description" style="margin-left: 0px;"><?php echo "Duration: " . $test->test_duration; ?> minute(s)</p>
                            <a href="<?php echo site_url('main/take_interview/' . $job_id . "/" . $application_id . "/" . $test->test_id); ?>" class="btn btn-sm btn-primary">Start Interview <i class="fa fa-clock-o"></i></a>
                            <hr/>
                        <?php endforeach; ?>
                    </div>
                </div>                

            </div>
        </div>
    </section><!-- #more-features -->   

</main>