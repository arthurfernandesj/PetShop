<html>
    <head>
        <meta charset="UTF-8">
        <title> CADASTRO EM PDO </title>
    </head>
    <body>
        <center><h3><i>Lista de Usuários</i></h3>
		<table border="1" width="80%">
        <thead>
		<style>
			body{ background:#4682B4;
					color:#000000;
			<tr>
				<th>Id    </th>
				<th>Nome  </th>
				<th>E-mail</th>
				<th>Perfil</th>
				<th colsplan=2>Ação</th>
				<th colsplan=2>Ação</th>
					
			</tr>
			}</style>
			<img src="imagem.jpg"alt="Image" height="100" width="100">
        </thead>
		<tbody>
		 <p><a href="cadastroUsuario.php">Novo Usuário</a></p>
	<?php
		$pdo=new PDO('mysql:host=localhost;dbname=petshop;',
			            'root','');
		$sql='SELECT * FROM usuario';
		foreach($pdo->query($sql) as $array){
        echo '<tr>';
		    echo "<td>" . $array['idusuario']."</td>";	
            echo "<td>" . $array['nome']. "</td>";
            echo "<td>" . $array['email']."</td>";
            echo "<td>" . $array['perfil']."</td>";
			
		    echo "<td>" ;
			echo '<a href="excluir.php?id='.$array['idusuario'].'">EXCLUIR</a>';
			echo "</td>";
        
		
		 echo "<td>" ;
			echo '<a href="alterar.php?id='.$array['idusuario'].'">ALTERAR</a>';
			echo "</td>";
		echo '</tr>';
		}  //fim do foreach
     ?>                
         </tbody>
        </table>
       </center>				
	</body>
</html>	             







		 
		
		
		
		
		
		
		
		
		
		
		