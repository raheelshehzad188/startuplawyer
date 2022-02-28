<!DOCTYPE html>

<html lang="en">

<head>

  <title>FutureKids > Manage Reseller</title>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style type="text/css">
  .copen {
    position: relative;
    overflow: hidden;
    border: 2px solid #3498db;
    padding: 25px;
    border-radius: 5px;
    margin: 100px auto;
}.copen th {
    background: #3498db;
    color: #fff;
}
</style>
</head>

<body>



<div class="container">
  <div class="copen">
    

    <table class=" table table-bordered">

      <thead>

        <tr>

          <th>Code</th>

          <th>Value</th>

        </tr>

      </thead>

      <tbody>

        <?php

        foreach ($coupons as $key => $value) {

          ?>

          <tr>

          <td><?= $value['code'] ?></td>

          <td><?= $value['value'] ?></td>

        </tr>

          <?php

        }

        ?>

      </tbody>

    </table>
  </div>
</div>



</body>

</html>

