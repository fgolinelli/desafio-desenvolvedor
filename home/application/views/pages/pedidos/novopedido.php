<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="container">
  <div class="container">
  <div class="jumbotron">
      
      <?php if(isset($formerror)) echo $formerror; ?>
      
      <h2>Novo Pedido</h2>
      
      <?php MontaFormLogin($clientes,$produtos); ?>
      
      <br>
  </div>
    </div>
</div>

<?php
function MontaFormLogin($clientes,$produtos){
    
    //Carrega as funções
    echo form_open("/pedidos/salvaNovo");
    
    //Campo cliente
    echo form_label('','Cliente');
    // Forma as opções
    $campoCliente[''] =  "Selecione o cliente";
    foreach ($clientes as $cliente){
        $campoCliente[$cliente->id] =  $cliente->nome ;
    };
    // Estilos
    $campoClienteEstilo = "class='form-control'";
            
    echo form_dropdown('slcCliente',$campoCliente, '',$campoClienteEstilo);
    
    //Campo produto
    echo form_label('','Produto');
    // Forma as opções
    $campoProduto[''] =  "Selecione o produto" ;
    foreach ($produtos as $produto){
        $campoProduto[$produto->id] =  $produto->descricao ;
    };
    // Extras
    $campoProdutoExtras = "class='form-control' onChange='AtualizaPreco(this.value)'";

    echo form_dropdown('slcProduto',$campoProduto, '',$campoProdutoExtras);
    
    //Campo tipo hiden para preco do produto
    $campoPrecoProduto[''] =  "0.00" ;
    foreach ($produtos as $produto){
        $campoPrecoProduto[$produto->id] =  $produto->preco ;
    };
    
    echo form_hidden($campoPrecoProduto);
    
    //Campo Valor do pedido
    echo form_label('','Valor');
    $campoValor = array(
        'name' => 'numValor',
        'id' => 'numVal',
        'min' => '1',
        'max' => '99999999',
        'placeholder' => 'Valor do pedido com dois decimais. Ex.1.99',
        'class' => 'form-control'
    );
    echo form_input($campoValor, set_value('numValor'));
    
    echo '<br><br>';
    
    // Botão submit
    $botaoSubmit = array(
        'class' => 'btn btn-primary'
    );
    echo form_submit('salva','Salvar',$botaoSubmit);
    
}
?>

<script>
// Atualiza preco
function AtualizaPreco(intIdProduto) {
    
    var indice = document.getElementsByName(intIdProduto);
    
    document.getElementById("numVal").value = indice[0].value;
        
    
}

</script>