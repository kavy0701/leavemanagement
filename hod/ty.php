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
    <title>Manage User </title>
    <?php include 'C:\xampp\htdocs\onlineleavemanagemet\links.php' ?>
    <?php include 'C:\xampp\htdocs\onlineleavemanagemet\hod\hod_header.php' ?>
    <style>
      <?php include 'C:\xampp\htdocs\onlineleavemanagemet\hod\hod_header.css'; ?>
      .fa-edit{
        color:green;
    }

    .fa-trash{
        color:red;
    }

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
<div class="backgroundimg">
    <div class="container">
        <h3 class="text-center text-muted"><em>Third Year</em></h3>
        <br>
        <div class="table-responsive-sm">
        <!--table-->
        <table  class="table table-bordered text-center">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Year</th>
                    <th scope="col">Course</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
                </thead>

                <tbody>
                    <?php
                    $no=1;
                        include 'C:\xampp\htdocs\onlineleavemanagemet\connection.php';
                        $selectquery = "select * from user_register where year='ty'";
                        $query = mysqli_query($con,$selectquery);
                        $num = mysqli_num_rows($query);

                        if($num){
                            while($res = mysqli_fetch_assoc($query)){
                    ?>
                    <tr>
                            <td><?php echo $no ?> </td>
                            <td><?php echo $res['name']; ?> </td>
                            <td><?php echo $res['email']; ?> </td>
                            <td><?php echo $res['year']; ?> </td>
                            <td><?php echo $res['course']; ?> </td>
                            <td><a href="update.php?id=<?php echo $res['email'];?>" data-toggle="tooltip" data-placement="top" title="UPDATE"><i class="fas fa-edit"></i></a></td>
                            <td><a href="delete.php?id=<?php echo $res['email'];?>" data-toggle="tooltip" data-placement="top" title="DELETE"><i class="fas fa-trash"></i></a></td>
                            
                            </tr>
                            <?php $no++; ?>

                        <?php
                       }
                       
                    }
                    
                       ?>

                    
                </tbody>
        </table>
        </div>
    </div>
    <script>
        $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
</div>
</body>
</html>
