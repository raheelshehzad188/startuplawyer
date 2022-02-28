<!DOCTYPE html>

<html>

<head>

	<title>Startup Lawyer</title>

	<meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

        <link rel = "stylesheet" href = "style.css">

         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

      

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</head>

<body class="main_body" >

    <img class="prot_img" src="http://startuplawyer.lk/main/blog/wp-content/themes/srtartuplawyer/assets/img/logo2.png"/>

<div class="main_div">

  <form action="" method="post">

   

    

        <label for="password">Password:</label>

        <br>

        <?php

        if(isset($error))

        {

            ?>

            <span class="error"><?= $error ?></span>

            <?php

        }

        ?>

    

        <input type="password" id="password" name="password_protection" style="

    width: 100%;

">

   <br>

<br>

   <label><input type="checkbox" id="" name="" value="">Remember Me</label>

      <input type="submit" value="Login" class="btn-primary">

   

  </form>

</div>

</body>

<style>

span.error {

    padding: 15px;

    background-color: #ffa3a3;

    display: block;

    line-height: 0px;

    font-size: 14px;

    margin-bottom: 2px;

}

body.main_body {

    background: #f0f0f1;

}

	.main_div {

    position: absolute;

    top: 200px;

    width: 342px;

    left: 50%;

    transform: translateX(-50%);

    margin-top: 20px;

    margin-left: 0;

    padding: 26px 24px 34px;

    font-weight: 400;

    overflow: hidden;

    background: #fff;

    border: 1px solid #c3c4c7;

    box-shadow: 0 1px 3px rgb(0 0 0 / 4%);

}

img.prot_img {

    width: 200px;

    position: absolute;

    left: 50%;

    transform: translateX(-50%);

    top: 130px;

}

.main_div .btn-primary {

    background: #2271b1;

    border-color: #2271b1;

    color: #fff;

    box-shadow: none;

    min-height: 32px;

    line-height: 2.30769231;

    padding: 0 12px;

    text-decoration: none;

    text-shadow: none;

    font-size: 13px;

    float: right;

    border-width: 1px;

    border-style: solid;

    -webkit-appearance: none;

    border-radius: 3px;

    white-space: nowrap;

    box-sizing: border-box;

}

.main_div input[type="checkbox"] {

    margin-right: 5px;

}

.main_div label {

    font-size: 14px;

    line-height: 1.5;

    display: inline-block;

    margin-bottom: 3px;

    vertical-align: baseline;

}

</style>







    <script

      src="https://code.jquery.com/jquery-3.4.1.js"

      integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="

      crossorigin="anonymous"></script>

      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

      <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

   

    

    

    <script>

     



</html>