<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="container">
  <h2>Lista de Clientes</h2>
  <p></p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th><a href="<?=base_url('/clientes/novo')?>"><button type="button" class="btn btn-primary">Novo</button></a></th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($clientes as $cliente){ ?>
        <tr>
          <td><?=$cliente->id;?></td>
          <td><?=$cliente->nome;?></td>
          <td><?=$cliente->email;?></td>
          <td>
              <a href="<?=base_url('/clientes/editacliente/')?><?=$cliente->id;?>"><button type="button" class="btn btn-warning">Edita</button></a>
              <a href="<?=base_url('/clientes/exclui/')?><?=$cliente->id;?>"><button type="button" class="btn btn-danger">Exclui</button></a>
              
          </td>
        </tr>
        <?php } ?>
    </tbody>
  </table>
</div>
