<?php
$conn = mysqli_connect("localhost", "w3ushakya", "w3ushakya136", "C354_w3ushakya");
//inserts users information into the database
function insertUser($name, $email, $password)
{
    global $conn;
    $date = date("ymd");
    $sql = "INSERT INTO Users VALUE (NULL, '$name', '$password', '$email',$date)";
    $result = mysqli_query($conn, $sql);
    return $result;
}

//returns true if selected users email matches in database
function checkUser($email)
{
    global $conn;
    $sql = "SELECT EMAIL FROM Users WHERE (EMAIL = '$email')";
    $result = mysqli_query($conn, $sql);
    return (mysqli_num_rows($result) > 0);
}

function validateUser($email, $password)
{
    global $conn;
    $sql = "SELECT EMAIL, PASSWORD FROM Users WHERE(EMAIL = '$email' AND PASSWORD = '$password') ";
    $result = mysqli_query($conn, $sql);
    return (mysqli_num_rows($result) > 0);
}

function insertBlog($email, $name, $title, $description, $eng, $ger, $spi)
{
    global $conn;

    $sql = "INSERT INTO Blogs VALUE (null,'$email','$name','$title','$description','$eng','$ger','$spi', 0)";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        // Query failed, handle the error
        echo "Error: could not reach database";
    }
    return $result;
}

//display all the Blogs
function displayBlogs()
{
    global $conn;
    $sql = "SELECT * from Blogs;";
    $result = mysqli_query($conn, $sql);
    $rows = [];
    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        $rows[$i] = mysqli_fetch_assoc($result);
    }
    return json_encode($rows);
}

//return name from user table if gmail matches
function getName($email)
{
    global $conn;
    $sql = "SELECT NAME from Users where(EMAIL = '$email');";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0 || mysqli_num_rows($result) < 2) {
        $row = mysqli_fetch_assoc($result);
        return $row['NAME'];
    } else {
        echo "no result found";
    }
}

//gets all blog information of selected user
function getBlog($blog_id)
{
    global $conn;
    $sql = "SELECT * FROM Blogs WHERE(blog_id ='$blog_id' )";
    $result = mysqli_query($conn, $sql);
    $rows = [];
    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        $rows[$i] = mysqli_fetch_assoc($result);
    }
    return json_encode($rows);
}

//decrement rating by 1 if selected
function incrementRating($blog_id)
{
    global $conn;
    $sql = "UPDATE Blogs SET rating = rating + 1 WHERE( Blog_id = '$blog_id')";
    $result = mysqli_query($conn, $sql);
    return $result;
}

//decrement rating by 1 if selected
function decrementRating($blog_id)
{
    global $conn;
    $sql = "UPDATE Blogs SET rating = rating - 1 WHERE( Blog_id = '$blog_id')";
    $result = mysqli_query($conn, $sql);
    return $result;
}

//show all blogs made by current user
function usersBlog($email)
{
    global $conn;
    $sql = "SELECT * FROM Blogs WHERE(email = '$email')";
    $result = mysqli_query($conn, $sql);
    $rows = [];
    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        $rows[$i] = mysqli_fetch_assoc($result);
    }
    return json_encode($rows);
}

//returns users all information
function userData($email)
{
    global $conn;
    $sql = "SELECT * FROM Users WHERE(EMAIL = '$email')";
    $result = mysqli_query($conn, $sql);
    $rows = [];
    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        $rows[$i] = mysqli_fetch_assoc($result);
    }
    return json_encode($rows);
}

//delete selected blog
function deleteBlog($blog_id)
{
    global $conn;
    $sql = "DELETE FROM Blogs WHERE(blog_id = '$blog_id')";
    $result = mysqli_query($conn, $sql);
    return $result;
}

//deletes user and all its data
function deleteUser($email)
{
    global $conn;
    $s = "SELECT * FROM Blogs WHERE (email = '$email')";
    $sq = mysqli_query($conn, $s);
    if (mysqli_num_rows($sq) > 0) {
        $sql = "DELETE FROM Blogs WHERE(email = '$email')";
        $result = mysqli_query($conn, $sql);
    }
    $sql2 = "DELETE FROM Users WHERE(EMAIL = '$email')";
    $result2 = mysqli_query($conn, $sql2);
    return $result2;
}

//update selected blog
function updateBlog($title, $description, $blog_id, $eng, $ger, $spi)
{
    global $conn;
    $sql = "UPDATE Blogs SET title = '$title', description = '$description', eng = '$eng', ger = '$ger', spi = '$spi' WHERE(Blog_id = '$blog_id')";
    $result = mysqli_query($conn, $sql);
    return $result;
}

//updates profile information to both Blogs and Users table
function updateProfile($name, $password, $email)
{
    global $conn;
    $sessionEmail = $_SESSION['email'];
    $sql = "UPDATE Users SET NAME = '$name', PASSWORD = '$password', EMAIL = '$email' WHERE  EMAIL= '$sessionEmail'";
    $sql2 = "UPDATE Blogs SET name = '$name', email = '$email' WHERE  email = '$sessionEmail'";
    $result = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql2);
}

//returns the user_id
function getUserId($email)
{
    global $conn;
    $sql = "SELECT ID FROM Users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['ID'];
    } else {
        echo "no result found";
    }
}

function getEngland()
{
    global $conn;
    $sql = "SELECT * FROM Blogs WHERE eng = 1";
    $result = mysqli_query($conn, $sql);
    $rows = [];
    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        $rows[$i] = mysqli_fetch_assoc($result);
    }
    return json_encode($rows);
}

function getGermany()
{
    global $conn;
    $sql = "SELECT * FROM Blogs WHERE ger = 1";
    $result = mysqli_query($conn, $sql);
    $rows = [];
    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        $rows[$i] = mysqli_fetch_assoc($result);
    }
    return json_encode($rows);
}
function getSpain()
{
    global $conn;
    $sql = "SELECT * FROM Blogs WHERE spi = 1";
    $result = mysqli_query($conn, $sql);
    $rows = [];
    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        $rows[$i] = mysqli_fetch_assoc($result);
    }
    return json_encode($rows);
}
