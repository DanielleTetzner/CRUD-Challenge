<div class="modal fade" id="endModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Endereço</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form id="cadEndform" class="EndCad" method="POST" > <!--   multipart/form-data = upload de arquivos/imagem       -->
        <div class="modal-body">
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Estado:</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="state" name="estado" required="required">
            </div>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">CEP:</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="CEP" name="CEP" required="required">
            </div>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Cidade:</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="city" name="cidade" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">Bairro:</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="district" name="bairro" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">Rua:</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="street" name="rua" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">Numero:</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="number" name="number" required="required">
            </div>
          </div>
          
              
          <div class="modal-footerEnd">
              <div id="botaomodal" class="btnEnd">
                <button type="submit" class="confirmarEnd" id="endconfirmButton">Confirmar</button>
              <button type="button" class="fecharEnd" data-dismiss="modal">Fechar</button>
              </div>
              </div>
          <input type="hidden" name="id_client" id="id_client" readonly>
          <input type="hidden" name="id_address" id="id_address" value="">
          <input type="hidden" name="main_address" id="main_address" value="">
        </form>
        </div>
        </div>
    </div>
  </div>
