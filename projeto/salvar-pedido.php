<?php
// id_pedido	hora_pedido	status_pedido	observacoes_pedido
    switch($_REQUEST["acao"]) {
        case 'cadastrar':
            $hora = $_POST['hora_pedido'];
            $status = $_POST['status_pedido'];
            $observacoes = $_POST['observacoes_pedido'];

            $sql = "INSERT INTO pedido (hora_pedido, status_pedido, observacoes_pedido)
                    VALUES('{$hora}', '{$status}', '{$observacoes}') ";
                
            $res = $conn->query($sql);

            if($res == true){
                print "<script> alert('cadastrado com sucesso') </script>";
                print "<script> location.href='?page=listar-pedido'; </script>";
            }else{
                print "<script> alert('NÃO cadastrado') </script>";
                print "<script> location.href='?page=listar-pedido'; </script>";
            }
            break;

        case 'editar':
            $hora = $_POST['hora_pedido'];
            $status = $_POST['status_pedido'];
            $observacoes = $_POST['observacoes_pedido'];

            $sql = "UPDATE pedido SET hora_pedido = '{$hora}', status_pedido = '{$status}', observacoes_pedido = '{$observacoes}' WHERE id_pedido = " . $_REQUEST['id_pedido'];

            $res = $conn->query($sql);

            if($res == true){
                print "<script> alert('Editado com sucesso!'); </script>";
                print "<script> location.href='?page=listar-pedido'; </script>";
            } else {
                print "<script> alert('Não foi editado'); </script>";
                print "<script> location.href='?page=listar-pedido'; </script>";
            }
            break;

        case 'excluir':
            
            $sql = "DELETE FROM pedido WHERE id_pedido=". $_REQUEST['id_pedido'];

            $res = $conn->query($sql);

            if ($res == true){
                print"<script> alert('Excluído com sucesso!'); </script>";
                print "<script> location.href='?page=listar-pedido'; </script>";
            } else{
                print "<script> alert('Não foi excluído'); </script>";
                print "<script> location.href='?page=listar-pedido'; </script>";
            }
            break;
    }



?>