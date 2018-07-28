<html>
<head>
    <title>Login Panel</title>
    <link rel="shortcut icon" type="image/ico" href="../layout/images/football.ico" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body style="background-color: #6bc5e3;">
<div class="container">
<div class="row">
    <div class="col-md-12" style="padding-top:200px;">
        <div class="col-md-3"></div>
        <div class="col-md-6 ">
            <form action="login_user.php" method="post">
            <div class="panel panel-success">
                <div class="panel-heading">
                  <b>Match Prediction Login</b>
                </div>

                <div class="panel-body">

                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">UserName</span>
                            <input name="user_name" type="text" class="form-control" placeholder="Username / Email" aria-describedby="basic-addon1">
                        </div>
                      <br>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Password</span>
                            <input name="password" type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
                        </div>
                </div>
                <div class="panel-footer" >
                 <input type="submit" class="btn btn-success" value="Login" > <a href="register.php" >Register</a>
                </div>
            </form>
            </div>



    </div>
        <div class="col-md-3"></div>
</div>
</div>
</div>

</body>
</html>

