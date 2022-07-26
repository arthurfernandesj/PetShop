<?php
  if($_SERVER['REQUEST_METHOD']=='POST') {
        $nome  =  $_POST['nome'];
        $email  = $_POST['email'];
        $senha  = md5($_POST['senha']);
        $telefone = $_POST['telefone'];
		$endereco = $_POST['endereco'];
		$perfil = $_POST['perfil'];
        $situacao  = $_POST['situacao'];
    $pdo=new PDO('mysql:host=localhost;dbname=petshop;',
			            'root','');
	$sql="insert into usuario(nome,email,senha,telefone,endereco,perfil,situacao)
     values('$nome','$email','$senha','$telefone','$endereco','$perfil','$ativo')";
	$stmt=$pdo->prepare($sql);
    $stmt->execute();
	header('Location:index.php');
  }//fim do if
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <center>
		
        <h3><font color="#B0E0E6">Cadastro de Usuários</font></h3>
        <form method="POST" >
            <div>
			    <p>Nome</p>
                <input type="text" name="nome"  autofocus="" required="">
            </div>
            <div>
                <p>E-mail</p>
                <input type="email" name="email" required="">
            </div>
            <div>
                <p>Senha</p>
                <input type="password" name="senha"  required="">
            </div>
			 <div>
                <p>Telefone</p>
                <input type="text" name="telefone"  required="">
            </div>
            <div>
                <p>Endereço</p>
                <input type="text" name="endereco"  required="">
            </div>
			<div>
                <p>Perfil</p>
                <select name="perfil">
                    <option value="Administrador">Administrador</option>
                    <option value="Gerente">Gerente</option>
					<option value="Funcionário">Funcionário</option>
                    <option value="Cliente">Cliente</option>
                </select>
            </div>
            <div>
                <p>Situação</p>
                <select name="situacao">
                    <option value="Ativo">Ativo</option>
                    <option value="Inativo">Inativo</option>
                </select>
            </div>
            <br>
            <div>
			
                 <input type="submit" value="Cadastrar"> 
				 <input type="submit" value="Deletar">
         <style>
			body{ background:#BA55D3;
					color:#FFA500;
			</div>
			}</style>
        </form>
		
		
		<p><a href="index.php">Voltar</a></p>
	  </center>
    </body>
</html>

