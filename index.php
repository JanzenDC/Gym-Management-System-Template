<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GYM Management System</title>
    <link href="src/output.css" rel="stylesheet">
    <?php include_once 'pages/headers_cdn.php'?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body class="flex justify-center items-center h-screen">
    <div class="">
        <input id="email" placeholder="Email" type="email"><br>
        <input id="password" placeholder="Password" type="password" class="mt-3"><br>
        <button id="submit">SUBMIT</button>
    </div>

    <script>
        $(document).ready(function() {
           $('#submit').click(function(){
                // console.log("TESTT")
                const email = $("#email").val();
                const password = $("#password").val();

                console.log(email)
                console.log(password)

                var data = {
                    "email": email,
                    "password": password
                }
                $.ajax({
                    url: 'query/login.php?action=update', 
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        console.log(response)
                        if (response.success) {
                            swal("Certificate marked as done successfully!", {
                                icon: "success",
                            }).then(() => {
                                location.reload(); 
                            });
                        } else {
                            swal("Error!", {
                                icon: "error",
                            }).then(() => {
                                location.reload(); 
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error:', status, error);
                    }
                });
           })

        });
        
    </script>
</body>
</html>