

<!DOCTYPE html>
<html>
    <head>
      <title>Ajax with JS</title>
            <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            
            function ajax_rush(){
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                        
                        document.getElementById('get_data').innerHTML = xmlhttp.responseText;
                        
                    }
                }
                
                xmlhttp.open('GET', 'hello-world.php', true);
                xmlhttp.send();
            }            
            
            function ajax_submit(){
              
                var user_form = document.getElementById('user_form'); 
                
                var name = document.getElementById('name').value,
                email = document.getElementById('email').value,
                contact = document.getElementById('contact').value,
                status = document.getElementById('status').value;
                
                xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                        
                        document.getElementById('get_data').innerHTML = xmlhttp.responseText;
                        
                    }
                }
                
                xmlhttp.open('GET', 'hello-world.php?submit=yes&name='+name+'&email='+email+'&contact='+contact+'&status='+status, true);
                xmlhttp.send();
                $('#add_user').modal('hide');
                user_form.reset();
                return false;
            }
            
         
            
            function ajax_delete(id){
              
                xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                        
                        document.getElementById('get_data').innerHTML = xmlhttp.responseText;
                        
                    }
                }
              
              xmlhttp.open('GET', 'hello-world.php?delete=yes&id='+id, true);id
              xmlhttp.send();
              
            }
            
             function ajax_edit(e_id){
              
              var edit_form = document.getElementById('edit_form'+e_id);
               	
          		var e_name = document.getElementById('name'+e_id).value,
        					e_email = document.getElementById('email'+e_id).value,
        					e_contact = document.getElementById('contact'+e_id).value,
        					e_status = document.getElementById('status'+e_id).value;

      				 	xmlhttp.open('GET', 'hello-world.php?edit=yes&id='+e_id+'&name='+e_name+'&email='+e_email+'&contact='+e_contact+'&status='+e_status, true);
      				 	xmlhttp.send();
      					
              					
              	$('#edit'+e_id).modal('hide');
            		return false;	
            		edit_form.reset();
         	}
  </script>
  <body onload="ajax_rush();">
      <div class="container">
          <h2>Create User</h2>
          <!-- Trigger the modal with a button -->
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-backdrop="static" data-target="#add_user">Add User</button>
        
          <!-- Modal -->
          <div class="modal fade" id="add_user" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Create User</h4>
                </div>
                 <div class="modal-body">
                              <form onsubmit="return ajax_submit();" id="user_form">
                              <div class="form-group">
                                <label for="name">Name</label>
                                  <input type="text" class="form-control"
                                  id="name" placeholder="Enter Name" required/>
                              </div>                      
                              <div class="form-group">
                                <label for="email">Email address</label>
                                  <input type="email" class="form-control"
                                  id="email" placeholder="Enter Email" required/>
                              </div>
                              <div class="form-group">
                                <label for="contact">Contact</label>
                                  <input type="text" class="form-control"
                                  id="contact" placeholder="Enter Number" required/>
                              </div>
                              <div class="form-group">
                                <label for="status">Status</label>
                                  <textarea class="form-control"
                                  id="status" placeholder="Enter Status" required></textarea>
                              </div>
                              <button type="submit" class="btn btn-info btn-block btn-lg">Create</button>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
              </div>
              
            </div>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>name</th>
                <th>Email</th>
                <th>contact</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id = "get_data">

            </tbody>
          </table>
      </div>
    </body>
</html>
