<h1> Cadastrar Detalhe do Pedido </h1>

<form action="?page=salvar-detalhe" method="POST">
    <input type="hidden" name="acao" value="cadastrar">

    <div class="mb-3">
        <label> Pedido referente
            <select name="pedido_id_pedido" class="form-control" required>
                <option value="">Selecione o Pedido</option>
                <?php
                $sql = "SELECT id_pedido, hora_pedido FROM pedido ORDER BY id_pedido DESC";
                $res = $conn -> query($sql);
                if($res->num_rows > 0){
                    while($row = $res -> fetch_object()){
                        $hora_formatada = date('d/m H:i', strtotime($row->hora_pedido));
                        print"<option value='{$row->id_pedido}'>Pedido #{$row->id_pedido} ({$hora_formatada})</option> ";
                } }
                ?>
            </select>
        </label>
    </div>

    <div class="mb-3">
        <label> Item do menu
            <select name="item_id_item" class="form-control" required>
                <option value="">Selecione o Item</option>
                <?php
                $sql = "SELECT id_item, nome_item, preco_item FROM item ORDER BY nome_item";
                $res = $conn -> query($sql);
                if($res->num_rows > 0){
                    while($row = $res -> fetch_object()){
                        print"<option value='{$row->id_item}'>{$row->nome_item} (R$ {$row->preco_item})</option> ";
                } }
                ?>
            </select>
        </label>
    </div>

    <div class="mb-3">
        <label> Quantidade
            <input type="number" name="quantidade_detalhe" class="form-control" required min="1" value="1">
        </label>
    </div>

    <div class="mb-3">
        <label> Preço unitário (R$)
            <input type="number" name="preco_detalhe" class="form-control" required>
        </label>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary"> Adicionar ao Pedido </button>
    </div>
</form>