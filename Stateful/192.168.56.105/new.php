<?php
 
 // creates the new record form

 function renderForm($name, $email, $type, $error)
 {
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>New Record</title>
 </head>
 <body>
 <?php 
 // if there are any errors, display them
 if ($error != '')
 {
 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 
 <form action="" method="post">
 <div>
 <strong>Name : </strong> <input type="text" name="name" value="<?php echo $name; ?>" /><br/>
 <strong>Email : </strong> <input type="text" name="email" value="<?php echo $email; ?>" /><br/>
 <strong> Select Type :<strong> 
 <select id="Type" name="type" value="<?php echo $email; ?>">
                        <option value=""><strong>- Choose -</strong></option>
                        <option value="Student">Student</option>
                        <option value="Professor">Professor</option>
                        <option value="Other">Other</option>
                  </select>
 <br/>
 <input type="submit" name="submit" value="Submit">
 </div>
 </form> 
 </body>
 </html>
 <?php 
 }
 
 
 

 // connect to the database
 include('connect-db.php');
 
 // check if the form has been submitted. If it has, start to process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // get form data, making sure it is valid
 $name = mysql_real_escape_string(htmlspecialchars($_POST['name']));
 $email = mysql_real_escape_string(htmlspecialchars($_POST['email']));
 $type = mysql_real_escape_string(htmlspecialchars($_POST['type']));

 // check to make sure both fields are entered
 if ($name == '' || $email == ''|| $type == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 // if either field is blank, display the form again
 renderForm($name, $email, $type, $error);
 }
 else
 {
 // save the data to the database
 mysql_query("INSERT contacts_table SET ContactName='$name', ContactEmail='$email', ContactType='$type'")
 or die(mysql_error()); 
 
 // once saved, redirect back to the view page
 header("Location: index.php"); 
 }
 }
 else
 // if the form hasn't been submitted, display the form
 {
 renderForm('','','','');
 }
?>