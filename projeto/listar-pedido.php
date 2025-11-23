<h1> Listar pedido </h1>

<?php
//   <!-- id_pedido	hora_pedido	status_pedido	observacoes_pedido -->
    $sql = "SELECT * FROM pedido";

    $res = $conn->query($sql);

    $qtd = $res->num_rows;

    print"<p> Encontrou <b>$qtd</b> resultados(s). </p>";

    if($res == true){
        print"<table class='table table-bordered table-striped table-hover'>";
        print"<tr>";
        print"<th>#</th>";
        print"<th>hora</th>";
        print"<th>status</th>";
        print"<th>observações</th>";
        print"<th>Ações</th>";
        print"</tr>";

        while($row = $res->fetch_object() ){
            print"<tr>";
            print"<td>".$row->id_pedido."</td>";
            print"<td>".$row->hora_pedido."</td>";
            print"<td>".$row->status_pedido."</td>";
            print"<td>".$row->observacoes_pedido."</td>";
  
            print"<td>
                    <button class='btn btn-success' onclick=\"location.href='?page=editar-pedido&id_pedido={$row->id_pedido}'; \"> Editar </button>

                    <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')) {location.href='?page=salvar-pedido&acao=excluir&id_pedido={$row->id_pedido}'; }\"> Excluir </button>

                 </td>";
            print"<tr>";
        }
        print"</table>";
    } else{
        print"<p> Não encontrou resultado </p>";
    }
?>