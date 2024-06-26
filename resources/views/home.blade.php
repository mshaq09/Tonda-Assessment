<!DOCTYPE html>
<html lang="en">

<head>

    <title>Dashboard Login</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon-16x16.png">
    <link rel="manifest" href="assets/images/site.webmanifest">

    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">




</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
    <div class="auth-content text-center">
        
        <div class="card borderless">
            <div class="row align-items-center ">
                <div class="col-md-12">
                    <div class="card-body">
                    <img src="assets/images/logo.jpg" alt="" class="img-fluid mb-4" style="width:100px">
                        <h5 class="mb-3 f-w-400 bold"> Recommendation System</h5>
 
                        <h8 class="mb-1 f-w-400">Signin</h8>
                        <hr>
                        @include('messages')
                        <form method="POST" action="login">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" id="Email" placeholder="Email address"
                                    name="email">
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" class="form-control" id="Password" placeholder="Password"
                                    name="password">
                            </div>

                            <button class="btn btn-block btn-primary mb-4">Signin</button>
                        </form>
                        <hr>
                        <p class="mb-2 text-muted">Forgot password? <a href="reset" class="f-w-400">Reset</a></p>

                        <p class="mb-2 text-muted"> <a href="privacy_policy" class="f-w-400">Privacy Policy</a></p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>`
<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>

<script src="assets/js/pcoded.min.js"></script>



</body>

</html>
