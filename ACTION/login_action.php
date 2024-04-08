<?php

session_start();

include('../SETTINGS/connection.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['loginButton'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM People WHERE Username = ?";

    if ($stmt = $connection->prepare($query)) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['passwd'])) {
                session_regenerate_id();
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $user['UserID'];
                header("Location: ../ADMIN/home.php");
                exit;
            } else {
                header("Location: ../LOGIN/login.php?error=invalidcredentials");
                exit;
            }
        } else {
            header("Location: ../LOGIN/login.php?error=usernotfound");
            exit;
        }
        $stmt->close();
    }
    $connection->close();
} else {
    echo "Please login to continue.";
    exit;
}
?>
