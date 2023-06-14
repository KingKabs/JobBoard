$(document).ready(function () {
    var siteurl = $("#siteurl").html();
    //alert(siteurl);

    //add/update interview question answer
    $(".interview_question_answer").change(function (evt) {
        var msg = $("#responseAddInterviewQuestionAnswer");
        var form = $(".addInterviewQuestionAnswerForm");
        var formData = form.serialize();
        var applicationId = $("#applicationId").val();
        var testId = $("#testId").val();
        var questionId = $(this).attr('id');
        var answer = $(this).attr('value');
        //alert(answer);

        var ajax = $.ajax({
            url: siteurl + "/main/addInterviewTestSubmission/" + applicationId + "/" + testId + "/" + questionId + "/" + answer,
            method: "post",
            data: formData
        });
        //return null;
        ajax.done(function (response) {
            if (response.search(/successfully/i) > -1) {
                //alert(response + "SUCCESS.");
                msg.html(response + "SUCCESS.");
                msg.fadeOut(3000);
                //$("#addInterviewQuestionAnswerForm")[0].reset();
            } else {
                //alert(response);
                msg.html(response);
            }

        });
        ajax.fail(function () {
            msg.html("There was a problem submitting the answers, please try again later");
            msg.fadeOut(3000);
        });
    });


    $("#submitInterview").click(function (evt) {
        alert("Interview answers submitted successfully!");
    });


    //send JobApplication Form
    $("#sendJobApplicationForm").submit(function (evt) {
        evt.preventDefault();
        var gif = $("#loadSendJobApplication");
        var msg = $("#responseSendJobApplication");
        var jobId = $("#jobId").val();
        gif.removeClass("hidden");
        $(":submit").attr("disabled", true);
        var form = $("#sendJobApplicationForm");
        var formData = form.serialize();
        var ajax = $.ajax({
            type: 'POST',
            url: siteurl + "/admin/updateJobApplicationStatus/" + jobId, //edit group url
            data: formData
        });
        //return null;
        ajax.done(function (response) {
            if (response.search(/successfully/i) > -1) {
                alert(response + ". SUCCESS.");
                gif.addClass("hidden");
                $(":submit").removeAttr("disabled");
                msg.html(response + ". SUCCESS.");
                //$("#sendJobApplicationForm")[0].reset();
            } else {
                gif.addClass("hidden");
                alert(response);
                msg.html(response);
            }

        });
        ajax.fail(function () {
            gif.addClass("hidden");
            msg.html("There was a problem submitting the application status, please try again later");
        });
    });

    //post job listing
    $("#postJobForm").submit(function (evt) {
        evt.preventDefault();
        var gif = $("#loadPostJob");
        var msg = $("#responsePostJob");
        gif.removeClass("hidden");
        $(":submit").attr("disabled", true);
        var form = $("#postJobForm");
        var formData = form.serialize();
        var ajax = $.ajax({
            type: 'POST',
            url: siteurl + "/admin/postJob/", //edit group url
            data: formData
        });
        //return null;
        ajax.done(function (response) {
            if (response.search(/successfully/i) > -1) {
                alert(response + ". SUCCESS.");
                gif.addClass("hidden");
                $(":submit").removeAttr("disabled");
                msg.html(response + ". SUCCESS.");
                //$("#postJobForm")[0].reset();
            } else {
                gif.addClass("hidden");
                alert(response);
                msg.html(response);
            }

        });
        ajax.fail(function () {
            gif.addClass("hidden");
            msg.html("There was a problem posting the job listing, please try again later");
        });
    });

    //edit job listing details
    $("#editJobListingDetailsForm").submit(function (evt) {
        evt.preventDefault();
        var gif = $("#loadEditJobListingDetails");
        var msg = $("#responseEditJobListingDetails");
        var jobId = $("#jobId").val();
        gif.removeClass("hidden");
        $(":submit").attr("disabled", true);
        var form = $("#editJobListingDetailsForm");
        var formData = form.serialize();
        var ajax = $.ajax({
            type: 'POST',
            url: siteurl + "/admin/editJobListingDetails/" + jobId, //edit group url
            data: formData
        });
        //return null;
        ajax.done(function (response) {
            if (response.search(/successfully/i) > -1) {
                alert(response + ". SUCCESS.");
                gif.addClass("hidden");
                $(":submit").removeAttr("disabled");
                msg.html(response + ". SUCCESS.");
                //$("#editJobListingDetailsForm")[0].reset();
            } else {
                gif.addClass("hidden");
                alert(response);
                msg.html(response);
            }

        });
        ajax.fail(function () {
            gif.addClass("hidden");
            msg.html("There was a problem updating the job listing, please try again later");
        });
    });

    //delete job listing
    $("#deleteJobListingForm").submit(function (evt) {
        evt.preventDefault();
        var gif = $("#loadDeleteJobListing");
        var msg = $("#responseDeleteJobListing");
        var jobId = $("#jobId").val();
        gif.removeClass("hidden");
        $(":submit").attr("disabled", true);
        var form = $("#deleteJobListingForm");
        var formData = form.serialize();
        var ajax = $.ajax({
            type: 'POST',
            url: siteurl + "/admin/updateJobListingDeletionStatusDELETE/" + jobId, //edit group url
            data: formData
        });
        //return null;
        ajax.done(function (response) {
            if (response.search(/successfully/i) > -1) {
                alert(response + ". SUCCESS.");
                gif.addClass("hidden");
                $(":submit").removeAttr("disabled");
                msg.html(response + ". SUCCESS.");
                window.location.href = siteurl + "/admin/job_listings/";
                //$("#deleteJobListingForm")[0].reset();
            } else {
                gif.addClass("hidden");
                alert(response);
                msg.html(response);
            }

        });
        ajax.fail(function () {
            gif.addClass("hidden");
            msg.html("There was a problem deleting the job listing, please try again later");
        });
    });

    //update Job Application Status
    $("#updateJobApplicationStatusForm").submit(function (evt) {
        evt.preventDefault();
        var gif = $("#loadUpdateJobApplicationStatus");
        var msg = $("#responseUpdateJobApplicationStatus");
        var applicationId = $("#applicationId").val();
        gif.removeClass("hidden");
        $(":submit").attr("disabled", true);
        var form = $("#updateJobApplicationStatusForm");
        var formData = form.serialize();
        var ajax = $.ajax({
            type: 'POST',
            url: siteurl + "/admin/updateJobApplicationStatus/" + applicationId, //edit group url
            data: formData
        });
        //return null;
        ajax.done(function (response) {
            if (response.search(/successfully/i) > -1) {
                alert(response + ". SUCCESS.");
                gif.addClass("hidden");
                $(":submit").removeAttr("disabled");
                msg.html(response + ". SUCCESS.");
                //$("#updateJobApplicationStatusForm")[0].reset();
            } else {
                gif.addClass("hidden");
                alert(response);
                msg.html(response);
            }

        });
        ajax.fail(function () {
            gif.addClass("hidden");
            msg.html("There was a problem submitting the application status, please try again later");
        });
    });

    //send message to applicant
    $("#sendMessageToApplicantForm").submit(function (evt) {
        evt.preventDefault();
        var gif = $("#loadSendMessageToApplicant");
        var msg = $("#responseSendMessageToApplicant");
        var applicationId = $("#applicationId").val();
        gif.removeClass("hidden");
        $(":submit").attr("disabled", true);
        var form = $("#sendMessageToApplicantForm");
        var formData = form.serialize();
        var ajax = $.ajax({
            type: 'POST',
            url: siteurl + "/admin/sendMessageToApplicant/" + applicationId, //edit group url
            data: formData
        });
        //return null;
        ajax.done(function (response) {
            if (response.search(/successfully/i) > -1) {
                alert(response + ". SUCCESS.");
                gif.addClass("hidden");
                $(":submit").removeAttr("disabled");
                msg.html(response + ". SUCCESS.");
                //$("#sendMessageToApplicantForm")[0].reset();
            } else {
                gif.addClass("hidden");
                alert(response);
                msg.html(response);
            }

        });
        ajax.fail(function () {
            gif.addClass("hidden");
            msg.html("There was a problem sending the message, please try again later");
        });
    });

    //send application
    $("#sendMessageForm").submit(function (evt) {
        evt.preventDefault();
        var gif = $("#loadSendMessage");
        var msg = $("#responseSendMessage");
        gif.removeClass("hidden");
        var form = $("#sendMessageForm");
        var formData = form.serialize();
        var ajax = $.ajax({
            type: 'POST',
            url: siteurl + "/fasttrack/sendWebsiteContactFormEmail/", //edit group url
            data: formData
        });
        //return null;
        ajax.done(function (response) {
            if (response.search(/successfully/i) > -1) {
                alert(response);
                gif.addClass("hidden");
                msg.html(response);
                $("#sendMessageForm")[0].reset();
            } else {
                gif.addClass("hidden");
                alert(response);
                msg.html(response);
            }

        });
        ajax.fail(function () {
            gif.addClass("hidden");
            msg.html("There was a problem sending the message, please try again later");
        });
    });


});