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
                    <div class="label label-success" id="clockdiv" style="font-weight: bold; font-size: 20px;"></div>

                    <div class="box wow fadeInLeft"style="padding: 20px;">
                        <?php foreach ($jobtest as $test) : ?>
                            <h4 class="title" style="margin-left: 0px;"><a href=""><?php echo $test->test_id . ". " . $test->test_name; ?></a></h4>
                            <p class="description" style="margin-left: 0px;"><?php echo $test->test_description; ?></p>
                            <p class="description" style="margin-left: 0px;">Duration: <span id="testDuration"><?php echo $test->test_duration; ?></span> minute(s)</p>
                            <hr/>
                        <?php endforeach; ?>

                        <?php foreach ($jobtestquestions as $question): ?>
                            <form class="addInterviewQuestionAnswerForm" name="" method="post" action="#">
                                <input id="applicationId" type="hidden" value="<?php echo $application_id; ?>">
                                <input id="testId" type="hidden" value="<?php echo $test_id; ?>">
                                <p id="responseAddInterviewQuestionAnswer" class="text-info"></p>
                                <p style="font-weight: bold;">Question <?php echo $question->question_id; ?></p>
                                <p><?php echo $question->question; ?></p>
                                <?php
                                $answer_setArray = json_decode($question->answer_set, TRUE);
                                $choice = 'A';
                                foreach ($answer_setArray as $answer) {
                                    echo "<p><input class='interview_question_answer' type='radio' id='$question->question_id' name='interview_question_answer' value='$choice'> " . $answer . "</p><br/>";
                                    $choice++;
                                }
                                ?>                        
                                <hr/>
                            </form>
                        <?php endforeach; ?>
                        <form>
                            <button id="submitInterview" formaction="<?php echo site_url('main/process_results/' . $job_id . "/" . $application_id . "/" . $test_id); ?>" class="btn btn-sm btn-info" style="font-weight: bold;">Submit Interview <i class="fa fa-send"></i></button>
                        </form>
<!--button type="button" class="btn btn-success btn-sm submitInterview" data-toggle="modal" data-target="#myModal">Process Results <i class="fa fa-envelope"></i></button-->
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

<script>
    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                timer = 0;
                $("#submitInterview").prop("disabled", true);
                $("#clockdiv").css('color', 'red');
                //alert("Test Duration has elapsed!!");
            }
        }, 1000);
    }

    window.onload = function () {
        var testDurationMinutes = $("#testDuration").text();
        var testDurationSeconds = testDurationMinutes * 60,
                display = document.querySelector('#clockdiv');
        startTimer(testDurationSeconds, display);
    };
</script>