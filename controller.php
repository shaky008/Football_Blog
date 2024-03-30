<?php
session_start();
$blog_id = "";
if (empty($_POST['page'])) {
    include('view_Homepage.php');
    exit();
}
require('modal.php');
$page = $_POST['page'];
if ($page == 'Homepage') {
    $command = $_POST['command'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    switch ($command) {
        case 'LogIn':
            if (validateUser($email, $password)) {
                $_SESSION["email"] = $email;
                $_SESSION['name'] = getName($_SESSION["email"]);
                include('view_Mainpage.php');
                exit();
            } else {
                $error_msg_email = '*wrong email or';
                $error_msg_password = '*Wrong password';
                $display_modal_login = 'show';
                include('view_Homepage.php');
                exit();
            }

        case 'Signup':
            $name = $_POST['name'];
            $_SESSION["name"] = $name;

            if (checkUser($email)) {
                $error_msg = "*user exists, use another email";
                $display_modal_signup = 'show';
                include('view_Homepage.php');
                exit();
            } else {
                insertUser($name, $email, $password);
                include("view_Homepage.php");
                exit();
            }
    }
} else if ($page == 'Mainpage') {
    $command = $_POST['command'];
    $name = $_SESSION["name"];
    $email = $_SESSION["email"];
    switch ($command) {
        case 'add':
            $title = $_POST['title'];
            $description = $_POST['description'];
            $option = $_POST['option'];
            if ($option == 'eng') {
                $eng = 1;
                $ger = 0;
                $spi = 0;
            } else if ($option == 'ger') {
                $eng = 0;
                $ger = 1;
                $spi = 0;
            } else {
                $eng = 0;
                $ger = 0;
                $spi = 1;
            }
            insertBlog($email, $name, $title, $description, $eng, $ger, $spi);
            include("view_Mainpage.php");
            exit();

        case 'displayBlogs':
            $blogs = displayBlogs();
            echo $blogs;
            exit();

        case 'viewBlog':
            $_SESSION['blog_id'] = $_POST['blog_id'];
            include('view_Blogpage.php');
            exit();

        case 'incrementRating':
            $blog_id = $_POST['blog_id'];
            incrementRating($blog_id);
            exit();

        case 'decrementRating':
            $blog_id = $_POST['blog_id'];
            decrementRating($blog_id);
            exit();

        case 'gotoProfile':
            include("view_Profilepage.php");
            exit();

        case 'gotoMainpage':
            include("view_Mainpage.php");
            exit();

        case 'filterEng':
            echo getEngland();
            exit();

        case 'filterGer':
            echo getGermany();
            exit();

        case 'filterSpi':
            echo getSpain();
            exit();
    }
} else if ($page == 'Blogpage') {
    $command = $_POST['command'];
    $blogid = $_SESSION['blog_id'];
    switch ($command) {
        case 'blogpageCmd':
            $blog = getBlog($blogid);
            echo $blog;
            exit();

        case 'gotoProfile':
            include("view_Profilepage.php");
            exit();

        case 'gotoMainpage':
            include("view_Mainpage.php");
            exit();
    }
} else if ($page == 'Profilepage') {
    $command = $_POST['command'];
    switch ($command) {
        case 'gotoProfile':
            include("view_Profilepage.php");
            exit();

        case 'gotoMainpage':
            include("view_Mainpage.php");
            exit();

        case 'logout':
            session_unset();
            session_destroy();
            include("view_Homepage.php");
            exit();

        case 'showInfo':
            $email = $_SESSION['email'];
            $usersBlog = usersBlog($email);
            $userData = userData($email);
            $data = array(
                "usersBlog" => $usersBlog,
                "userData" => $userData
            );
            echo json_encode($data);
            exit();

        case 'deleteBlog':
            $blog_id = $_POST['blog_id'];
            deleteBlog($blog_id);
            exit();

        case 'editBlog':
            $blog_id = $_POST['blog_id'];
            $blog = getBlog($blog_id);
            echo ($blog);
            exit();

        case 'updateBlog':
            $blog_id = $_POST['blog_id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $option = $_POST['option'];
            if ($option == 'eng') {
                $eng = 1;
                $ger = 0;
                $spi = 0;
            } else if ($option == 'ger') {
                $eng = 0;
                $ger = 1;
                $spi = 0;
            } else {
                $eng = 0;
                $ger = 0;
                $spi = 1;
            }
            updateBlog($title, $description, $blog_id, $eng, $ger, $spi);
            exit();

        case 'updateProfile':
            $name = $_POST['name'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            // $id = getUserId($_SESSION['email']);
            // $_SESSION['user_id'] = $id;
            updateProfile($name, $password, $email);
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $name;
            exit();

        case 'deleteUser':
            $email = $_SESSION['email'];
            deleteUser($email);
            if (deleteUser($email)) {
                include("view_Homepage.php");
                session_unset();
                session_destroy();
                exit();
            } else {
                echo "failed to redirect";
            }
            exit();
    }
}
