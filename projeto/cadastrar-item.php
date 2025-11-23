<h1> Cadastrar item </h1>

<form action="?page=salvar-item" method="POST">
    <input type="hidden" name="acao" value="cadastrar">


    <!-- id_item	nome_item	preco_item	categoria_item -->
    <div class="mb-3">
        <label> Nome
            <input type="text" name="nome_item" class="form-control" required>
        </label>

    </div>

    <div class="mb-3">
        <label> Preço (R$)
            <input type="number" name="preco_item" class="form-control" required>
        </label>
    </div>

    <div class="mb-3">
        <label> Categoria
            <select name="categoria_item" class="form-control" required>
                <option value="">Selecione uma categoria</option>
                
                <option value="Prato Principal">Prato Principal</option>
                <option value="Sobremesa">Sobremesa</option>
                <option value="Bebida">Bebida</option>
                <option value="Entrada">Entrada</option>
                
                </select>
        </label>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary"> Enviar </button>
    </div>

</form>