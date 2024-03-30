<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div>
        <!-- nav bar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <!-- Form for "Home" button -->
                        <form method="post" action="controller.php">
                            <input type="hidden" name="page" value="Blogpage">
                            <input type="hidden" name="command" value="gotoMainpage">
                            <li class="nav-item">
                                <button class="btn bg-transparent" type="submit">Home</button>
                            </li>
                        </form>
                        <!-- Form for "Profile" button -->
                        <form method="post" action="controller.php">
                            <input type="hidden" name="page" value="Blogpage">
                            <input type="hidden" name="command" value="gotoProfile">
                            <li class="nav-item">
                                <button class="btn bg-transparent" type="submit">Profile</button>
                            </li>
                        </form>
                    </ul>
                    <form class="d-flex">
                        <input id="search-blog" class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
                        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
                    </form>
                </div>
            </div>
        </nav>
        <h1>Blogpage</h1>

        <form action="controller.php" method="POST">
            <input type='hidden' name='page' value='Blogpage'>
            <input type='hidden' name='command' value='blogpageCmd'>
        </form>
        <div id="blogContainer">

        </div>
    </div>


    <script>
        function loadBlogData() {
            $.post("controller.php", {
                page: "Blogpage",
                command: "blogpageCmd",
                blog_id: <?php echo $_POST['blog_id']; ?>

            }, function(data) {
                var blog = JSON.parse(data);
                var $cardContainer = $("#blogContainer");
                console.log(blog)
                $cardContainer.empty();
                $cardContainer.html(`
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">${blog[0].title}</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">${blog[0].description}</p>
                    </div>
                    <div class="card-footer">
                        <span class="badge bg-primary">Author: ${blog[0].name}</span>
                        <span class="badge bg-primary">Rating: ${blog[0].rating}</span>
                        <span class="badge bg-primary">Email: ${blog[0].email}</span>
                    </div>
                </div>  
                `)
            })

        }

        $(document).ready(function() {
            loadBlogData()
        })
        console.log(<?php echo $_SESSION['blog_id']; ?>)
    </script>
</body>

</html>