<?php
session_start();
session_destroy();
?>

<html>
<head>
    <title>Session Expired</title>
    <style media="screen">
        @import url(https://fonts.googleapis.com/css?family=Open+Sans);

        /* sets whole page to Open Sans and sets background color */
        body {
            font-family: 'Open Sans', 'sans-serif';
            background-image: url(Untitled-1.jpg);
            margin-top: 200px;
        }
        img{
            margin-bottom: 50px;
        }
        /* login div */
        .login {
            margin-top: 500px;
            background-color: #eee;
            width: 420px;
            height: 312px;
            margin: 0 auto;
            padding: 0;
        }

        /* login header */
        h1 {
            color: #55acee;
            text-align: center;
            font-size: 36px;
            padding-top: 10px;
        }

        /* div containing form */
        form {
            text-align: center;
        }

        /* username and password fields */
        input:not([type="button"]) {
            font-family: 'Open Sans', 'sans-serif';
            border: 1px solid #acacac;
            color: #666;
            opacity: .7;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
            width: 250px;
            transition: all .3s;
            -webkit-transition: all .3s;
            -moz-transition: all .3s;
            font-size: 16px;
        }

        input:focus:not([type="button"]) {
            border: 1px solid #55acee;
            opacity: 1;
            width: 320px;
            outline: none;
            color: #55acee;
        }

        /* submit button */
        input[type="button"] {
            padding: 15px 25px;
            font-size: 22px;
            width: 420px;
            color: #fff;
            position: relative;
            display: inline-block;
            background-color: #55acee;
            box-shadow: 0px 5px 0px 0px #3C93D5;
            outline: none;
            border: none;
        }

        input[type="button"]:active {
            transform: translate(0px, 5px);
            -webkit-transform: translate(0px, 5px);
            box-shadow: 0px 0px 0px 0px;
        }

        input[type="button"]:hover {
            background-color: #6FC6FF;
        }

    </style>
</head>
<body>
<center>
    <img src="Symbol.png" alt="">
</center>

<form name="frmUser" method="post" action="">
    <div class="tblLogin">
            <p style="color:#31ab00;">Session Expired!!!</p>
            <script type="text/javascript">
                setTimeout(function(){
                    window.location = "Login Page/index.php";
                },3000)
            </script>
    </div>
</form>
</body></html>
