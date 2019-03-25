<?php require_once 'cabecalho.php' ?>
<?php require_once 'global.php' ?>
<?php
try{
    $listaNacionalidade = Nacionalidade::listar();
} catch (Exception $e){
    Erro::trataErro($e);
}

?>
<div class="row">
    <div class="col-md-12">
        <h2>Cadastro de Funcionários</h2>
    </div>
</div>
    <form action="funcionarios-criar-post.php" method="post">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <label for="nome">Nome do Funcionário</label>
                    <input type="text" name="nome" class="form-control" placeholder="Nome do funcionário" required>
                </div>
                <div class="form-group">
                    <label for="nome_resumido">Apelido</label>
                    <input type="text" name="nome_resumido" class="form-control" placeholder="Nome Resumido" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-5 col-md-offset-3">
                    <label for="nome">Nacionalidade</label>
                    <select class="form-control" name="nacionalidade_id" id="nacionalidade_id">
                            <option value="">Selecione...</option>
                        <?php foreach($listaNacionalidade as $linha) : ?>
                            <option value="<?php echo $linha['id'] ?>"><?php echo $linha['nome'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-1 col-sm-1">
                    <button type='button' class='btn btn-success btn-block' data-toggle="modal" data-target="#myModal"">+</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <input type="submit" class="btn btn-success btn-block" value="Salvar">
            </div>
    </form>
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">
                        Novo Cadastro
                    </h4>
                </div>
                <div class="modal-body">
                    <form id="form_nacionalidade">
                        <p> Antes de realizar um novo registro, certifique-se se o mesmo já não está cadastrado </p>
                        <div class="form-group">
                            <label for="nacionalidade"> Nacionalidade:</label>
                            <input type="text" class="form-control" id="nacionalidade" name="nacionalidade">
                        </div>
                        <button type="button" class="btn btn-lg btn-success btn-block" id="btnContactUs" onclick="AdicionarNacionalidade()">Cadastrar! &rarr;</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php require_once 'rodape.php' ?>
