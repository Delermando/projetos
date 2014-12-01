<article>
    <div class="formCadastro">
        <form name="MontaCartao" action="" method="POST">
            <div class="formBoxMensagem">  
                <label for="taMensagem"><p>Mensagem</p>
                    <textarea name="taMensagem"></textarea>
                </label>
            </div>
            <div class="formBox">
  <div class="float margenInput">
                <label for="Name"><p>Nome do remetente</p>
                    <input type="text"  id="Name" value="" maxlength="50" name="txNomeRemetente">
    </label></div>
    <div class="float">
                
                <label for="Email"><p>Email do remetente</p>
                    <input type="text" id="Email" value="" maxlength="100" name="txEmailRemetente">
                </label>
            </div>
</div>
            <div class="formBox">
  <div class="float margenInput">
                <label for="txNomeDestinatario1"><p>Nome do destinatário</p>
                    <input type="text" value="" name="txNomeDestinatario1" maxlength="50">
                </label>
  </div>
  <div class="float">
                <label for="txEmailDestinatario1"><p>Email do destinatário</p>
                    <input type="text" value="" name="txEmailDestinatario1" maxlength="100">
                </label>
  </div>
            </div>
            <div class="botaoEnviar">
                <input type="button" name="botaoEnviar" value="Enviar">
            </div>
        </form>
    </div>
</article>
    