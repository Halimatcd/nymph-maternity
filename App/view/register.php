<? require("../controls/register.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>REGISTER</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-primary ">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="#"> THE MATERNITY SOLUTION</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="./home">HOME</a>
          </li>
          <li class="nav-item text-white">
            <a class="nav-link active text-white" href="#">ABOUT</a>
          </li>
          <li class="nav-item text-white">
            <a class="nav-link active text-white" href="#">NEWS</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container" style="margin-top: 100px; width: 650px;">
    <div class="row justify-content-center">
      <div class="col-md-6 col-offset-3">
        <h1> MATERNITY </h1>
        <div class="alert alert-danger" role="alert">
          <? echo $message; ?>
        </div>
        <form action="./registration" method="post">
          <input type="text" placeholder="username" name="username" class="form-control"> <br>
          <input type="email" placeholder="email" name="email" class="form-control"> <br>
          <input type="password" placeholder="password" name="password" class="form-control"><br>
          <input type="password" placeholder="repeatpassword" name="repeat" class="form-control"><br>
          <input type="submit" name="submit" value="register" class="btn btn-primary"> <br>
          <p> Already have an account?</P>
          <a class="btn btn-primary btn-lg" href="./login" role="button">login</a>
          <input type="button" onclick=" " value="login with google" class="btn btn-danger">
        </form>

      </div>
    </div>
  </div>
</body>

</html>