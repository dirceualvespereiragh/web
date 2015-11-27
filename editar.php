<!--formulário-->
        <div class="tab-pane active" id="tab_inicio">
         <div class="col-md-5">


            <div class="panel panel-primary">  
                <div class="panel-heading">Cadastro de Clientes</div>            
                <div class="panel-body">

                    <form name="f_projetos" method="post" class="form-horizontal" role="form">
                         <input type="hidden" name="id" value="<?php echo $Cliente['id']; ?>" />
                        <div class="form-group">
                            <label class="control-label">Nome</label>
                            <input type="text" name="nome" required value="<?php echo $Cliente['nome']; ?>" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Celular</label>
                            <input type="text" name="celular" rows="3" required value="<?php echo $Cliente['celular']; ?>" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="text" name="email" required value="<?php echo $Cliente['email']; ?>" class="form-control"/>
                        </div>
                            <div class="form-group">
                            <label class="control-label">Endereço</label>
                            <input type="text" name="endereco" required value="<?php echo $Cliente['endereco']; ?>" class="form-control"/>
                        </div>


                        <div class="form-group">
                            <label class="control-label">Cliente foi Atendido ?</label>
                            <div class="checkbox">
                                <label class="control-label">
                                    <input type="checkbox" name="atendimento" value="Sim" <?php echo ($Cliente['atendimento'] == 1) ? 'checked' : ''; ?>"/>Sim</label>
                            </div>   
                        </div>


                        <div class="panel-footer">

                          <input type="submit"  class="btn btn-primary" value="<?php echo ($Cliente['id'] >0) ? 'Atualizar' : 'Cadastrar'; ?>" class="btn btn-default">
                        </div>

            </div> <!--fecha o panel body-->
            </div><!--fecha o panel primary-->
            </div>
            </form>
            </div><!--fecha o col-mod-6-->