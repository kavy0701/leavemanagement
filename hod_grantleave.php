<?php
    session_start();

    include 'C:\xampp\htdocs\onlineleavemanagemet\connection.php';

    if(isset($_SESSION['name'])){
        $email = $_SESSION['email'];
    }else{
        header('location:hod_signin.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grant Leave</title>
    <?php include 'C:\xampp\htdocs\onlineleavemanagemet\links.php' ?>
    <?php include 'C:\xampp\htdocs\onlineleavemanagemet\hod\hod_header.php' ?>
    <style>
      <?php include 'C:\xampp\htdocs\onlineleavemanagemet\hod\hod_header.css'; ?>
      
      .backgroundimg{
        background-image: url("https://visme.co/blog/wp-content/uploads/2017/07/50-Beautiful-and-Minimalist-Presentation-Backgrounds-021.jpg");
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        height: 100vh;
        width: 100%;
        }
    </style>
</head>
<body>

    <?php
        if(isset($_POST['approve']))
        {
            $status = "Approved";
            $comment = $_POST['comment'];
            $no = $_POST['no'];

            $query = "UPDATE applied_leave set status = '$status' , comment = '$comment' where no = '$no'";
            $res = mysqli_query($con,$query);

            if($res){
                $_SESSION['success']="Leave Assigned";
            }
            else{
                echo "Not inserted";
            }
        }

        if(isset($_POST['reject']))
        {
            $status = "Rejected";
            $comment = $_POST['comment'];
            $no = $_POST['no'];

            $query = "UPDATE applied_leave set status = '$status' , comment = '$comment' where no = '$no'";
            $res = mysqli_query($con,$query);

            if($res){
                $_SESSION['success']="Leave Assigned";
            }
            else{
                echo "Not inserted";
            }
        }

    ?>
    <div class = "backgroundimg">  <!--background image-->
        <h3 class="text-center text-muted"><em>List of Applied Leaves</em></h3>
        <br>
        <?php if(isset($_SESSION['success'])){
            echo $_SESSION['success'];
            
            }
        ?>
        <div class="container">  <!--container-->
            <div class="table-responsive-sm">   <!--table-->
                <table  class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Leave Type</th>
                            <th scope="col">Duration</th>
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Reason</th>
                            <th scope="col">Status</th>
                            <th scope="col">Comment</th>
                            <th scope="col" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include 'C:\xampp\htdocs\onlineleavemanagemet\connection.php';
                            
                            $i=1;
                            $query = "select * from applied_leave";
                            $res = mysqli_query($con,$query);
                            
                            $count = mysqli_num_rows($res);

                            if($count>0)
                            {
                                while($row = mysqli_fetch_array($res))
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $row['name'];?></td>
                                        <td><?php echo $row['email'];?> </td>
                                        <td><?php echo $row['leave_type'];?> </td>
                                        <td><?php echo $row['duration'];?> </td>
                                        <td><?php echo $row['from_date'];?> </td>
                                        <td><?php echo $row['to_date'];?> </td>
                                        <td><?php echo $row['reason'];?> </td>
                                        <td style="color:green;"><?php echo $row['status'];?> </td>
                                        <td><form method="post" action=""><textarea name="comment"></textarea></td>
                                        <input type="hidden" name="no" value="<?php echo $row['no'];?>">
                                        <td><button type="submit" name="approve" class="btn btn-success">Approve</button>
                                            <button type="submit" name="reject" class="btn btn-danger">Reject</button></form></td>
                                    </tr>
                                    <?php $i++;
                                }
                            }
                            else{
                                echo "No new request";
                            }?>

                    </tbody>
                </table>
</body>
</html>











                             
