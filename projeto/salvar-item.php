<?php
    
    switch($_REQUEST["acao"]) {
        case 'cadastrar':
            $nome = $_POST['nome_item'];
            $preco = $_POST['preco_item'];
            $categoria = $_POST['categoria_item'];

            $sql = "INSERT INTO item (nome_item, preco_item, categoria_item)
                    VALUES('{$nome}', '{$preco}', '{$categoria}') ";
                
            $res = $conn->query($sql);

            if($res == true){
                print "<script> alert('cadastrado com sucesso') </script>";
                print "<script> location.href='?page=listar-item'; </script>";
            }else{
                print "<script> alert('NÃO cadastrado') </script>";
                print "<script> location.href='?page=listar-item'; </script>";
            }
            break;

        case 'editar':
            $nome = $_POST['nome_item'];
            $preco = $_POST['preco_item'];
            $categoria = $_POST['categoria_item'];

            $sql = "UPDATE item SET nome_item = '{$nome}', preco_item = '{$preco}', categoria_item = '{$categoria}' WHERE id_item = " . $_REQUEST['id_item'];

            $res = $conn->query($sql);

            if($res == true){
                print "<script> alert('Editado com sucesso!'); </script>";
                print "<script> location.href='?page=listar-item'; </script>";
            } else {
                print "<script> alert('Não foi editado'); </script>";
                print "<script> location.href='?page=listar-item'; </script>";
            }
            break;

        case 'excluir':
            
            $sql = "DELETE FROM item WHERE id_item=". $_REQUEST['id_item'];

            $res = $conn->query($sql);

            if ($res == true){
                print"<script> alert('Excluído com sucesso!'); </script>";
                print "<script> location.href='?page=listar-item'; </script>";
            } else{
                print "<script> alert('Não foi excluído'); </script>";
                print "<script> location.href='?page=listar-item'; </script>";
            }
            break;
    }



?>