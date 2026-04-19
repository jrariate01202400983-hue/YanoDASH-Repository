<?php
    require_once 'sample_credentials.php';

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') die();
    if (!isset($_POST['login'])) die();

    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $role = null;

    $validCredentials = false;

    foreach (SAMPLE_CREDENTIALS as $cred) {
        $identifiersMatch = $username === $cred['username'] || $username === $cred['email'];
        $passwordsMatch = $password === $cred['password'];

        if ($identifiersMatch && $passwordsMatch) {
            $validCredentials = true;
            $username = $cred['username'];
            $role = $cred['role'];
            break;
        }
    }

    if ($validCredentials) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        header("location: /yanodash-repository/");
    } else {
        session_start();
        $_SESSION['errorMsg'] = "Incorrect credentials.";
        header("location: login.php");
        exit;
    }
?>