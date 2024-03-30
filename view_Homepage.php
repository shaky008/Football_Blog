<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div class="container mt-3">
        <h3>One Love, One Sport</h3>
        <p>Dive deeper into the world of football with our interactive blog platform.
            Join a community of passionate fans and share your insights, opinions, and reactions by commenting on blogs posted by
            fellow users. Whether you're dissecting the latest match highlights, analyzing transfer rumors, or debating team
            strategies, our platform provides the perfect space to engage in lively discussions and connect with like-minded
            enthusiasts.</p>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
            Start your blog
        </button>

        <!-- Cards -->
        <div id="homepage-cards" class="d-flex flex-row mt-3">
            <div class="card mx-3" style="width: 18rem;">
                <div class="card-body">
                    <h4>Elevate Your Blogging Experience</h4>
                    <p class="card-text">Set your sport blog apart from the competition with sleek design templates and user-friendly customization options.</p>
                </div>
            </div>
            <div class="card mx-3" style="width: 18rem;">
                <div class="card-body">
                    <h4>Get Started Today</h4>
                    <p class="card-text">oin the thriving community of sports bloggers and enthusiasts on F-blog </p>
                </div>
            </div>

            <div class="card mx-3" style="width: 18rem;">
                <div class="card-body">
                    <h4>Improving Experience Everyday</h4>
                    <p class="card-text">We value your experience and are continuesly imporving our UI and technology.</p>
                </div>
            </div>
        </div>

    </div>

    <!-- The Modal for login-->
    <div class="modal fade" id="loginModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Login</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method='post' action='controller.php'>
                        <input type="hidden" name="page" value="Homepage">
                        <input type="hidden" name="command" value="LogIn">
                        <label class='modal-label-input' for='input-login-email'>Email:</label>
                        <input class="form-control" id='input-login-email' type='text' name='email' required><br><br>
                        <?php if (!empty($error_msg_email))
                            echo '<p style="color: red">' . $error_msg_email . '</p>' ?><br>
                        <label class='modal-label-input' for='input-login-password'>Password:</label>
                        <input class="form-control" id='input-login-password' type='password' name='password' required><br>
                        <?php if (!empty($error_msg_password))
                            echo '<p style="color: red">' . $error_msg_password . '</p>' ?><br>
                        <p><a href="#" class="pe-auto" id="create-account">Create an account</a></p>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="logininBtn" class="btn btn-outline-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- modal window for signup -->
    <div class="modal fade" id="signupModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Signup</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method='post' action='controller.php'>
                        <input type="hidden" name="page" value="Homepage">
                        <input type="hidden" name="command" value="Signup">
                        <label class='modal-label-input' for='input-signup-name'>Name:</label>
                        <input class="form-control" id='input-signup-name' type='text' name='name' required><br><br>
                        <label class='modal-label-input' for='input-signup-email'>Email:</label>
                        <input class="form-control" id='input-signup-email' type='text' name='email' required><br><br>
                        <?php if (!empty($error_msg))
                            echo '<p style="color: red;">' . $error_msg . '</p>' ?><br>
                        <label class='modal-signup-input' for='input-signup-password'>Password:</label>
                        <input class="form-control" id='input-signup-password' type='password' name='password' required><br>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="signupBtn" class="btn btn-outline-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script>
        // opens the signup modal window and closes the login in modal window
        $("#create-account").click(function() {
            $("#loginModal").modal('hide');
            $('#signupModal').modal('show');
        })

        //shows loginmodal and hides signup modal 
        function show_login_error() {
            $("#loginModal").modal('show');
            $("#signupModal").modal('hide');
        }

        //shows signupmodal and hides signup modal 
        function show_signup_error() {
            $("#loginModal").modal('hide');
            $("#signupModal").modal('show');
        }


        //if display_modal_login not empty, there is an error in modals and so envokes show_login_error
        <?php
        if (!empty($display_modal_login)) {
            //ready is used so that the function is used only after document is fully loaded
            echo "$(document).ready(function() { 
                show_login_error(); });";
        }

        if (!empty($display_modal_signup)) {
            //ready is used so that the function is used only after document is fully loaded
            echo "$(document).ready(function() { 
                show_signup_error(); });";
        }
        ?>
    </script>
</body>

</html>