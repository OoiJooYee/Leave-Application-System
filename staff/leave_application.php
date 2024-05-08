<?php
session_start(); // Start up PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
header("Location: index.php");
?>

<html>
<head>
    <title>Leave Application Page</title>
    <link rel="icon" href="../image/logo.png" type="image/png">
    <link rel="stylesheet" href="../style.css">
    <script src="../script.js"></script>
</head>

<body>
    <?php
    include('staff_mainpage.html');
    ?>
    
    <form name="leaveAppForm" method="post" action="add_leave_application.php" onsubmit="return(validateLeaveAppForm());" >
    <div class="leaveAppFormContainer">
        <div>
            Leave Application Form
        </div>
        <div>
            Please fill in the form below if you need to leave work. 
            All leave applications need to be approves by both the applicant and the manager.
        </div>
			<div>
				<label class="leaveApp" for="startDuration">Start Date: </label><br/>
				<input type="datetime-local" id="startDuration" name="startDuration" onmouseout="checkStartDuration(); checkLeaveDuration();"/>
			</div>
            <div id='dateMessage1'></div>
			<div>
				<label class="leaveApp" for="endDuration">End Date: </label><br/>
				<input type="datetime-local" id="endDuration" name="endDuration" onmouseout="checkLeaveDuration();"/>
			</div>
            <div id='dateMessage2'></div>
			<div>
				<label class="leaveApp" for="leaveType">Leave Type: </label><br/>
				<select id="leaveType" name="leaveType" onmouseout="checkLeaveType();">
                    <option value="" selected> - select leave type - </option>
                    <option value="sick leave">Sick leave</option>
                    <option value="annual leave">Annual leave</option>
                    <option value="casual leave">Casual leave</option>
                    <option value="maternity leave">Maternity leave</option>
                    <option value="paternity leave">Paternity leave</option>
                    <option value="bereavement leave">Bereavement leave</option>
                    <option value="compensatory leave">Compensatory leave</option>
                    <option value="sabbatical leave">Sabbatical leave</option>
                    <option value="unpaid leave">Unpaid leave</option>
                </select>
			</div>
            <div id='leaveTypeMessage'></div>
			<div>
				<label class="leaveApp" for="reason">Reason to leave: </label><br/>
				<textarea id="reason" name="reason" rows="5" cols="75"></textarea>
			</div>
            <div>
                <input class="button-leaveApp" type="submit" value="Submit"/>
			</div>
	</div>
    </form>

</body>
</html>