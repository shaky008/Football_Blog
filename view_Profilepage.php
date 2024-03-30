<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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

        <form action="controller.php" method="POST">
            <input type="hidden" name="page" value="Profilepage">
            <input type="hidden" name="command" value="logout">
            <button class="btn btn-outline-primary" type="submit">Logout</button>
        </form>
        <form action="controller.php" method="POST">
            <input type="hidden" name="page" value="Profilepage">
            <input type="hidden" name="command" value="showInfo">
        </form>
        <h3>Profile</h3>
        <div id="userData"></div>
        <h3>Blogs</h3>
        <div id="usersBlog"></div>

        <!-- update profile modal -->
        <div class="modal fade" id="update-profile">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">update Profile</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form method='post' action='controller.php'>
                            <input type="hidden" name="page" value="Profilepage">
                            <input type="hidden" name="command" value="updateProfile">
                            <input type="hidden" name="user_id" id="input-profile-id" ;">
                            <label class='modal-label-input' for='input-profile-name'>Name:</label>
                            <input class="form-control" id='input-profile-name' type='text' name='name' required><br><br>
                            <label class='modal-label-input' for='input-profile-email'>Email:</label>
                            <input class="form-control" id='input-profile-email' type='text' name='email' required><br><br>
                            <label class='modal-signup-input' for='input-profile-password'>Password:</label>
                            <input class="form-control" id='input-profile-password' type='password' name='password' required><br>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="updateProfileBtn" class="btn btn-outline-primary" onclick="updateProfile()">Update</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- delete user Modal  -->

        <div class="modal fade" id="deleteModal">
            <form method='post' action='controller.php'>
                <input type="hidden" name="page" value="Profilepage">
                <input type="hidden" name="command" value="deleteUser">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete your Profile and Blogs?.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </div>
                    </div>
                </div>
        </div>
        </form>

        <!-- update blog modal -->
        <form action="controller.php" method="POST">
            <div class="modal fade" id="editModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Edit blog</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->

                        <div class="modal-body">

                            <input type="hidden" name="page" value="Profilepage">
                            <input type="hidden" name="command" value="updateBlog">
                            <input type="hidden" id="input-blog-id" name="blog_id">

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
                            <button type="button" id="uploadBtn" class="btn btn-outline-primary" onclick="updateBlog()">Update</button>
        </form>
    </div>
    </div>
    <script>
        //deletes the clicked blog
        function deleteBlog(blog_id) {
            $.post("controller.php", {
                page: "Profilepage",
                command: "deleteBlog",
                blog_id: blog_id
            }, function() {

                toProfile();
            })
        }

        //displays, updates the screen of Profilepage
        function toProfile() {
            var email = "<?php echo $_SESSION['email']; ?>";
            $.post("controller.php", {
                page: "Profilepage",
                command: "showInfo",
                email: email
            }, function(data) {
                info = JSON.parse(data);
                var usersBlog = JSON.parse(info.usersBlog);
                var userData = JSON.parse(info.userData);

                var blogTableRows = "<table class='table table-bordered'>";
                blogTableRows += "<thead class='thead-dark'><tr><th>Blog ID</th><th>Title</th><th>Rating</th><th>Eng</th><th>Ger</th><th>Spi</th><th>Action</th></tr></thead><tbody>";

                //creates table with all blogs created by the user
                $.each(usersBlog, function(index, blog) {
                    blogTableRows += "<tr>";
                    blogTableRows += `<form method="post" action="controller.php">`;
                    blogTableRows += `<input type="hidden" name="page" value="Profilepage">`;
                    blogTableRows += `<input type="hidden" name="command" value="deleteBlog">`;
                    blogTableRows += `<input type="hidden" name="command" value="editBlog">`;
                    blogTableRows += `<td>${blog.Blog_id}</td>`;
                    blogTableRows += `<td>${blog.title}</td>`;
                    blogTableRows += `<td>${blog.rating}</td>`;
                    blogTableRows += `<td>${blog.eng}</td>`;
                    blogTableRows += `<td>${blog.ger}</td>`;
                    blogTableRows += `<td>${blog.spi}</td>`;
                    blogTableRows += `<td><button class="btn btn-outline-primary btn-sm rounded-pill " type="button" onclick="deleteBlog(${blog.Blog_id})">delete</button>`
                    blogTableRows += `<button class="btn btn-outline-primary btn-sm rounded-pill ms-2" type="button" data-bs-toggle="modal" data-bs-target="#editModal" onclick="loadBlogData(${blog.Blog_id})">edit</button></td>`
                    blogTableRows += "</tr>";
                    blogTableRows += "</form>";
                });
                blogTableRows += '</tbody></table>';

                //creates table filled with Users informaion
                var userTableRows = "<table class='table table-bordered'>";
                userTableRows += "<thead class='thead-dark'><tr><th>ID</th><th>NAME</th><th>PASSWORD</th><th>EMAIL</th><th>Action</th></tr></thead><tbody>";
                $.each(userData, function(index, user) {
                    userTableRows += "<tr>";
                    userTableRows += `<td>${user.ID}</td>`;
                    userTableRows += `<td>${user.NAME}</td>`;
                    userTableRows += `<td>${user.PASSWORD}</td>`;
                    userTableRows += `<td>${user.EMAIL}</td>`;
                    userTableRows += `<td><button class="btn btn-outline-primary btn-sm rounded-pill " type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" >delete</button>`
                    userTableRows += `<button class="btn btn-outline-primary btn-sm rounded-pill ms-2" type="button" data-bs-toggle="modal" data-bs-target="#update-profile">edit</button></td>`
                    userTableRows += "</tr>";
                });
                userTableRows += '</tbody></table>';

                $("#usersBlog").html(blogTableRows);
                $("#userData").html(userTableRows);

            })
        }

        //loads selected data to modal 
        function loadBlogData(blog_id) {
            $.post("controller.php", {
                page: "Profilepage",
                command: "editBlog",
                blog_id: blog_id

            }, function(data) {
                var blog = JSON.parse(data);
                console.log(blog)
                $("#input-blog-id").val(blog_id);
                $("#input-blog-title").val(blog[0].title)
                $("#input-blog-desc").val(blog[0].description)
                $("#inlineCheckbox1").prop("checked", blog[0].eng == "1");
                $("#inlineCheckbox2").prop("checked", blog[0].ger == "1");
                $("#inlineCheckbox3").prop("checked", blog[0].spi == "1");

            })
        }

        function updateBlog() {
            // Get the values from the input fields
            var title = $("#input-blog-title").val();
            var description = $("#input-blog-desc").val();
            var option = $("input[name='option']:checked").val();
            var blog_id = $("#input-blog-id").val();

            // Send the POST request
            $.post("controller.php", {
                page: "Profilepage",
                command: "updateBlog",
                blog_id: blog_id,
                title: title,
                description: description,
                option: option
            }, function(data) {
                console.log(blog_id);
                $("#editModal").modal('hide');
                // Reload the profile data after updating the blog
                toProfile();
            });
        }

        function updateProfile() {
            var name = $("#input-profile-name").val()
            var password = $("#input-profile-password").val()
            var email = $("#input-profile-email").val()
            // var id = $("#input-profile-id").val()
            $.post("controller.php", {
                page: 'Profilepage',
                command: 'updateProfile',
                name: name,
                password: password,
                email: email,
                // user_id: id
            }, function() {
                // console.log(id)
                $("#update-profile").modal('hide');
                // Reload the profile data after updating the profile
                toProfile();
            })
        }

        $(document).ready(function() {
            toProfile();
            $("#search-blog").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#usersBlog tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>

</html>