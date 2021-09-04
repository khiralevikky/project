<?php  
    include_once("connection.php");  
?>
<!DOCTYPE html>
<html lang="en">
<head>  
  <link rel="stylesheet" href="style.css">  
  <style>  
          input[type=text], select{
                width: 15%;
                padding: 8px 20px;
                border-radius: 4px;

            }

  </style>
</head>
<body class="body"> 
   <div style="width: 100%; float: left;">
      <div class="card">
        <div class="cardhead">
            <h3 style="margin-left: 20px;">Search</h3>
        </div>
        <form action="animal2.php" method="POST" enctype="multipart/form-data">
        <div class="cardbody">
            <b>Category:-</b>
                <?php
                  $query = "SELECT * FROM category";
                  $query_run = mysqli_query($conn, $query);
                  while ($row = mysqli_fetch_assoc($query_run))
                    {
                      $id = $row['c_id'];
                      $category = $row['c_name']; ?>
                      <input class="li1" type="radio"  name="category" value=<?php echo $row['c_id']; ?> required><?php echo $category ?>
                    <?php } ?><br><br>
          <b>Life expectancy:</b> <select   name="life">
                                <option value="0">- Select -</option>
                                <?php
                                    $query = "SELECT * FROM life";
                                    $query_run = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_assoc($query_run))
                                    {
                                        $id = $row['l_id'];
                                        $exp = $row['l_exp'];
                                        echo "<option value='".$id."'>".$exp."</option>";
                                    }?>
                                    </select>
                                  <button  type="submit" class="data" name="submit" value='.$id.' >search</button>
          </div>
        </form>
      </div>
    </div>

 
<div style="margin-left:100px;">
<?php
   
  if(isset($_POST['submit']))
  {
     $id1=$_POST['category'];
     $id2=$_POST['life'];

     // if($category != "" || $life != "")
     // {
      $query="SELECT * FROM submission 
      inner JOIN category on category.c_id = submission.c_id 
      inner JOIN life on life.l_id = submission.l_id where submission.c_id='$id1' and submission.l_id='$id2' ORDER BY date and name";
     
      $data=mysqli_query($conn,$query)or die('error');
        if(mysqli_num_rows($data) > 0)
        {
            while($row = mysqli_fetch_assoc($data))
            {
            ?>

            <div class="card1">
                <div class="cardhead">
                   <h4 style="margin-left: 20px;"><?php echo $row['name'] ?>
                   <span style="float:right"> Post Date:-<?php echo $row['date'] ?></span></h4>
                </div>
                <div style="float:left; width:25%;  padding:20px;">
                  <?php  echo "<img height='100' width='100' src='image/".$row['image']."' >";?>
                   <!--  <img src="" style="height:100px; width:100px;"><br> -->
                </div>
                <div style="float:left; width:50%; padding-top:20px;">
                  <b> Name </b> :- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <span><?php echo $row['name'] ?></span><br>
                  <b> Category </b> :- &nbsp;&nbsp;&nbsp;<span><?php echo $row['c_name'] ?></span><br>
                  <b> Life </b> :-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><?php echo $row['l_exp']; ?></span><br>
                  <b> description </b> :-<span><?php echo $row['description'] ?></span>
                </div>
            </div>
    <?php

            }
        }

        else
        {

          ?>

          <div class="card1">
              <div class="cardhead">
                <h3>Search correct Id</h3>
              </div>
          
          <?php
            echo "record not found";
          ?>
          </div>
          <?php

        }
     }
  

?>
</div>



</body>
</html>

