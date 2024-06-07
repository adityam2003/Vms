<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="img/logo/logo.jpg" type="image/jpg">
<link rel="stylesheet" type="text/css" href="style.css">
<h1>Visitor Management System</h1>
<br>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visiting management system |login</title>
    
</head>
<body>
    <form action="login.php" method="post">
        <h2> Log-In </h2>
        <?php if(isset($_GET['error'])) { ?>
          <p class="error"> <?php echo $_GET['error']; ?> </p>
        <?php } ?>
        <label>User Name</label>
        <input type="text" name="uname" placeholder="Enter Your User Name"><br>
        <label>Password</label>
        <input type="password" name="password" placeholder="Password"><br>

        <button type="submit">Log-In</button>
    </form>
    
</body>
</html>