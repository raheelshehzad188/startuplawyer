<div id="imup">
    File upload successfully click button to import products
    <br>Sucess : <h1><?= $tot ?></h1><br>
    <br>Error : <h1><?= $error ?></h1><br>
    <button onclick="import_start(<?= $imp_id;?>,'<?= $next['id'] ?>','<?= $tot ?>')">Start Importing</button>
</div>
<style>
    button{
         border-color: #4839eb !important;
    background-color: #7367f0 !important;
    color: #fff;
    border: none;
    border-radius: 9px;
    padding: 7px;
    }
</style>