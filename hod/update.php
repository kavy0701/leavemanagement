<style>
    .register{
        background: -webkit-linear-gradient(left, #3931af, #00c6ff);
        margin-top: 3%;
        padding: 3%;
    }
    .register-left{
        text-align: center;
        color: #fff;
        margin-top: 4%;
    }
    .register-left input{
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        width: 60%;
        background: #f8f9fa;
        font-weight: bold;
        color: #383d41;
        margin-top: 30%;
        margin-bottom: 3%;
        cursor: pointer;
    }
    .register-right{
        background: #f8f9fa;
        border-top-left-radius: 10% 50%;
        border-bottom-left-radius: 10% 50%;
    }
    .register-left img{
        margin-top: 15%;
        margin-bottom: 5%;
        width: 25%;
        -webkit-animation: mover 2s infinite  alternate;
        animation: mover 1s infinite  alternate;
    }
    @-webkit-keyframes mover {
        0% { transform: translateY(0); }
        100% { transform: translateY(-20px); }
    }
    @keyframes mover {
        0% { transform: translateY(0); }
        100% { transform: translateY(-20px); }
    }
    .register-left p{
        font-weight: lighter;
        padding: 12%;
        margin-top: -9%;
    }
    .register .register-form{
        padding: 10%;
        margin-top: 10%;
    }
    .btnUpdate{
        float: right;
        margin-top: 10%;
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        background: #0062cc;
        color: #fff;
        font-weight: 600;
        width: 50%;
        cursor: pointer;
    }
    .register .nav-tabs{
        margin-top: 3%;
        border: none;
        border-radius: 1.5rem;
        width: 28%;
        float: right;
    }
    .register .nav-tabs .nav-link{
        padding: 2%;
        height: 34px;
        font-weight: 600;
        color: #fff;
        border-top-right-radius: 1.5rem;
        border-bottom-right-radius: 1.5rem;
    }
    .register .nav-tabs .nav-link:hover{
        border: none;
    }
    .register .nav-tabs .nav-link.active{
        width: 100px;
        color: #0062cc;
        border: 2px solid #0062cc;
        border-top-left-radius: 1.5rem;
        border-bottom-left-radius: 1.5rem;
    }
    .register-heading{
        text-align: center;
        margin-top: 8%;
        margin-bottom: -15%;
        color: #495057;
    }

    /*Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container register mt-5">
    <div class="row">
        <div class="col-md-3 register-left">

            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3>Welcome</h3>
            <p>Please save the details after editing</p>
                        
            </div>
            <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="javascript:history.back()" role="tab" aria-controls="home" aria-selected="true">Back</a>
                            </li>
                            
                        </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">Update Details</h3>
                              <form action="" method="POST">
                                <div class="row register-form">

                                <?php 
                                  include 'C:\xampp\htdocs\onlineleavemanagemet\connection.php';
                                  $ids = $_GET['id'];
                                  $showquery = "select * from user_register where email='$ids'";
                                  $showdata = mysqli_query($con,$showquery);
                                  $arrdata = mysqli_fetch_array($showdata);
                                  if(isset($_POST['update'])){
                                    $idupdate = $_GET['id'];
                                    $name = $_POST['name'];
                                    $email = $_POST['email'];
                                    $mobile = $_POST['mobile'];
                                    $year = $_POST['year'];
                                    $course = $_POST['course'];
                                    $post = $_POST['post'];

                                    $query = "update user_register set name='$name', email='$email',
                                              mobile='$mobile', year='$year', course='$course', post='$post'
                                              where email='$idupdate'";
                                    $res = mysqli_query($con,$query);
                                    if($res){
                                      ?>
                                      <script>
                                        alert("Updated Successfully");
                                      </script>  
                                      <?php
                                    }
                                    else{
                                      ?>
                                      <script>
                                      alert("Unable to update");
                                      </script>
                                      <?php
                                    }
                                }
                                ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $arrdata['name']; ?>" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $arrdata['email']; ?>" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="mobile" class="form-control" placeholder="Mobile No" value="<?php echo $arrdata['mobile']; ?>" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="year" class="form-control" placeholder="Year" value="<?php echo $arrdata['year']; ?>" required/> 
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="course" class="form-control" placeholder="Course" value="<?php echo $arrdata['course']; ?>" required/> 
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="post" class="form-control" placeholder="Post" value="<?php echo $arrdata['post']; ?>" required /> 
                                        </div>
                                        <input type="submit" name="update" class="btnUpdate" value="Update"/>
                                    </div>
                                </div>
                        </div>
                            
                    </div>
                </div>
                        
        </div>
    </div>

</div>
