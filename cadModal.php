<div class="modal fade" id="cadModal" tabindex="-1" role="dialog" aria-labelledby="employeeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">x</span>
        </button>
      </div>

      <form id="addform" > 
        <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nome:</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="name_register" name="name" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">RG:</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="rg_register" name="rg" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">CPF:</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="cpf_register" name="cpf" required="required"  >
            </div>
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">Email:</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="email_register" name="email" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">Telefone 1:</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="tel1_register" name="tel1" required="required" >
            </div>
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">Telefone 2:</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="tel2_register" name="tel2" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">Ano:</label>
            <div class="input-group mb-3">
              <input type="date" class="form-control" id="birth_register" name="birth" required="required">
            </div>
          </div>

        </div>
        <div class="modal-footer">

                <div id="botaomodal">
                  <button type="submit"  class="confirmar" id="cadBtn">Confirmar</button>
                <button type="button" class="fechar" data-dismiss="modal">Fechar</button>
                </div>
                  </div>
          <input type="hidden" name="id" id="id" readonly>
        </form>
        </div>
    </div>
  </div>
</div>
