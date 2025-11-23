<h1> Cadastrar pedido </h1>

<form action="?page=salvar-pedido" method="POST">
    <input type="hidden" name="acao" value="cadastrar">

    <!-- id_pedido	hora_pedido	status_pedido	observacoes_pedido -->
    <div class="mb-3">
        <label> Hora do Pedido
            <input type="datetime-local" name="hora_pedido" class="form-control" required>
        </label>
    </div>

    <div class="mb-3">
        <label> Status
            <select name="status_pedido" class="form-control" required>
                <option value="">Selecione o Status</option>
                
                <option value="Aguardando Pagamento">Aguardando Pagamento</option>
                <option value="Em Preparação">Em Preparação</option>
                <option value="Aguardando Retirada">Aguardando Retirada/Entrega</option>
                <option value="Saiu para Entrega">Saiu para Entrega</option>
                <option value="Concluído">Concluído</option>
                <option value="Cancelado">Cancelado</option>
                
            </select>
        </label>
    </div>

    <div class="mb-3">
        <label> Observações
            <textarea name="observacoes_pedido" class="form-control" rows="3"></textarea>
        </label>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary"> Enviar </button>
    </div>

</form>