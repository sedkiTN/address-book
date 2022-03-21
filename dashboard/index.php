<?php
	session_start();
	include('../include/db.php');
	if(! (isset($_SESSION['UID']))){
		header("Location:../");
	}
	$row = mysqli_fetch_array(mysqli_query($con, "SELECT count(*) FROM persons"));
	$personsCount = $row[0];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Dashboard - Address Book</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/custom.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/dashbord.css">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container-fluid">
			<div class="jumbotron">
				<h1>Address Book</h1>
				<div class="row" style="padding-top: 30px;">
					<div class="col-12">
						<div class="card">
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#view" aria-controls="view" role="tab" data-toggle="tab">View All</a></li>
								<li role="presentation"><a href="#add" aria-controls="add" role="tab" data-toggle="tab">Add</a></li>
								<li role="presentation"><a href="#update" aria-controls="update" role="tab" data-toggle="tab">Update</a></li>
								<li role="presentation"><a href="logout/" aria-controls="logout">Logout</a></li>
							</ul>
							<div class="tab-content">
								<!-- View -->
								<div role="tabpanel" class="tab-pane active" id="view">
									<p class="text-center" id="deleteRes"></p>
									<table class="table table-condensed table-responsive">
										<thead>	
											<tr>
												<th>Name</th>
												<th>Mobile</th>
												<th>Email</th>
												<th>Permanent Address</th>
												<th>Temporary Address</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												$res = mysqli_query($con, "SELECT * FROM persons");
												while($row = mysqli_fetch_array($res)){
													echo '<tr id="'.$row['ID'].'">
															<td>'.$row['Name'].'</td>
															<td>'.$row['Mobile'].'</td>
															<td>'.$row['Email'].'</td>
															<td style="word-wrap:break-word;">'.$row['Permanant_Address'].'</td>
															<td>'.$row['Temporary_Address'].'</td>
															<td><button class="btn btn-danger" id="'.$row['ID'].'">Remove</button></td>
														</tr>';				
												}
											?>
										</tbody>
									</table>
								</div>
								<!-- Add -->
								<div role="tabpanel" class="tab-pane" id="add">
									<div class="container">
										<div class="row">
											<div class="col-sm-2"></div>
											<div class="col-sm-6">		
												<form class="form-vertical" role="form" id="addPersonForm">
													<p class="text-center" id="res"></p>
													<div class="row">
														<div class="col-sm-4">
															<label>First Name</label>
														</div>
														<div class="form-group col-sm-6">							        		
															<input type="text" class="form-control" name="fn" id="fn" autocomplete="off" />
														</div>
														<div class="col-sm-3"></div>
													</div>
													<div class="row">
														<div class="col-sm-4">
															<label>Last Name</label>
														</div>
														<div class="form-group col-sm-6">							        		
															<input type="text" class="form-control" name="ln" id="ln" autocomplete="off" />
														</div>
														<div class="col-sm-3"></div>
													</div>
													<div class="row">
														<div class="col-sm-4">
															<label>Mobile</label>
														</div>
														<div class="form-group col-sm-6">							        		
															<input type="text" class="form-control" name="mobile" id="mobile" autocomplete="off" />
														</div>
														<div class="col-sm-3"></div>
													</div>
													<div class="row">
														<div class="col-sm-4">
															<label>Email</label>
														</div>
														<div class="form-group col-sm-6">							        		
															<input type="email" class="form-control" name="email" id="email" autocomplete="off" />
														</div>
														<div class="col-sm-3"></div>
													</div>	
													<div class="row">
														<div class="col-sm-4">
															<label>Permanant Address</label>
														</div>
														<div class="form-group col-sm-6">							        		
															<textarea maxlength="250" class="form-control" name="permanant" id="permanant" autocomplete="off"></textarea>
														</div>
														<div class="col-sm-3"></div>
													</div>	
													<div class="row">
														<div class="col-sm-4">
															<label>Temporary Address</label>
														</div>
														<div class="form-group col-sm-6">							        		
															<textarea maxlength="250" class="form-control" name="temporary" id="temporary" autocomplete="off"></textarea>
														</div>
														<div class="col-sm-3"></div>
													</div>
													<div class="row">
														<div class="col-sm-4">
														</div>
														<div class="col-sm-3">
															<input type="submit" class="btn btn-success" value="Add" id="addBtn" />						        			
														</div>
														<div class="col-sm-3">
															<input type="reset" class="btn btn-danger" value="Reset" id="resetBtn" />
														</div>						        		
													</div>
												</form>	 
											</div>
											<div class="col-sm-2"></div>
										</div>
									</div>
								</div>
								<!-- Update -->
								<div role="tabpanel" class="tab-pane" id="update">
									<div class="container">
										<div class="row">
											<div class="col-sm-2"></div>
											<div class="col-sm-6">
												<form class="form-vertical" role="form" id="updatePersonForm">
													<p class="text-center" id="updateRes"></p>
													<?php
														$fetch = mysqli_query($con, "SELECT * FROM persons");
														if(!$fetch || mysqli_num_rows($fetch)<=0){
															echo '<h3 class="text-center font">No Records Found.</h3>';
														} else{
													?>
													<div class="row">
														<div class="col-sm-4">
															<label>Select Person</label>
														</div>
														<div class="form-group col-sm-6">							        		
															<select class="form-control" id="pemail" name="email">
																<option value=0>Choose...</option>
																<?php 	    				    		
																	while($row = mysqli_fetch_array($fetch)){
																		echo '<option value="'.$row['Email'].'">'.$row['Email'].'</option>';
																	}
																?>
															</select>
														</div>
														<div class="col-sm-3"></div>
													</div>
													<div class="row">
														<div class="col-sm-4">
															<label>First Name</label>
														</div>
														<div class="form-group col-sm-6">							        		
															<input type="text" class="form-control" name="updatefn" id="updatefn" autocomplete="off" />
														</div>
														<div class="col-sm-3"></div>
													</div>
													<div class="row">
														<div class="col-sm-4">
															<label>Last Name</label>
														</div>
														<div class="form-group col-sm-6">							        		
															<input type="text" class="form-control" name="updateln" id="updateln" autocomplete="off" />
														</div>
														<div class="col-sm-3"></div>
													</div>
													<div class="row">
														<div class="col-sm-4">
															<label>Mobile</label>
														</div>
														<div class="form-group col-sm-6">							        		
															<input type="text" class="form-control" name="updatemobile" id="updatemobile" autocomplete="off" />
														</div>
														<div class="col-sm-3"></div>
													</div>	
													<div class="row">
														<div class="col-sm-4">
															<label>Permanant Address</label>
														</div>
														<div class="form-group col-sm-6">							        		
															<textarea maxlength="250" class="form-control" name="updatepermanant" id="updatepermanant" autocomplete="off"></textarea>
														</div>
														<div class="col-sm-3"></div>
													</div>	
													<div class="row">
														<div class="col-sm-4">
															<label>Temporary Address</label>
														</div>
														<div class="form-group col-sm-6">							        		
															<textarea maxlength="250" class="form-control" name="updatetemporary" id="updatetemporary" autocomplete="off"></textarea>
														</div>
														<div class="col-sm-3"></div>
													</div>
													<div class="row">
														<div class="col-sm-4">
														</div>
														<div class="col-sm-3">
															<input type="submit" class="btn btn-success" value="Update" id="updateBtn" />						        			
														</div>
														<div class="col-sm-3">
															<input type="reset" class="btn btn-danger" value="Reset" id="resetBtn" />
														</div>						        		
													</div>
													<?php } ?>
												</form>	 
											</div>
											<div class="col-sm-2"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="../assets/js/jquery-3.1.0.min.js"></script>
		<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
		<script>
			$(document).ready(function() {
				//reset btn
				$('.btn-danger').click(function(){
					$('#res').text('');
					$('#updateRes').text('');
				});
				//add
				$('#addPersonForm').submit(function(){
					var formData = new FormData($(this)[0]);
					$.ajax({
				        url: 'tasks/add/',
				        type: 'POST',
				        data: formData,
				        async: true,
				        success: function (data){
				            $('#res').html(data);				            
				        },
				        cache: false,
				        contentType: false,
				        processData: false
				    });
					$(this)[0].reset();			
					return false;
				});  	
				//update
				//get previous data
				$('#pemail').change(function(){
					var pemail = $(this).val();
					if(pemail!=0){
						var dataString = 'email='+pemail;
						$.ajax({
					        url: 'tasks/update/fetch.php',
					        type: 'POST',
					        dataType: 'json',
					        data: dataString,
					        async: false,
					        success: function (data){
					        	var name = data[1].split(' ');
					        	var mobile = data[2];
					        	var permanant = data[4];
					        	var temporary = data[5];
					            $('#updatefn').val(name[0]);
					            $('#updateln').val(name[1]);
					            $('#updatemobile').val(mobile);
					            $('#updatepermanant').val(permanant);
					            $('#updatetemporary').val(temporary);
					        },
					    });					    
					}
					return false;
				});
				//update the data
				$('#updatePersonForm').submit(function(){
					var formData = new FormData($(this)[0]);
					$.ajax({
				        url: 'tasks/update/',
				        type: 'POST',
				        data: formData,
				        async: true,
				        success: function (data){
				            $('#updateRes').html(data);				            
				        },
				        cache: false,
				        contentType: false,
				        processData: false
				    });
					$(this)[0].reset();
					return false;
				});  	
				//delete a person
				$("button").click(function(event){
					var id = event.target.id;					
					if($.isNumeric(id)){
						if(confirm("Are sure to delete this person?")){
							$.ajax({
						        url: 'tasks/delete/',
						        type: 'POST',
						        data: 'id='+id,
						        async: false,
						        success: function (data){
									var objID = '#' + id;
									$('#deleteRes').html(data);
									$(objID).hide(500);
									setTimeout(function(){ $('#deleteRes').text(''); }, 2000);
						        },
						    });		
						}
					}
					return false;
				});
			});
		</script>
	</body>
</html>