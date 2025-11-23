<h1> Editar Pedido </h1>

<?php
    // Confia que o ID está na URL (Padrão do projeto)
    $sql = "SELECT * FROM pedido WHERE id_pedido = ".$_REQUEST ['id_pedido'];

    $res = $conn -> query($sql);

    $row = $res -> fetch_object();
?> 

<form action="?page=salvar-pedido" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_pedido" value="<?php print $row -> id_pedido ?>" >

    <div class="mb-3">
        <label> Data e Hora do Pedido
            <input type="datetime-local" name="hora_pedido" class="form-control" value="<?php print str_replace(' ', 'T', substr($row->hora_pedido, 0, 16)); ?>" required>
        </label>
    </div>

    <div class="mb-3">
        <label> Status
            <select name="status_pedido" class="form-control" required>
                <option value="">Selecione o Status</option>
                
                <?php
                    // CORREÇÃO 2: Lógica para pré-selecionar o status atual
                    $status_opcoes = [
                        'Aguardando Pagamento',
                        'Em Preparação',
                        'Aguardando Retirada',
                        'Saiu para Entrega',
                        'Concluído',
                        'Cancelado'
                    ];
                    $status_atual = $row->status_pedido;

                    foreach ($status_opcoes as $status) {
                        // Verifica se o status no loop é igual ao status do pedido lido do DB
                        if ($status == $status_atual) {
                            $selected = 'selected';
                        } else {
                            $selected = '';
                        }
                        // O value e o texto da opção são o próprio status
                        print "<option value='{$status}' {$selected}> {$status} </option>";
                    }
                ?>
                
            </select>
        </label>
    </div>

    <div class="mb-3">
        <label> Observações
            <textarea name="observacoes_pedido" class="form-control" rows="3"><?php print $row->observacoes_pedido; ?></textarea>
        </label>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary"> Enviar </button>
    </div>

</form>