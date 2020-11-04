 




 	                 <?php
 					 
 $connection   = new MySQLi('localhost','root','','school_erp12');

 	if(isset($_POST['importSubmit'])){
 	    
 	    //validate whether uploaded file is a csv file
 	    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
 	    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
 	        if(is_uploaded_file($_FILES['file']['tmp_name'])){
 	            
 	            //open uploaded csv file with read only mode
 	            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
 	            
 	            //skip first line
 	            fgetcsv($csvFile);
 	            $temp_img = "dummy_student.jpg";
 	            //parse data from csv file line by line
 	            while(($line = fgetcsv($csvFile)) !== FALSE){
 	              
 	    


                  $adm_no = $line[0];
                  $enroll_no = $line[1];
                  $student_name = $line[2];
                  $father_name = $line[3];
                  $mother_name = $line[4];
                  $student_house = $line[5];
                  $dob = $line[6];
                  $address = $line[7];
                  $name_and_address_of_gardian = $line[8];
                  $category = $line[9];
                  $cast = $line[10];
                  $gender = $line[11];
                  $aadhar = $line[12];
                  $name_of_previous_school = $line[13];
                  $previous_class = $line[14];
                  $conduct = $line[15];
                   $father_occuption = $line[16];
                  $date_of_admission = $line[17];
                  $student_class = $line[18];
                  $roll_no = $line[19];
                   $student_section = $line[20];
                  $academic_year = $line[21];
                   $remark = $line[22];
                    $phone_number = $line[23];
                    $supporting_document = $line[24];
                     $religion = $line[25];
                  


                 $sqlg = "INSERT INTO ep_students(an,rln,sn,cls,sec,house_name,cast,gen,dob,apr,phone_number,fn,mn,dom,religion,cat,aan,en,nag,img,sp,nops,ps,con,ay,ay1,rem)VALUES('$adm_no','$roll_no','$student_name','$student_class','$student_section','$student_house','$cast','$gender','$dob', '$address','$phone_number', '$father_name', '$mother_name', '$date_of_admission', '$religion', '$category', '$aadhar', '$enroll_no', '$name_and_address_of_gardian', ' ', '$supporting_document', '$name_of_previous_school', '$previous_class', '$conduct', '$academic_year', '', '$remark' )"; 
      $connection->query($sqlg);
     


 	 echo $connection->error;
 	                
 	                 
 	                //this would only executed when increased price set
 	               // increased price adding




 	                  
 	            }
 	           
 			    ?>
 	                     <div class="" style=" font-weight:bold;">
 	                         <strong>
 	                            CSV Uploaded .!!!!
 	                         </strong>
 	                     </div>
 	                   <?php
 	                
 			    
 	            //close opened csv file
 	            fclose($csvFile);

 	            $qstring = '?status=succ';
 	        }else{
 	            $qstring = '?status=err';
 	        }
 	    }else{
 	        $qstring = '?status=invalid_file';
 	    }
 	}
 	//
 					    
 					  ?>





 <form method="post" action="" enctype="multipart/form-data">
      <input type="file" name="file" required>
      <button type="submit" class="btn mbtn"  name="importSubmit" value="IMPORT">
        <i class="fa fa-upload	"></i>    
      </button>
       </form>   