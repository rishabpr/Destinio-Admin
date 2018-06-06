<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
        body{
            background-size: cover;
        }
        .login-form
        {
            margin-left: 340px;
            margin-top:60px ;
            box-shadow: 0px 0px 10px 1px grey;
            border-radius: 5px;
            padding-bottom: 20px;
            background: white;
        }
        h1
        {
            background: #007bbf;
            padding: 10px;
            text-align: center;
            color: #fff;
            border-radius: 0px 0px 10px 10px;
        }
        a{
            font-size: 16px;
        }
        a:hover
        {
            color: #39dc79;
        }
        .text-center
        {
            font-size: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <form action="loginsucc.php" method="post" class="login-form col-md-4 offset-md-4">
        <h1>LOGIN HERE</h1>

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="LOGIN" class="btn btn-primary btn-block">
        </div>
        <br>
        <a href="">SIGN-UP</a>
        <br>
        <br>
        <a href="">FORGET-PASSWORD</a>
        <div class="text-center">
            <?php
            if(isset($_REQUEST['em']))
            {
                $val=$_REQUEST['em'];
                if($val==1)
                {
                    echo "<span class='alert-success'>succeshully login</span>";

                }

                else{
                    echo  "<span class='alert-danger'>Wrong Username or Password</span>";
                }
            }
            ?>
        </div>
    </form>
</div>
</body>
</html>