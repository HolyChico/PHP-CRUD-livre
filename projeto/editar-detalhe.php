<h1> Editar detalhes do pedido </h1>

<?php
    // Padrão: Confia que os DOIS IDs estão na URL
    $pedido_id = $_REQUEST ['pedido_id_pedido'];
    $item_id = $_REQUEST ['item_id_item'];

    // Consulta que usa a Chave Primária Composta
    $sql = "SELECT det.*, item.nome_item
            FROM detalhe AS det
            INNER JOIN item ON det.item_id_item = item.id_item
            WHERE det.pedido_id_pedido = {$pedido_id} AND det.item_id_item = {$item_id}";

    $res = $conn -> query($sql);
    $row = $res -> fetch_object();
?> 

<form action="?page=salvar-detalhe" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="pedido_id_pedido" value="<?php print $row -> pedido_id_pedido ?>" >
    <input type="hidden" name="item_id_item" value="<?php print $row -> item_id_item ?>" >

    <h2>Pedido #<?php print $row->pedido_id_pedido; ?> - Item: <?php print $row->nome_item; ?></h2>

    <div class="mb-3">
        <label> Quantidade
            <input type="number" name="quantidade_detalhe" class="form-control" required min="1" 
                   value="<?php print $row->quantidade_detalhe; ?>">
        </label>
    </div>

    <div class="mb-3">
        <label> Preço Unitário de Registro (R$)
            <input type="number" step="0.01" name="preco_detalhe" class="form-control" required 
                   value="<?php print $row->preco_detalhe; ?>">
        </label>
    </div>

    <div>
        <button type="submit" class="btn btn-primary"> Salvar Edição </button>
    </div> 
</form>