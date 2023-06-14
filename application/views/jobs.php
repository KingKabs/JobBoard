<main id="main">


    <!--==========================
      More Features Section
    ============================-->
    <section id="more-features" class="section-bg" style="margin-top: 50px;">
        <div class="container">

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
                            <a href="<?php echo site_url('main/view_job/' . $job->job_id) ?>" class="btn btn-sm btn-primary">Apply <i class="fa fa-send"></i></a>
                        </div>
                    </div>
                <?php endforeach; ?>             

            </div>
        </div>
    </section><!-- #more-features -->


</main>