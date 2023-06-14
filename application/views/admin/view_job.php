<main id="main">
    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" style="margin-top: 70px; ">
        <div class="container-fluid">
            <div class="row wow fadeInUp">
                <div class="col-sm-12">
                    <div class="contact-about">
                        <h4>Job Details</h4>
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Add Interview(Test) <i class="fa fa-plus"></i></button>

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
                                                    <a href="#" class="btn btn-success"> <i class="fa fa-edit"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addTestQuestionsModal">Add Interview(Test) Questions <i class="fa fa-plus"></i></button>
                        <div class="box-body table-responsive" style="overflow-x: auto; padding-top: 10px;">                                                            
                            <table id="example1" class="table table-bordered table-hover">
                                <thead style="background: #F1F1F1;">
                                    <tr>
                                        <th>S/no</th>
                                        <th>Test Name</th>
                                        <th>Test Description</th>
                                        <th>Pass Mark</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($jobtests as $job): ?>
                                        <tr>
                                            <td><?php echo $job->test_id; ?></td>
                                            <td><?php echo $job->test_name; ?></td>
                                            <td><?php echo $job->test_description; ?></td>
                                            <td><?php echo $job->pass_mark; ?></td>
                                            <td>
                                                <div class="btn-group" style="background: #023F54;">
                                                    <a href="#" class="btn btn-success"> <i class="fa fa-edit"></i></a>
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

            <div class="row">

            </div>

            <!--BEGIN Page Modals-->
            <div>
                <!-- BEGIN Add Test Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Test/Interview</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body" style="background: #F1F1F1;">
                                <div style="background: #FFF; padding: 10px;">
                                    <form role="form" method="POST" action="<?= site_url('admin/addJobTest/' . $job_id); ?>" >
                                        <div class="form-group">
                                            <label for="test_name" style="font-weight: bold;">Test Name:</label>
                                            <input type="text" class="form-control" name="test_name" id="job_title" placeholder="test name" required="" />
                                        </div>
                                        <div class="form-group">
                                            <label for="test_description" style="font-weight: bold;">Test Description:</label>
                                            <textarea class="form-control" name="test_description" rows="5" placeholder="test description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="pass_mark" style="font-weight: bold;">Pass Mark:</label>
                                            <input type="number" class="form-control" name="pass_mark" id="pass_mark" placeholder="pass mark" required="" />
                                        </div>
                                        <div class="form-group">
                                            <label for="test_duration" style="font-weight: bold;">Test Duration:</label>
                                            <input type="number" class="form-control" name="test_duration" id="test_duration" placeholder="test duration" required="" />
                                        </div>
                                        <div class="form-group">
                                            <label for="level" style="font-weight: bold;">Level:</label>
                                            <select name="level" class="form-control" id="level" required="">                                        
                                                <option selected disabled="">level</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" title="Add Job" class="btn btn-success btn-block">Add Job Interview(Test) <i class="fa fa-plus"></i></button>
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
                <!-- END Add Test Modal -->

                <!-- BEGIN Add Test Question Modal -->
                <div id="addTestQuestionsModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Test/Interview Question</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body" style="background: #F1F1F1;">
                                <div style="background: #FFF; padding: 10px;">
                                    <form role="form" method="POST" action="<?= site_url('admin/addJobTestQuestion/'); ?>" >
                                        <div class="form-group">
                                            <label for="test_id" style="font-weight: bold;">Test:</label>
                                            <select name="test_id" class="form-control" id="test_id" required="">
                                                <option value="" selected disabled="">select test/interview</option>
                                                <?php foreach ($jobtests as $test): ?>
                                                    <option value="<?php echo $test->test_id; ?>"><?php echo $test->test_name; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="question" style="font-weight: bold;">Question:</label>
                                            <input type="text" class="form-control" name="question" id="job_title" placeholder="question" required="" />
                                        </div>
                                        <div class="form-group">
                                            <label for="answer_set" style="font-weight: bold;">Answer Set:</label>
                                            <textarea class="form-control" name="answer_set" rows="5" placeholder="answer set"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="answer" style="font-weight: bold;">Answer:</label>
                                            <input type="text" class="form-control" name="answer" id="job_title" placeholder="answer" required="" />
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" title="Add Job" class="btn btn-success btn-block">Add Interview(Test) Question <i class="fa fa-plus"></i></button>
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
                <!-- END Add Test Question Modal -->

            </div>
            <!--END Page Modals-->

        </div>
    </section><!-- #contact -->    

</main>