<?php
	include('header.php');
	include('server.php');
	include('config.php');
	include('navigation-admin.php');
	include('insert.php');
	include('delete.php');
	if (empty($_SESSION['username'])){
		header('location: login.php');
	}
  	// $user = $_SESSION['user'];

?>
<div class="container" style="margin-top: 50px;">
	<div class="row">
		<div class="col-lg-12">
			<h2>Question <span class="btn btn-sm btn-primary" data-toggle="modal" data-target="#AddQuestion"><i class="glyphicon glyphicon-plus"></i> Add Question</span></h2>
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Questionaire</th>
							<th>OptionA</th>
							<th>OptionB</th>
							<th>OptionC</th>
							<th>OptionD</th>
							<th>Answer</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$query = "SELECT * FROM question JOIN questionanswer ON question.QuestionAnswerID = questionanswer.QuestionAnswerID ORDER BY QuestionID ASC";
							$result = mysqli_query($dbcon, $query);  
		        			while($row = mysqli_fetch_array($result)){
								echo "<tr>";
								echo "<td>".$row['QuestionID']."</td>";
								echo "<td>".$row['Questionaire']."</td>";
								echo "<td>".$row['OptionA']."</td>";
								echo "<td>".$row['OptionB']."</td>";
								echo "<td>".$row['OptionC']."</td>";
								echo "<td>".$row['OptionD']."</td>";
								echo "<td>".$row['QuestionAnswer'].". &nbsp;".$row['Option'.$row['QuestionAnswer']]."</td>";
								echo "<td><div name='edit' id=".$row['QuestionID']." class='btn btn-xs btn-primary'><span class='glyphicon glyphicon-pencil'></span></div> &nbsp;";
								echo "<div name='delete' id=".$row['QuestionID']." class='delete_question btn btn-xs btn-danger'><span class='glyphicon glyphicon-trash'></span></div></td>";
								echo "</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<h2>User <span class="btn btn-sm btn-primary" data-toggle="modal" data-target="#AddUser"><i class="glyphicon glyphicon-plus"></i> Add User</span></h2>
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>LastName</th>
							<th>FistName</th>
							<th>UserName</th>
							<th>Password</th>
							<th>Section</th>
							<th colspan="2">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$query = "SELECT * FROM user JOIN section ON user.SectionID = section.SectionID";
							$result = mysqli_query($dbcon, $query);
		        			while($row = mysqli_fetch_array($result)){
								echo "<tr>";
								echo "<td>".$row['UserID']."</td>";
								echo "<td>".$row['LastName']."</td>";
								echo "<td>".$row['FirstName']."</td>";
								echo "<td>".$row['UserName']."</td>";
								echo "<td>".$row['Password']."</td>";
								echo "<td>".$row['Section']."</td>";
								echo "<td><div name='edit' id=".$row['UserID']." class='btn btn-xs btn-primary'><span class='glyphicon glyphicon-pencil'></span></div></td>";
								echo "<td><div name='delete' id=".$row['UserID']." class='delete_user btn btn-xs btn-danger'><span class='glyphicon glyphicon-trash'></span></div></td>";
								echo "</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<h2>UserAnswer</h2>
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Questionaire</th>
							<th>Answer</th>
							<th>UserName</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$query = "SELECT * FROM useranswer JOIN question ON question.QuestionID = useranswer.QuestionID JOIN user ON user.UserID = useranswer.UserID ORDER BY UserAnswerID ASC";
							$result = mysqli_query($dbcon, $query);
		        			while($row = mysqli_fetch_array($result)){
								echo "<tr>";
								echo "<td>".$row['UserAnswerID']."</td>";
								echo "<td>".$row['Questionaire']."</td>";
								echo "<td>".$row['Answer'].'.&nbsp; '.$row['Option'.$row['Answer']]."</td>";
								echo "<td>".$row['UserName']."</td>";
								// echo "<td><div name='edit' id=".$row['UserAnswerID']." class='btn btn-xs btn-primary'><span class='glyphicon glyphicon-pencil'></span></div></td>";
								// echo "<td><div name='delete' id=".$row['UserAnswerID']." class='btn btn-xs btn-danger'><span class='glyphicon glyphicon-trash'></span></div></td>";
								echo "</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-7">
			<div class="row">
				<div class="col-xs-6">
					<h2>Result</h2>
				</div>
				<div class="col-xs-6">
					
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>LastName</th>
							<th>FirstName</th>
							<th>Section</th>
							<th>Points</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$query = "SELECT * FROM result JOIN user ON user.UserID = result.UserID JOIN section ON section.SectionID = user.SectionID";
							$result = mysqli_query($dbcon, $query);
		        			while($row = mysqli_fetch_array($result)){
								echo "<tr>";
								echo "<td>".$row['ResultID']."</td>";
								echo "<td>".$row['LastName']."</td>";
								echo "<td>".$row['FirstName']."</td>";
								echo "<td>".$row['Section']."</td>";
								echo "<td>".$row['Points']."</td>";
								echo "</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-sm-5">
			<h2>Section <span class="btn btn-sm btn-primary" data-toggle="modal" data-target="#AddSection"><i class="glyphicon glyphicon-plus"></i> Add Section</span> </h2>
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Section</th>
							<th colspan="2">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$query = "SELECT * FROM section";
							$result = mysqli_query($dbcon, $query);
		        			while($row = mysqli_fetch_array($result)){
								echo "<tr>";
								echo "<td>".$row['SectionID']."</td>";
								echo "<td>".$row['Section']."</td>";
								echo "<td><div name='edit' id=".$row['SectionID']." class='btn btn-xs btn-primary edit_section'><span class='glyphicon glyphicon-pencil'></span></div></td>";
								echo "<td><div name='delete' id=".$row['SectionID']." class='delete_section btn btn-xs btn-danger'><span class='glyphicon glyphicon-trash'></span></div></td>";
								echo "</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script>
	 $(document).on('click', '.delete_section', function(){  
        var sectionid = $(this).attr("id");  
        $.ajax({  
            url:"fetch_record.php",  
            method:"POST",  
            data:{sectionid:sectionid},  
            dataType:"json",  
            success:function(data){  
                $('#sectionid_del').val(data.SectionID);
                $('#DeleteSection').modal('show');  
            }  
        });  
    });  

	$(document).on('click', '.delete_user', function(){  
        var userid = $(this).attr("id");  
        $.ajax({  
            url:"fetch_record.php",  
            method:"POST",  
            data:{userid:userid},  
            dataType:"json", 
            success:function(data){  
                $('#userid_del').val(data.UserID);
                $('#DeleteUser').modal('show');  
            }  
        });  
    }); 

    $(document).on('click', '.delete_question', function(){  
        var questionid = $(this).attr("id");  
        $.ajax({  
            url:"fetch_record.php",  
            method:"POST",  
            data:{questionid:questionid},  
            dataType:"json", 
            success:function(data){  
                $('#questionid_del').val(data.QuestionID);
                $('#DeleteQuestion').modal('show');  
            }  
        });  
    });  
</script>


<!-- Modal for Add Question-->
<div class="modal fade" id="AddQuestion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header ">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Add Question</h4>
		</div>
		<form action="index-admin.php" method="post">
		<div class="modal-body">
			<div class="form-group">
				<label for="recipient-name" class="control-label lg">Questionaire:</label>
				<textarea name="txtQuestion" class="form-control" required placeholder="Enter Question"></textarea>
		    </div>
		    <div class="form-group">
				<label for="recipient-name" class="control-label lg">OptionA:</label>
				<input type="text" name="txtOptionA" class="form-control" required placeholder="Enter Option A">
		    </div>
		    <div class="form-group">
				<label for="recipient-name" class="control-label lg">OptionB:</label>
				<input type="text" name="txtOptionB" class="form-control" required placeholder="Enter Option B">
		    </div>
		    <div class="form-group">
				<label for="recipient-name" class="control-label lg">OptionC:</label>
				<input type="text" name="txtOptionC" class="form-control" required placeholder="Enter Option C">
		    </div>
		    <div class="form-group">
				<label for="recipient-name" class="control-label lg">OptionD:</label>
				<input type="text" name="txtOptionD" class="form-control" required placeholder="Enter Option D">
		    </div>
		    <div class="form-group">
				<label for="recipient-name" class="control-label lg">Answer:</label>
				<?php
					$query = "SELECT * FROM questionanswer";
					$result = mysqli_query($dbcon, $query);
					echo "<select class='form-control' name='cboxAnswer'>";
				 	while ($row = mysqli_fetch_array($result)) {
				 		echo "<option value=".$row['QuestionAnswerID'].">".$row['QuestionAnswer']."</option>";
				 	}
				 	echo "</select>";
				?>
		    </div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<input type="submit" name="addquestion" id="addquestion" value="Add Question" class="btn btn-primary">
		</div>
	    </form>
	</div>
	</div>
</div>

<!-- Modal for Add User-->
<div class="modal fade" id="AddUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header ">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Add User</h4>
		</div>
		<form action="index-admin.php" method="post">
		<div class="modal-body">
			<div class="form-group">
				<label for="recipient-name" class="control-label lg">LastName:</label>
				<input type="text" name="txtLastName" class="form-control" required placeholder="Enter LastName">
		    </div>
		    <div class="form-group">
				<label for="recipient-name" class="control-label lg">FirstName:</label>
				<input type="text" name="txtFirstName" class="form-control" required placeholder="Enter FirstName">
		    </div>
		    <div class="form-group">
				<label for="recipient-name" class="control-label lg">UserName:</label>
				<input type="text" name="txtUserName" class="form-control" required placeholder="Enter UserName">
		    </div>
		    <div class="form-group">
				<label for="recipient-name" class="control-label lg">Password:</label>
				<input type="password" name="txtPassword" class="form-control" required placeholder="Enter Password">
		    </div>
		    <div class="form-group">
				<label for="recipient-name" class="control-label lg">Section:</label>
				<?php
					$query = "SELECT * FROM section";
					$result = mysqli_query($dbcon, $query);
					echo "<select class='form-control' name='cboxSection'>";
				 	while ($row = mysqli_fetch_array($result)) {
				 		echo "<option value=".$row['SectionID'].">".$row['Section']."</option>";
				 	}
				 	echo "</select>";
				?>
		    </div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<input type="submit" name="adduser" id="adduser" value="Add User" class="btn btn-primary">
		</div>
	    </form>
	</div>
	</div>
</div>

<!-- Modal for Add Section-->
<div class="modal fade" id="AddSection" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header ">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Add Section</h4>
		</div>
		<form action="index-admin.php" method="post">
		<div class="modal-body">
			<div class="form-group">
				<label for="recipient-name" class="control-label lg">Section:</label>
				<input type="text" name="txtSection" class="form-control" required placeholder="Enter Section">
		    </div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<input type="submit" name="addsection" id="addsection" value="Add Section" class="btn btn-primary">
		</div>
	    </form>
	</div>
	</div>
</div>


<!-- Modal for Delete Question -->
<div id="DeleteQuestion" class="modal fade">  
    <div class="modal-dialog">  
        <div class="modal-content"> 
        	<form method="post" action="index-admin.php">
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                    <h4 class="modal-title">Delete Question</h4>  
                </div>  
                <div class="modal-body">  
                	<div class="form-group">
                       Are you sure you want to delete data?
                    </div> 
                    <input type="text" name="questionid_del" id="questionid_del" style="display: none;">  
                </div>  
                <div class="modal-footer">  
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                    <input type="submit" name="deletequestion" id="deletequestion" value="Delete" class="btn btn-danger" />  
                </div>  
			</form> 
        </div>  
    </div>  
</div>  


<!-- Modal for Delete User -->
<div id="DeleteUser" class="modal fade">  
    <div class="modal-dialog">  
        <div class="modal-content"> 
        	<form method="post" action="index-admin.php">
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                    <h4 class="modal-title">Delete User</h4>  
                </div>  
                <div class="modal-body">  
                	<div class="form-group">
                       Are you sure you want to delete data?
                    </div> 
                    <input type="text" name="userid_del" id="userid_del" style="display: none;">  
                </div>  
                <div class="modal-footer">  
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                    <input type="submit" name="deleteuser" id="deleteuser" value="Delete" class="btn btn-danger" />  
                </div>  
			</form> 
        </div>  
    </div>  
</div>  

<!-- Modal for Delete Section -->
<div id="DeleteSection" class="modal fade">  
    <div class="modal-dialog">  
        <div class="modal-content"> 
        	<form method="post" action="index-admin.php">
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                    <h4 class="modal-title">Delete Section</h4>  
                </div>  
                <div class="modal-body">  
                	<div class="form-group">
                       Are you sure you want to delete data?
                    </div> 
                    <input type="text" name="sectionid_del" id="sectionid_del" style="display: none;">  
                </div>  
                <div class="modal-footer">  
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                    <input type="submit" name="deletesection" id="deletesection" value="Delete" class="btn btn-danger" />  
                </div>  
			</form> 
        </div>  
    </div>  
</div>  
