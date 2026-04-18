<?php
    const SAMPLE_CREDENTIALS = [
        [
            "username" => "admin",
            "password" => "admin",
            "role" => "admin"
        ],
        [
            "username" => "editor",
            "password" => "editor",
            "role" => "editor"
        ],
        [
            "username" => "viewer",
            "password" => "viewer",
            "role" => "viewer"
        ]
    ];

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') die();
    if (!isset($_POST['login'])) die();

    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $role = null;

    $validCredentials = false;

    foreach (SAMPLE_CREDENTIALS as $cred) {
        if ($username === $cred['username'] && $password === $cred['password']) {
            $validCredentials = true;
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
        header("location: login.php");
        exit;
    }
?>