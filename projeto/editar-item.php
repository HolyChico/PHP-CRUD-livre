<h1> Editar item </h1>
<!-- id_item	nome_item	preco_item	categoria_item -->
<?php
    $sql = "SELECT * FROM item WHERE id_item = ".$_REQUEST ['id_item'];

    $res = $conn -> query($sql);

    $row = $res -> fetch_object();
?> 

<form action="?page=salvar-item" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_item" value="<?php print $row -> id_item ?>" >

    <div class="mb-3">
        <label> Nome
            <input type="text" name="nome_item" class="form-control" value="<?php print $row->nome_item; ?>" required>
        </label>
    </div>

    <div class="mb-3">
        <label> Preço (R$)
            <input type="number" name="preco_item" class="form-control" value="<?php print $row->preco_item; ?>" required>
        </label>
    </div>

    <div class="mb-3">
        <label> Categoria
            <select name="categoria_item" class="form-control" required>
                <option value="">Selecione uma categoria</option>
                
                <?php
                    // CORREÇÃO 2: Lógica para pré-selecionar a categoria atual
                    $categorias = ['Prato Principal', 'Sobremesa', 'Bebida', 'Entrada'];
                    $categoria_atual = $row->categoria_item;

                    foreach ($categorias as $cat) {
                        // Verifica se a categoria no loop é igual à categoria do item lido do DB
                        if ($cat == $categoria_atual) {
                            $selected = 'selected';
                        } else {
                            $selected = '';
                        }
                        
                        print "<option value='{$cat}' {$selected}> {$cat} </option>";
                    }
                ?>
                
            </select>
        </label>
    </div>

    <div>
        <button class="submit" class="btn btn-primary"> Enviar </button>
    </div> 

</form>