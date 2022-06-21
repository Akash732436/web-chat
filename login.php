<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <title>Sign Up page</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

    </head>
    <body>
        <div class="wrapper-login">
        <form action="login.php" autocomplete="off">
            <header>Log In</header>
            <div class="error-text">ALL INPUT FIELDS ARE REQUIRED</div>
            <div class="details">
            
            <label>Email</label>
            <input type="text"  name="email" placeholder="Your Email address" required>
            
            <label>Password</label>
            <div class="input-details">
            <input type="password" name="password" required>
            <i class="fas fa-eye"></i>
            </div>
            <div class="end">
            <input type="submit" name="login" value="Continue">
            </div>
        </form>
        <div class="link">
            <br>
            <p>Don't have Account?<a href="sign_up.php">Sign-up here</a></p>
        </div>
        </div>
        <script src="show-hide.js"></script>
        <script src="login.js"></script>
    </body>
</html>