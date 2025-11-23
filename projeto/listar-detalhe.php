<h1> Detalhes do Pedido </h1>

<?php
    // O ID do pedido deve ser passado na URL, senão lista todos
    $where = '';
    if (isset($_REQUEST['pedido_id_pedido'])) {
        $pedido_id = (int)$_REQUEST['pedido_id_pedido'];
        $where = " WHERE det.pedido_id_pedido = {$pedido_id}";
        print "<h2>Itens do Pedido #{$pedido_id}</h2>";
    }
    //  else {
    //     print "<h2>Todos os Detalhes</h2>";
    // }

    // A consulta usa INNER JOIN para trazer o NOME do item e os dados do pedido
    // No listar-detalhe.php, na linha que começa o SELECT (Linha 22 ou próxima)

$sql = "SELECT det.*, item.nome_item, pedido.hora_pedido  /* <--- CORRIGIDO AQUI */
        FROM detalhe AS det
        INNER JOIN item ON det.item_id_item = item.id_item
        INNER JOIN pedido ON det.pedido_id_pedido = pedido.id_pedido
        {$where}
        ORDER BY det.pedido_id_pedido DESC";

    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    print"<p> Encontrou <b>$qtd</b> resultados(s). </p>";

    if($qtd > 0){
        print"<table class='table table-bordered table-striped table-hover'>";
        print"<tr>";
        print"<th>Pedido #</th>";
        print"<th>Item</th>";
        print"<th>Quantidade</th>";
        print"<th>Preço Un.</th>";
        print"<th>Subtotal</th>";
        print"<th>Ações</th>";
        print"</tr>";

        while($row = $res->fetch_object() ){
            $subtotal = $row->quantidade_detalhe * $row->preco_detalhe;
            $subtotal_formatado = number_format($subtotal, 2, ',', '.');
            $preco_formatado = number_format($row->preco_detalhe, 2, ',', '.');
            
            print"<tr>";
            print"<td>".$row->pedido_id_pedido."</td>";
            print"<td>".$row->nome_item."</td>"; // Nome do Item
            print"<td>".$row->quantidade_detalhe."</td>";
            print"<td>R$ ".$preco_formatado."</td>";
            print"<td>R$ ".$subtotal_formatado."</td>";
            
            // Ações requerem DOIS IDs na URL
            print"<td>
                    <button class='btn btn-success' onclick=\"location.href='?page=editar-detalhe&pedido_id_pedido={$row->pedido_id_pedido}&item_id_item={$row->item_id_item}'; \"> Editar </button>

                    <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')) {location.href='?page=salvar-detalhe&acao=excluir&pedido_id_pedido={$row->pedido_id_pedido}&item_id_item={$row->item_id_item}'; }\"> Excluir </button>

                 </td>";
            print"<tr>";
        }
        print"</table>";
    }
    //  else{
    //     print"<p> Não encontrou resultado </p>";
    // }
?>