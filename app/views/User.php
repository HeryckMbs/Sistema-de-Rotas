<?php $this->layout('master') ?>
<div class="row">
    <div class="col-md-12 d-flex justify-content-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#usuarioModal">
            Adicionar Usuário
        </button>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table table-responsive">
            <h3>Lista de Usuários</h3>
            <table class='table table-dark table hover table-striped table-bordered border-success'>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Sexo</th>
                    <th>Telefone</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $count = 1;
                foreach ($this->data[0] as $dados) {
               echo '<tr>'.
                    '<td>'.$count.'</td>'.
                   '<td>'.$dados['nome'].'</td>'.
                    '<td>'.$dados['cpf'].'</td>'.
                    '<td>'.$dados['sexo'].'</td>'.
                    '<td>'.$dados['telefone'].'</td>'.
                    '<td><button type="button" class="btn btn-warning">Editar</button><button  type="button" class="btn btn-danger">Excluir</button></td>'.
                '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="usuarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
       <form method="POST" action="/userSave">
           <div class="modal-content">
               <div class="modal-header">
                   <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de usuário</h1>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                   <div class="row">
                       <div class="col-md-12 form-group">
                           <div class="mb-3">
                               <label for="nome">Nome</label>
                               <input class="form-control" id="nome" type="text" name="nome">
                           </div>
                           <div class="mb-3">
                               <label for="cpf">CPF</label>
                               <input class="form-control" id="cpf" type="text" name="cpf">
                           </div>
                           <div class="mb-3">
                               <label for="sexo">Sexo</label>
                                <select class="form-select" name="sexo" id="sexo">
                                    <option value="N">Não informado</option>
                                    <option value="F">Feminino</option>
                                    <option value="M">Masculino</option>
                                </select>
                           </div>
                           <div class="mb-5">
                               <label for="nome">Telefone</label>
                               <input onclick="formataTel(event)" class="form-control" id="Telefone" type="text" name="telefone">
                           </div>
                       </div>
                   </div>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                   <button type="submit" class="btn btn-primary">Salvar</button>
               </div>
           </div>
       </form>
    </div>
</div>

<script>

    function formataCpf(cpf) {
        //retira os caracteres indesejados...
        cpf = cpf.replace(/[^\d]/g, "");

        //realizar a formatação...
        return cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
    }

    /*
        Formata o conteúdo do campo cpf da forma "XXX.XXX.XXX-XX"
    */
    $('#cpf').on('keypress', function () {
        let cpfLength = $('#cpf').val().length
        if (cpfLength === 3 || cpfLength === 7) {
            this.value += '.'
        } else if (cpfLength === 11) {
            this.value += '-'
        }
    })

    function formataTel(event) {
        let input = event.target;
        input.value = mascaraTelefone(input.value)
    }
    /*
            Formata o conteúdo dos inputs de telefone da seguinte forma (XX) XXXXX-XXXX
        */
    function mascaraTelefone(value) {
        if (!value) return ""
        value = value.replace(/\D/g, '')
        value = value.replace(/(\d{2})(\d)/, "($1) $2")
        value = value.replace(/(\d)(\d{4})$/, "$1-$2")
        return value
    }



</script>