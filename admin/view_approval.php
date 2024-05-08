<?php
session_start(); // Start up PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
header("Location: index.php");
?>

<html>
<head>
    <title>Leave Application Report</title>
    <link rel="icon" href="../image/logo.png" type="image/png">
    <link rel="stylesheet" href="../style.css">
    <script src="../script.js"></script>
</head>

<body>
    <?php
    include('admin_mainpage.html');
    ?>

    <?php
	     require ("../config.php"); 
         $_SESSION['s_id'] = $_GET['s_id'];
         $id = $_SESSION['s_id'];
	     $sql = "SELECT * FROM LEAVEAPPLICATION INNER JOIN USER on LEAVEAPPLICATION.staffNo = USER.staffNo WHERE leaveApplicationId = '$id';";
		 $result = mysqli_query($conn, $sql);
	
		 if (mysqli_num_rows($result) == 1)	
		 $row = mysqli_fetch_assoc($result);

		 mysqli_close($conn);
	?>	
    
    <form name="leaveAppForm" method="post" >
    <div class="leaveAppFormContainer">
        <div>
            Leave Application Details
        </div>
            <div>
				<label class="profile" for="userId">User ID : </label>
				<input type="text" id="userId" name="userId" value="<?php echo $row['userId']; ?>" disabled />
			</div>
			<div>
				<label class="profile" for="staffNo">Staff No : </label>
				<input type="text" id="staffNo" name="staffNo" value="<?php echo $row['staffNo']; ?>" disabled />
			</div>
			<div>
				<label class="profile" for="name">Full Name : </label>
				<input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" disabled />
			</div>
			<div>
				<label class="profile" for="ic">IC No. : </label>
				<input type="text" id="ic" name="ic" value="<?php echo $row['ic']; ?>" disabled />
			</div>
			<div>
				<label class="profile" for="DOB">Date of Birth : </label>
				<input type="date" id="DOB" name="DOB" value="<?php echo $row['DOB']; ?>" disabled />
			</div>
			<div>
                <label class="profile">Gender : </label>
				<?php $value=$row['gender']; 
                if ($value == 'Female') {?>
				<input type="radio" id = "male" name="gender" value="Male" disabled/>
				<label for="male">Male</label>
				<input type="radio" id = "female" name="gender" value="Female" checked disabled/>
				<label for="female">Female</label>
				<?php }
				else {?>
				<input type="radio" id = "male" name="gender" value="Male" checked disabled/>
				<label for="male">Male</label>
				<input type="radio" id = "female" name="gender" value="Female" disabled/>
				<label for="female">Female</label>
				<?php }?>
			</div>
			<div>
				<label class="profile" for="phone">Phone No. : </label>
				<input type="text" id = "phone" name="phone" value="<?php echo $row['phone']; ?>" disabled />
			</div>
			<div>
				<label class="profile" for="email">Email : </label>
				<input type="email" id = "email" name="email" value="<?php echo $row['email']; ?>" disabled />
			</div>
			<div>
				<label class="profile" for="homeAddress">Address : </label><br/>
				<textarea id = "homeAddress" name="homeAddress" rows="5" cols="75" disabled><?php echo $row['homeAddress']; ?></textarea>
			</div>
            <div>
				<label class="leaveApp" for="appId">Leave Application ID : </label>
				<input type="text" id = "appId" name="appId" value="<?php echo $row['leaveApplicationId']; ?>" disabled />
			</div>
            <div>
				<label class="leaveApp" for="startDuration" disabled>Start Date: </label><br/>
				<input type="datetime-local" id="startDuration" name="startDuration" value="<?php echo $row['startDuration']; ?>" disabled/>
			</div>
            <div id='dateMessage1'></div>
			<div>
				<label class="leaveApp" for="endDuration" disabled>End Date: </label><br/>
				<input type="datetime-local" id="endDuration" name="endDuration" value="<?php echo $row['endDuration']; ?>" disabled/>
			</div>
            <div id='dateMessage2'></div>
			<div>
				<label class="leaveApp" for="leaveType">Leave Type: </label><br/>
				<select id="leaveType" name="leaveType" disabled>
                <?php 
                $leave = $row['leaveType']; 
                if ($leave == 'sick leave') {?>
                    <option value=""> - select leave type - </option>
                    <option value="sick leave" selected>Sick leave</option>
                    <option value="annual leave">Annual leave</option>
                    <option value="casual leave">Casual leave</option>
                    <option value="maternity leave">Maternity leave</option>
                    <option value="paternity leave">Paternity leave</option>
                    <option value="bereavement leave">Bereavement leave</option>
                    <option value="compensatory leave">Compensatory leave</option>
                    <option value="sabbatical leave">Sabbatical leave</option>
                    <option value="unpaid leave">Unpaid leave</option>
                <?php }
                else if ($leave == 'annual leave') {?>
                    <option value=""> - select leave type - </option>
                    <option value="sick leave">Sick leave</option>
                    <option value="annual leave" selected>Annual leave</option>
                    <option value="casual leave">Casual leave</option>
                    <option value="maternity leave">Maternity leave</option>
                    <option value="paternity leave">Paternity leave</option>
                    <option value="bereavement leave">Bereavement leave</option>
                    <option value="compensatory leave">Compensatory leave</option>
                    <option value="sabbatical leave">Sabbatical leave</option>
                    <option value="unpaid leave">Unpaid leave</option>
                <?php }
                else if ($leave == 'casual leave') {?>
                    <option value=""> - select leave type - </option>
                    <option value="sick leave">Sick leave</option>
                    <option value="annual leave">Annual leave</option>
                    <option value="casual leave" selected>Casual leave</option>
                    <option value="maternity leave">Maternity leave</option>
                    <option value="paternity leave">Paternity leave</option>
                    <option value="bereavement leave">Bereavement leave</option>
                    <option value="compensatory leave">Compensatory leave</option>
                    <option value="sabbatical leave">Sabbatical leave</option>
                    <option value="unpaid leave">Unpaid leave</option>
                <?php }
                else if ($leave == 'maternity leave') {?>
                    <option value=""> - select leave type - </option>
                    <option value="sick leave">Sick leave</option>
                    <option value="annual leave">Annual leave</option>
                    <option value="casual leave">Casual leave</option>
                    <option value="maternity leave" selected>Maternity leave</option>
                    <option value="paternity leave">Paternity leave</option>
                    <option value="bereavement leave">Bereavement leave</option>
                    <option value="compensatory leave">Compensatory leave</option>
                    <option value="sabbatical leave">Sabbatical leave</option>
                    <option value="unpaid leave">Unpaid leave</option>
                <?php }
                else if ($leave == 'paternity leave') {?>
                    <option value=""> - select leave type - </option>
                    <option value="sick leave">Sick leave</option>
                    <option value="annual leave">Annual leave</option>
                    <option value="casual leave">Casual leave</option>
                    <option value="maternity leave">Maternity leave</option>
                    <option value="paternity leave" selected>Paternity leave</option>
                    <option value="bereavement leave">Bereavement leave</option>
                    <option value="compensatory leave">Compensatory leave</option>
                    <option value="sabbatical leave">Sabbatical leave</option>
                    <option value="unpaid leave">Unpaid leave</option>
                <?php }
                else if ($leave == 'bereavement leave') {?>
                    <option value=""> - select leave type - </option>
                    <option value="sick leave">Sick leave</option>
                    <option value="annual leave">Annual leave</option>
                    <option value="casual leave">Casual leave</option>
                    <option value="maternity leave">Maternity leave</option>
                    <option value="paternity leave">Paternity leave</option>
                    <option value="bereavement leave" selected>Bereavement leave</option>
                    <option value="compensatory leave">Compensatory leave</option>
                    <option value="sabbatical leave">Sabbatical leave</option>
                    <option value="unpaid leave">Unpaid leave</option>
                <?php }
                else if ($leave == 'compensatory leave') {?>
                    <option value=""> - select leave type - </option>
                    <option value="sick leave">Sick leave</option>
                    <option value="annual leave">Annual leave</option>
                    <option value="casual leave">Casual leave</option>
                    <option value="maternity leave">Maternity leave</option>
                    <option value="paternity leave">Paternity leave</option>
                    <option value="bereavement leave">Bereavement leave</option>
                    <option value="compensatory leave" selected>Compensatory leave</option>
                    <option value="sabbatical leave">Sabbatical leave</option>
                    <option value="unpaid leave">Unpaid leave</option>
                <?php }
                else if ($leave == 'sabbatical leave') {?>
                    <option value=""> - select leave type - </option>
                    <option value="sick leave">Sick leave</option>
                    <option value="annual leave">Annual leave</option>
                    <option value="casual leave">Casual leave</option>
                    <option value="maternity leave">Maternity leave</option>
                    <option value="paternity leave">Paternity leave</option>
                    <option value="bereavement leave">Bereavement leave</option>
                    <option value="compensatory leave">Compensatory leave</option>
                    <option value="sabbatical leave" selected>Sabbatical leave</option>
                    <option value="unpaid leave">Unpaid leave</option>
                <?php }
                else if ($leave == 'unpaid leave') {?>
                    <option value=""> - select leave type - </option>
                    <option value="sick leave">Sick leave</option>
                    <option value="annual leave">Annual leave</option>
                    <option value="casual leave">Casual leave</option>
                    <option value="maternity leave">Maternity leave</option>
                    <option value="paternity leave">Paternity leave</option>
                    <option value="bereavement leave">Bereavement leave</option>
                    <option value="compensatory leave">Compensatory leave</option>
                    <option value="sabbatical leave">Sabbatical leave</option>
                    <option value="unpaid leave" selected>Unpaid leave</option>
                <?php }?>
                </select>
			</div>
            <div id='leaveTypeMessage'></div>
			<div>
				<label class="leaveApp" for="reason">Reason to leave: </label><br/>
				<textarea id="reason" name="reason" rows="5" cols="75" disabled><?php echo $row['reasonToLeave']; ?></textarea>
			</div>
            <div>
				<label class="leaveApp" for="status">Approval Status : </label>
				<input type="text" id="status" name="status" value="<?php echo $row['status']; ?>" disabled />
			</div>
            <div>
                <input class="button-leaveApp" type="submit" value="Return to previous page" formaction="leave_application_management.php"/>
			</div>
	</div>
    </form>

</body>
</html>