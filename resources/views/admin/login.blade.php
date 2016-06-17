<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Travelog | Admin </title>

    {!! HTML::style('assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css') !!}
    {!! HTML::style('assets/admin/vendors/font-awesome/css/font-awesome.min.css') !!}
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    {!! HTML::style('assets/admin/build/css/custom.min.css') !!}
    
    <style type="text/css">
        .login-btn { background-color: #ff4a00; border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 18px;
        font-weight: bold; }
        
        .login_form {
            border:1px solid #CCC; padding: 20px 20px 20px 20px;-webkit-box-shadow: 10px 10px 5px 0px rgba(255,74,0,1);
-moz-box-shadow: 10px 10px 5px 0px rgba(255,74,0,1);
box-shadow: 10px 10px 5px 0px rgba(255,74,0,1);
        }
    </style>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            {!! Form::open(['url' => 'admin','role' => 'form']) !!}
            {!! csrf_field() !!}
             {{ HTML::image('assets/Logo.png', 'Travelog',array('height' => '70')) }}
             <br><br>
              <div>
                  <input type="email" name="email" class="form-control" placeholder="Enter Email" required />
              </div>
              <div>
                  <input type="password" name="password" class="form-control" placeholder="Enter Password" required />
              </div>
              <div>
                <!--<a class="btn login-btn btn-block btn-lg submit" href="index.html">Log in</a>-->
                <input type="submit" name="submit" value="Login" class="btn login-btn btn-lg">
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              
            </form>
          </section>
        </div>

        
      </div>
    </div>
  </body>
</html>