<div class="modal fade" id="endListmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"id="meumodal">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Endereços</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="cadCliente">       
            <form id="listagemEnd" method="Post">
                <table id="tabela">
                    <thead >
                        <tr>

                            <th >Estado</th>

                            <th >CEP</th>
                            
                            <th >Cidade</th>
                            
                            <th >Bairro</th>
                            
                            <th >Rua</th>
                            
                            <th >Numero</th>

                            <th >Ação</th>

                        
                        </tr>
                    </thead>
                
                
                <tbody id="listagemEnduser"> <!-- tabela feita no JS -->


                </tbody>
                
                </table>
            </div>
        </form>

        <form id="updateEndform" method="POST">
        <div class="modal-body" id="modalEnd">
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Estado:</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="stateList" name="estado" required="required">
            </div>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">CEP:</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="CEPlist" name="CEP" required="required">
            </div>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Cidade:</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="cityList" name="cidade" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">Bairro:</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="districtList" name="bairro" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">Rua:</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="streetList" name="rua" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">Numero:</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="numberList" name="numero" required="required">
            </div>
          </div>
          
              
          <div class="modal-footerEnd">
              <div id="botaomodal">
                <button type="submit"  class="confirmarEndBtn" id="endconfirmButton">Confirmar</button>
              <button type="button" class="fecharEnd" data-dismiss="modal">Fechar</button>
              </div>
              </div>
          <input type="hidden" name="id_client" id="id_client" readonly>
          <input type="hidden" name="id_address" id="id_address" value="">
          <input type="hidden" name="main_address" id="main_address" value="">
        </div>
      </form>
      </div> 
  </div>
  </div>