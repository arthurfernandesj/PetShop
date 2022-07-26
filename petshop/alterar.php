 <?php
 
	$id =$_GET['id'];
	$pdo=new PDO('mysql:host=localhost;dbname=petshop;','root','');
	$sql ="SELECT * FROM usuario WHERE idusuario = '$id'";
	$stmt=$pdo->prepare($sql);
	$stmt->execute();
	$resultado = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($_SERVER['REQUEST_METHOD']=='POST') {
		$idusuarioPost  =  $_POST['idusuario'];
		$nomePost  =  $_POST['nome'];
        $emailPost  = $_POST['email'];
        $senhaPost  = md5($_POST['senha']);
        $telefonePost = $_POST['telefone'];
		$enderecoPost = $_POST['endereco'];
		$perfilPost = $_POST['perfil'];
        $situacaoPost  = $_POST['situacao'];
		
    $pdoPost = new PDO('mysql:host=localhost;dbname=petshop;','root','');
	$sql = "UPDATE	usuario SET nome = '$nomePost',
			email ='$emailPost',
			senha ='$senhaPost',
			telefone = '$telefonePost',
			endereco = '$enderecoPost',
			perfil ='$perfilPost',
			situacao ='$situacaoPost'
			WHERE idusuario= '$idusuarioPost'";
			
		$stmt = $pdo->prepare($sql);	
		$stmt->execute();
		header('Location:index.php');
		
	}			
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap.css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
			
    <title>Alterar Cadastro</title>
</head>
<body>
<center>
        <br>
		
        <h1><font color="#000099"><u>Alterar Usuário</u></font></h1>
        <form method = "POST">
	
            <div class="container">
                <div class="form-floating mb-3 w-50">
                    <input value="<?php echo $resultado['idusuario']; ?>" readonly name="idusuario" type="text" class="form-control" id="floatingInputNome">
                    <label for="floatingInput">ID</label>
                </div>
                <div class="form-floating mb-3 w-50">
                    <input value="<?php echo $resultado['nome']; ?>" name="nome" type="text" class="form-control" id="floatingInputNome">
                    <label for="floatingInput">Nome</label>
                </div>
                <div class="form-floating mb-3 w-50">
                    <input value="<?php echo $resultado['email']; ?>" name="email" type="email" class="form-control" id="floatingInputEmail">
                    <label for="floatingInputEmail">E-mail</label>
                </div>
                <div class="form-floating mb-3 w-50">
                    <input name="senha" type="password" class="form-control" id="floatingInputPassword">
                    <label for="floatingInputPassword">Senha</label>
                </div>
                 <div class="form-floating mb-3 w-50">
                    <input value="<?php echo $resultado['telefone']; ?>" name="telefone" type="text" class="form-control" id="floatingInputNome">
                    <label for="floatingInput">Telefone</label>
                </div>
				<div class="form-floating mb-3 w-50">
                    <input value="<?php echo $resultado['endereco']; ?>" name="endereco" type="text" class="form-control" id="floatingInputNome">
                    <label for="floatingInput">Endereço</label>
                </div>
				<select name="perfil" class="form-select mb-3 w-50" aria-label="Default select example">
                    <option <?php if($resultado['perfil'] == 'Administrador'){ echo "selected"; } ?> value="Administrador">Administrador</option>
                    <option <?php if($resultado['perfil'] == 'Gerente'){ echo "selected"; } ?> value="Gerente">Gerente</option>
                    <option <?php if($resultado['perfil'] == 'Funcionário'){ echo "selected"; } ?> value="Funcionário">Funcionário</option>
                    <option <?php if($resultado['perfil'] == 'Cliente'){ echo "selected"; } ?> value="Cliente">Cliente</option>
                </select>
                <select name="situacao" class="form-select mb-3 w-50" aria-label="Default select example">
                    <option <?php if($resultado['situacao'] == 'Ativo'){ echo "selected"; } ?> value="1">Ativo</option>
                    <option <?php if($resultado['situacao'] == 'Inativo'){ echo "selected"; } ?> value="0">Inativo</option>
                </select>
				
            </div>
            <br>
           
		   <button class="btn btn-success" type="submit">Atualizar</button><a style="margin-left: 10px;" class="btn btn-outline-danger" href="index.php">Voltar</a>
       }</style>
	   </form>
    </center>
    <!-- Boostrap.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>