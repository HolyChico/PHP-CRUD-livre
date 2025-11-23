<?php
    // Assumindo que $conn está definido

    switch($_REQUEST["acao"]) {
        case 'cadastrar':
            // O cadastro de detalhe é geralmente feito APÓS o cadastro do pedido principal.
            // Para simplificar a simulação de CRUD separado, vamos supor que o usuário
            // está enviando um pedido e um item já existentes.

            $pedido_id = $_POST['pedido_id_pedido']; 
            $item_id = $_POST['item_id_item']; 
            $quantidade = $_POST['quantidade_detalhe'];
            $preco_registro = str_replace(',', '.', $_POST['preco_detalhe']);

            $sql = "INSERT INTO detalhe (pedido_id_pedido, item_id_item, quantidade_detalhe, preco_detalhe)
                    VALUES('{$pedido_id}', '{$item_id}', '{$quantidade}', '{$preco_registro}')";
                
            $res = $conn->query($sql);

            if($res == true){
                print "<script> alert('Detalhe cadastrado com sucesso!'); location.href='?page=listar-detalhe'; </script>";
            }else{
                print "<script> alert('NÃO cadastrado. Verifique se o Pedido e o Item existem. Erro: ". $conn->error ."'); location.href='?page=listar-detalhe'; </script>";
            }
            break;

        case 'editar':
            // A edição exige 2 IDs na URL (pedido_id e item_id)
            $pedido_id = $_REQUEST['pedido_id_pedido']; 
            $item_id = $_REQUEST['item_id_item'];
            
            $quantidade = $_POST['quantidade_detalhe'];
            $preco_registro = str_replace(',', '.', $_POST['preco_detalhe']);

            // O WHERE usa a Chave Primária Composta
            $sql = "UPDATE detalhe SET 
                        quantidade_detalhe = '{$quantidade}', 
                        preco_detalhe = '{$preco_registro}' 
                    WHERE pedido_id_pedido = {$pedido_id} AND item_id_item = {$item_id}";

            $res = $conn->query($sql);

            if($res == true){
                print "<script> alert('Detalhe editado com sucesso!'); location.href='?page=listar-detalhe'; </script>";
            } else {
                print "<script> alert('Não foi editado. Erro: ". $conn->error ."'); location.href='?page=listar-detalhe&pedido_id_pedido={$pedido_id}'; </script>";
            }
            break;

        case 'excluir':
            // A exclusão exige 2 IDs na URL
            $pedido_id = $_REQUEST['pedido_id_pedido']; 
            $item_id = $_REQUEST['item_id_item'];

            $sql = "DELETE FROM detalhe 
                    WHERE pedido_id_pedido = {$pedido_id} AND item_id_item = {$item_id}";

            $res = $conn->query($sql);

            if ($res == true){
                print "<script> alert('Detalhe excluido com sucesso!'); location.href='?page=listar-detalhe'; </script>";
            } else{
                print "<script> alert('Não foi excluído. Erro: ". $conn->error ."'); location.href='?page=listar-detalhe&pedido_id_pedido={$pedido_id}'; </script>";
            }
            break;
    }
?>