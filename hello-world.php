<?php 

include 'db.php';

if(isset($_REQUEST['submit'])){
  $name = mysqli_real_escape_string($conn, strip_tags($_REQUEST['name']));
	$email = mysqli_real_escape_string($conn, strip_tags($_REQUEST['email']));
	$contact = mysqli_real_escape_string($conn, strip_tags($_REQUEST['contact']));
	$status = mysqli_real_escape_string($conn, strip_tags($_REQUEST['status']));
	$ins_sql = "INSERT INTO users (name, email, contact, status) VALUES ('$name', '$email', '$contact', '$status')";
	$run_sql = mysqli_query($conn, $ins_sql);
}

if(isset($_REQUEST['delete'])){
	$del_sql = "DELETE FROM users WHERE id = '$_REQUEST[id]'";
	$run_del = mysqli_query($conn, $del_sql);
}

if(isset($_REQUEST['edit'])){
  $name = mysqli_real_escape_string($conn, strip_tags($_REQUEST['name']));
	$email = mysqli_real_escape_string($conn, strip_tags($_REQUEST['email']));
	$contact = mysqli_real_escape_string($conn, strip_tags($_REQUEST['contact']));
	$status = mysqli_real_escape_string($conn, strip_tags($_REQUEST['status']));
  $edit_sql = "UPDATE users SET name = '$name', email = '$email', contact = '$contact', status = '$status' WHERE id = '$_REQUEST[id]'";
	$run_edit = mysqli_query($conn, $edit_sql);
}

// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console

$sql = "SELECT * FROM users";
$run = mysqli_query($conn, $sql);
$c = 1;
while($rows = mysqli_fetch_assoc($run)) {
    echo "<tr>
  			      <td>$rows[id]</td>
      				<td>$rows[name]</td>
      				<td>$rows[email]</td>
      				<td>$rows[contact]</td>
      				<td>$rows[status]</td>
      				<td>
            		<button class='btn btn-success' data-toggle='modal' data-backdrop='static' data-target='#edit$rows[id]'>Edit</button>
      					<button class='btn btn-danger' onclick=ajax_delete('$rows[id]');>Delete</button>
      					
      					<div class='modal fade' id='edit$rows[id]'>
      						<div class='modal-dialog'>
      							<div class='modal-content'>
      							
      								<div class='modal-header'>Edit User</div>
      								<div class='modal-body'>
      									<form onsubmit='return ajax_edit($rows[id]);' id='edit_form$rows[id]'>
      										<div class='form-group'>
      											<label>Name</label>
      											<input type='text' value='$rows[name]' id='name$rows[id]' class='form-control' required>
      										</div>
      										<div class='form-group'>
      											<label>Email</label>
      											<input type='text' value='$rows[email]' id='email$rows[id]' class='form-control' required>
      										</div>
      										<div class='form-group'>
      											<label>Contact Number</label>
      											<input type='text' value='$rows[contact]' id='contact$rows[id]' class='form-control' required>
      										</div>
      										<div class='form-group'>
      											<label>Notes</label>
      											<textarea id='status$rows[id]' class='form-control'>$rows[status]</textarea>
      										</div>
      										<div class='form-group'>
      										<button class='btn btn-info btn-block btn-lg'>Done Editing</button>
      									</div>
      									</form>
      								</div>
      								<div class='modal-footer'>
      									<div class='text-right'>
      										<button class='btn btn-danger' data-dismiss='modal'>Close</button>
      									</div>
      								</div>
      							</div>
      						</div>
      					</div>
  		 				</td>
				  </tr>

              
              ";
    $c++;
    
}



?>