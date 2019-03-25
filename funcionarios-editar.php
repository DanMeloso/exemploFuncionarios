<?php require_once 'cabecalho.php' ?>
<?php require_once 'global.php' ?>
<?php
try{
    $id = $_GET['id'];
    $funcionario = new Funcionario($id);
    $listaNacionalidade = Nacionalidade::listar();
} catch (Exception $e){
    echo Erro::trataErro($e);
}
?>
<div class="row">
    <div class="col-md-12">
        <h2>Edição do Cadastro de Funcionário</h2>
    </div>
</div>

<form action="funcionarios-editar-post.php" method="post">
    <input type="hidden" name="id" value="<?php echo $funcionario->id ?>" >
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Nome do Funcionário</label>
                <input type="text" name="nome" value="<?php echo $funcionario->nome ?>" class="form-control" placeholder="Nome do Funcionário" required>
            </div>
            <div class="form-group">
                <label for="nome_resumido">Nome Resumido</label>
                <input type="text" name="nome_resumido" value="<?php echo $funcionario->nome_resumido ?>" class="form-control" placeholder="Nome Resumido" required>
            </div>
            <div class="form-group">
                <label for="nome">Nacionalidade</label>
                <?php $selected = ''; ?>
                <select class="form-control" name="nacionalidade_id">
                    <?php foreach ($listaNacionalidade as $linha) : ?>
                        <?php
                        if ($linha['id'] == $funcionario->nacionalidade_id){
                            $selected = 'selected';
                        }
                        ?>
                        <option <?php echo $selected ?> value="<?php echo $linha['id']?>"><?php echo $linha['nome']?></option>
                        <?php $selected = ''?>
                    <?php endforeach; ?>

                </select>
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>

<?php require_once 'rodape.php' ?>
