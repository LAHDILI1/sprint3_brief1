<?php 


session_start();
?>

<h2>Login</h2>
<!-- TODO: Add login form with input fields for username and password -->
<!-- Add Bootstrap form classes as needed -->
<form method="post" action="../../controllers/auth/login.php">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" name="username" id="username" required>
        <span style="color: red;"><?php if(!empty($_SESSION["Username_error"])) echo $_SESSION["Username_error"]; ?> </span>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" id="password" required>
        <span style="color: red;"><?php if(!empty($_SESSION["passwords_error"])) echo $_SESSION["passwords_error"]; ?> </span>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Login</button>
</form>

<?php include __DIR__.'/../layouts/footer.php'; 

// remove all session variables
session_unset();

// destroy the session
session_destroy();

?>
