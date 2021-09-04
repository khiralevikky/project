<?php
  include("connection.php");
      $catid=$_POST['category'];
      $lifeid=$_POST['life'];
      // $category=$_POST['category'];
      $aname=$_POST['aname'];
	    $desc=$_POST['desc'];
      $date = date('Y-m-d h:i:s');

    if (isset($_POST['submit'])) {

       $filename = $_FILES['photoimg']['name'];
       $tempname = $_FILES["photoimg"]["tmp_name"];    
       $folder = "image/".$filename;

	     $query1="insert into submission(c_id, l_id, name, date,  description, image)
                value ('$catid','$lifeid','$aname','$date','$desc','$filename')";
          if(mysqli_query($conn,$query1))
            {  
              if (move_uploaded_file($tempname, $folder))  
               {
                  echo "<script>
                      alert('Record added Successfully');
                      window.location.href='animal.php';
                      </script>";
                // echo "record added successfully";
                }
                else{
                  echo "error....";
                    }    

             }
            else{ 
                echo "error1....";
                }
      }

?>