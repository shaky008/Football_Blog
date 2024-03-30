<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mainpage</title>
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

        <!-- filter drop down menu -->
        <div class="row">
            <div class="col-md-6">
                <button type="button" class="btn btn-primary btn-md ms-5 me-3 mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#addmodal">Add Blog +</button>
            </div>
            <div class="col-md-6 text-end">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle ms-5 me-3 mt-2 mb-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown button
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <form action="controller.php" method="post">
                                <input type="hidden" name="page" value="Mainpage">
                                <input type="hidden" name="command" value="none">
                                <button class="dropdown-item" disabled type="button" id="none-btn" onclick="noneData()"><img src="assets/arrow-down.svg"></button>
                            </form>
                        </li>
                        <li>
                            <form action="controller.php" method="post">
                                <input type="hidden" name="page" value="Mainpage">
                                <input type="hidden" name="command" value="none">
                                <button class="dropdown-item" type="button" id="eng-btn" onclick="loadData()">Default</button>
                            </form>
                        </li>
                        <li>
                            <form action="controller.php" method="post">
                                <input type="hidden" name="page" value="Mainpage">
                                <input type="hidden" name="command" value="filterEng">
                                <button class="dropdown-item" type="button" id="eng-btn" onclick="filterEng()">England</button>
                            </form>
                        </li>
                        <li>
                            <form action="controller.php" method="post">
                                <input type="hidden" name="page" value="Mainpage">
                                <input type="hidden" name="command" value="filterGer">
                                <button class="dropdown-item" type="button" id="ger-btn" onclick="filterGer()">Germany </button>
                            </form>
                        </li>
                        <li>
                            <form action="controller.php" method="post">
                                <input type="hidden" name="page" value="Mainpage">
                                <input type="hidden" name="command" value="filterSpi">
                                <button class="dropdown-item" type="button" id="spi-btn" onclick="filterSpi()">Spain </button>
                            </form>
                        </li>


                    </ul>
                </div>
            </div>
        </div>


        <!-- card -->
        <div class="container">
            <div class="row" id="blogcontainer">

            </div>

            <!-- blog add modal -->
            <form action="controller.php" method="POST">
                <div class="modal fade" id="addmodal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Add blog</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->

                            <div class="modal-body">

                                <input type="hidden" name="page" value="Mainpage">
                                <input type="hidden" name="command" value="add">

                                <label class='modal-label-input' for='input-blog-title'>Title</label>
                                <input id='input-blog-title' type='text' name='title' required><br><br>

                                <!-- inline checkbox -->
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineCheckbox1" value="eng" name="option">
                                    <label class="form-check-label" for="inlineCheckbox1">England</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineCheckbox2" value="ger" name="option">
                                    <label class="form-check-label" for="inlineCheckbox2">Germany</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineCheckbox3" value="spi" name="option">
                                    <label class="form-check-label" for="inlineCheckbox3">Spain</label>
                                </div><br>

                                <label class='modal-label-input' for='input-blog-desc'>description:</label>
                                <textarea class="form-control" id='input-blog-desc' type name='description' rows="10" required></textarea>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" id="uploadBtn" class="btn btn-outline-primary">Upload</button>
                            </div>
                        </div>
                    </div>
            </form>
        </div>


    </div>
    <script>
        function noneData() {
            $.post("controller.php", {
                page: "Mainpage",
                command: "none"
            }, function(data) {
                blogs = JSON.parse(data)
                console.log(blogs)
                var $cardContainer = $("#blogcontainer");
                $cardContainer.empty();
                $.each(blogs, function(index, blog) {
                    var $card = $("<div>").addClass("col-md-4");
                    $card.html(`
                    <?php $_SESSION['blog_id'] = $_POST['blog_id']; ?>
                    <div class="card mb-4 shadow-sm" id=${blog.Blog_id}>
                        <div class="card-body">
                            <form method="post" action="controller.php">
                            <input type="hidden" name="command" value="viewBlog">
                            <input type="hidden" name="blog_id" value=${blog.Blog_id}>
                            <input type="hidden" name="page" value="Mainpage">
                            <h5 class="card-title">${blog.title}</h5>
                            <button class="btn btn-outline-primary" type="submit" id="viewBlogpageBtn">View Blog</button>
                            <button class="btn btn-outline-primary btn-sm rounded-pill" type="button" onclick="incrementRating(${blog.Blog_id})"> <img src="assets/arrow-up.svg" alt="Icon"></button>
                            <button class="btn btn-outline-primary btn-sm rounded-pill" type="button" onclick="decrementRating(${blog.Blog_id})"> <img src="assets/arrow-down.svg" alt="Icon"></button>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <div>
                                <p>Author: ${blog.name}</p>
                            </div>
                           <div>
                                <p><img src="assets/star-fill.svg"> ${blog.rating}</p>
                           </div>
                            </form>
                        </div>
                    </div>
                `);
                    $cardContainer.append($card);
                });
            });
        }

        function filterEng() {
            $.post("controller.php", {
                page: "Mainpage",
                command: "filterEng"
            }, function(data) {
                blogs = JSON.parse(data)
                console.log(blogs)
                var $cardContainer = $("#blogcontainer");
                $cardContainer.empty();
                $.each(blogs, function(index, blog) {
                    var $card = $("<div>").addClass("col-md-4");
                    $card.html(`
                    <div class="card mb-4 shadow-sm" id=${blog.Blog_id}>                        
                        <div class="card-body">
                            <form method="post" action="controller.php">
                            <input type="hidden" name="command" value="viewBlog">
                            <input type="hidden" name="blog_id" value=${blog.Blog_id}>
                            <input type="hidden" name="page" value="Mainpage">
                            <h5 class="card-title">${blog.title}</h5>
                            <button class="btn btn-outline-primary" type="submit" id="viewBlogpageBtn">View Blog</button>
                            <button class="btn btn-outline-primary btn-sm rounded-pill" type="button" onclick="incrementRating(${blog.Blog_id})"> <img src="assets/arrow-up.svg" alt="Icon"></button>
                            <button class="btn btn-outline-primary btn-sm rounded-pill" type="button" onclick="decrementRating(${blog.Blog_id})"> <img src="assets/arrow-down.svg" alt="Icon"></button>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <div>
                                <p>Author: ${blog.name}</p>
                            </div>
                           <div>
                                <p><img src="assets/star-fill.svg"> ${blog.rating}</p>
                           </div>
                            </form>
                        </div>
                    </div>
                `);
                    $cardContainer.append($card);
                });
            });

        }

        function filterGer() {
            $.post("controller.php", {
                page: "Mainpage",
                command: "filterGer"
            }, function(data) {
                blogs = JSON.parse(data)
                console.log(blogs)
                var $cardContainer = $("#blogcontainer");
                $cardContainer.empty();
                $.each(blogs, function(index, blog) {
                    var $card = $("<div>").addClass("col-md-4");
                    $card.html(`
                    <div class="card mb-4 shadow-sm" id=${blog.Blog_id}>
                        <div class="card-body">
                            <form method="post" action="controller.php">
                            <input type="hidden" name="command" value="viewBlog">
                            <input type="hidden" name="blog_id" value=${blog.Blog_id}>
                            <input type="hidden" name="page" value="Mainpage">
                            <h5 class="card-title">${blog.title}</h5>
                            <button class="btn btn-outline-primary" type="submit" id="viewBlogpageBtn">View Blog</button>
                            <button class="btn btn-outline-primary btn-sm rounded-pill" type="button" onclick="incrementRating(${blog.Blog_id})"> <img src="assets/arrow-up.svg" alt="Icon"></button>
                            <button class="btn btn-outline-primary btn-sm rounded-pill" type="button" onclick="decrementRating(${blog.Blog_id})"> <img src="assets/arrow-down.svg" alt="Icon"></button>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <div>
                                <p>Author: ${blog.name}</p>
                            </div>
                           <div>
                                <p><img src="assets/star-fill.svg"> ${blog.rating}</p>
                           </div>
                            </form>
                        </div>
                    </div>
                `);
                    $cardContainer.append($card);
                });
            });
        }

        function filterSpi() {
            $.post("controller.php", {
                page: "Mainpage",
                command: "filterSpi"
            }, function(data) {
                blogs = JSON.parse(data)
                console.log(blogs)
                var $cardContainer = $("#blogcontainer");
                $cardContainer.empty();
                $.each(blogs, function(index, blog) {
                    var $card = $("<div>").addClass("col-md-4");
                    $card.html(`
                    <div class="card mb-4 shadow-sm" id=${blog.Blog_id}>
                        <div class="card-body">
                            <form method="post" action="controller.php">
                            <input type="hidden" name="command" value="viewBlog">
                            <input type="hidden" name="blog_id" value=${blog.Blog_id}>
                            <input type="hidden" name="page" value="Mainpage">
                            <h5 class="card-title">${blog.title}</h5>
                            <button class="btn btn-outline-primary" type="submit" id="viewBlogpageBtn">View Blog</button>
                            <button class="btn btn-outline-primary btn-sm rounded-pill" type="button" onclick="incrementRating(${blog.Blog_id})"> <img src="assets/arrow-up.svg" alt="Icon"></button>
                            <button class="btn btn-outline-primary btn-sm rounded-pill" type="button" onclick="decrementRating(${blog.Blog_id})"> <img src="assets/arrow-down.svg" alt="Icon"></button>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <div>
                                <p>Author: ${blog.name}</p>
                            </div>
                           <div>
                                <p><img src="assets/star-fill.svg"> ${blog.rating}</p>
                           </div>
                            </form>
                        </div>
                    </div>
                `);
                    $cardContainer.append($card);
                });
            });
        }

        //increases the rating of a blog by 1
        function incrementRating(blog_id) {
            $.post("controller.php", {
                page: "Mainpage",
                command: "incrementRating",
                blog_id: blog_id
            }, function() {
                loadData()
            })
        }

        //decrease the rating of a blog by 1
        function decrementRating(blog_id) {
            $.post("controller.php", {
                page: "Mainpage",
                command: "decrementRating",
                blog_id: blog_id
            }, function() {
                loadData()
            })
        }

        //loads all the blogs from the database to Mainpage
        function loadData() {
            $.post("controller.php", {
                page: "Mainpage",
                command: "displayBlogs"
            }, function(data) {

                var blogs = JSON.parse(data);
                var $cardContainer = $("#blogcontainer");
                $cardContainer.empty();
                $.each(blogs, function(index, blog) {
                    var $card = $("<div>").addClass("col-md-4");
                    $card.html(`
                    <div class="card mb-4 shadow-sm" id=${blog.Blog_id}>
                        <div class="card-body">
                            <form method="post" action="controller.php">
                            <input type="hidden" name="command" value="viewBlog">
                            <input type="hidden" name="blog_id" value=${blog.Blog_id}>
                            <input type="hidden" name="page" value="Mainpage">
                            <h5 class="card-title">${blog.title}</h5>
                            <button class="btn btn-outline-primary" type="submit" id="viewBlogpageBtn">View Blog</button>
                            <button class="btn btn-outline-primary btn-sm rounded-pill" type="button" onclick="incrementRating(${blog.Blog_id})"> <img src="assets/arrow-up.svg" alt="Icon"></button>
                            <button class="btn btn-outline-primary btn-sm rounded-pill" type="button" onclick="decrementRating(${blog.Blog_id})"> <img src="assets/arrow-down.svg" alt="Icon"></button>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <div>
                                <p>Author: ${blog.name}</p>
                            </div>
                           <div>
                                <p><img src="assets/star-fill.svg"> ${blog.rating}</p>
                           </div>
                            </form>
                        </div>
                    </div>
                `);
                    $cardContainer.append($card);
                });
            });
        }

        $(document).ready(function() {
            loadData();
            //filters the cards 
            $("#search-blog").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#blogcontainer .card").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>

</html>