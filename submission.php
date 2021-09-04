<?php  
    include_once("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <style>
        input[type=text],textarea,  select{
        width: 90%;
        display: inline-block;
        padding: 12px 20px;
        border-radius: 4px;
            }
    </style>
</head>
<body class="bodysub">  
    <div class="head">
        <div class="header">
             <center><h2>Enter Animal Details:-</h2></center>
        </div><br>
        <form action="insert.php" method="POST" enctype="multipart/form-data">
            <b>Name of the animal:- </b>
            <input type="text" name="aname"  placeholder="Enter Your animal name" required><br><br>
            <b>Category:- </b>
                <?php
                     $query = "SELECT * FROM category";
                     $query_run = mysqli_query($conn, $query);
                     while ($row = mysqli_fetch_assoc($query_run))
                        {
                            $id = $row['c_id'];
                            $category = $row['c_name']; ?>
                            <input type="radio" name="category" value=<?php echo $row['c_id']; ?>><?php echo $category ?> 
                  <?php }  ?><br><br>
            <b>Life expectancy:-</b><select type="text"   name="life">
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
                                </select><br><br>
            <b>Description:- </b><textarea name="desc" placeholder="Enter Your animal discription"></textarea><br><br>
            <b> Image:- </b><input type="file" name="photoimg" id="photoimg" multiple><br><br>
            <b> Captcha:- 7 + 3 </b><input type="text" name="captcha"><br><br>
            <input type="submit" class="button" value="submit" name="submit"> <br>
        </form>
    </div>
</body>
</html>