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
        <div class="wrapper-signup">
        
        <form action="#" enctype="multipart/form-data" autocomplete="off">
            <header>Sign-up</header>
            <div class="error-text">ALL INPUT FIELDS ARE REQUIRED</div>
            <div class="details">
            <div class="name-details">
                <div class="field-inp">
            <label>First Name</label>
            <input type="text" name="first" placeholder="Enter Your First Name" required >
            </div>
            <div class="field-inp">
            <label>Last Name</label>
            <input type="text" name="second" placeholder="Enter Your Last Name" required>
            </div>
            </div>
            
            <label>Email</label>
            <input type="text" name="email" placeholder="Your Email address" required>
            
            <label>Password</label>
            <div class="input-details">
            <input type="password" name="password"  required>
            <i class="fas fa-eye"></i>
            </div>
            <label>Select Image</label>
            <input type="file" name="image" style="border:hidden;">
            </div>
            <div class="end">
            <input type="submit" name="sign" value="Continue">
            </div>
        </form>
        <div class="link">
            <br>
            <p>Already signed up? <a href="login.php">login here</a></p>
        </div>
        </div>
        <script src="show-hide.js"></script>
        <script src="sign_up.js"></script>
    </body>
</html>