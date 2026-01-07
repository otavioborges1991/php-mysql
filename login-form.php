<div id="login-container" class="login-hidden">
    <form method="POST" action="login-script.php">
        <label id="label-usuário" for="usuário">Usuário:</label>
        <input  type="text" id="usuário" name="usuário" maxlength="10" placeholder="Nome de usuário">
        <label id="label-senha" for="senha">Senha:</label>
        <input  type="password" id="senha" name="senha" maxlength="60" placeholder="Senha"> 
        <button id="entrar" type="submit" name="açao" value="entrar">Entrar</button>
        <button id="cadastrar" type="submit" name="açao" value="cadastrar">Cadastrar-se</button>
    </form>
</div>