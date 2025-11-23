<h1> Listar item </h1>
<!-- id_item	nome_item	preco_item	categoria_item -->
<?php
    $sql = "SELECT * FROM item";

    $res = $conn->query($sql);

    $qtd = $res->num_rows;

    print"<p> Encontrou <b>$qtd</b> resultados(s). </p>";

    if($res == true){
        print"<table class='table table-bordered table-striped table-hover'>";
        print"<tr>";
        print"<th>#</th>";
        print"<th>Nome</th>";
        print"<th>E-mail</th>";
        print"<th>Telefone</th>";
        print"<th>Ações</th>";
        print"</tr>";

        while($row = $res->fetch_object() ){
            print"<tr>";
            print"<td>".$row->id_item."</td>";
            print"<td>".$row->nome_item."</td>";
            print"<td>".$row->preco_item."</td>";
            print"<td>".$row->categoria_item."</td>";
            print"<td>
                    <button class='btn btn-success' onclick=\"location.href='?page=editar-item&id_item={$row->id_item}'; \"> Editar </button>

                    <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')) {location.href='?page=salvar-item&acao=excluir&id_item={$row->id_item}'; }\"> Excluir </button>

                 </td>";
            print"<tr>";
        }
        print"</table>";
    } else{
        print"<p> Não encontrou resultado </p>";
    }
?>