<?php
// Bilaabista Session-ka si nidaamku u xasuusnaado qofka soo galay
session_start();

$error = "";

// Hubi marka badanka la riixo (POST Method)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hubinta Username-ka iyo Password-ka aad codsatay
    if ($username === "munasar" && $password === "745611") {
        $_SESSION['user'] = $username;
        // Haddii ay sax yihiin, u radday Dashboard-ka
        header("Location: index.php");
        exit();
    } else {
        $error = "Username ama Password khaldan baa qortay saaxiib!";
    }
}
?>
<!DOCTYPE html>
<html lang="so">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Repair System</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body style="background-color: #0a192f; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">

    <div class="login-container">
        <div class="login-header">
            <i class="fa-solid fa-screwdriver-wrench"></i>
            <h2>Repair System</h2>
            <p>Fadlan iska huba xogtaada si aad u gasho</p>
        </div>

        <?php if (!empty($error)): ?>
            <div class="login-error">
                <i class="fa-solid fa-circle-exclamation"></i> <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <div class="login-group">
                <label><i class="fa-solid fa-user"></i> Magacaaga (Username)</label>
                <input type="text" name="username" placeholder=" munasar" required>
            </div>

            <div class="login-group">
                <label><i class="fa-solid fa-lock"></i> Furaha (Password)</label>
                <input type="password" name="password" placeholder=" 745611" required>
            </div>

            <button type="submit" class="login-btn-submit">
                Guri Nidaamka <i class="fa-solid fa-right-to-bracket"></i>
            </button>
        </form>
    </div>

</body>
</html>