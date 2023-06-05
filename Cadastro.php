<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Cadastro.css">
    <title>Cadastro Cliente</title>
</head>
<body>
<div class="form">
    <form method="post" action="Cadastro.php"><br>
    <h1>Sistema de Clientes</h1><br>
      <h2>Cadastro</h2><br>
      <label>Nome:</label> 
      <input type="text" size="40" placeholder="Nome Completo">
      <label>Email:</label>
      <input type="email" size="40" placeholder="Email Válido" required>
      <br>
  <label>CPF:</label>
      <input type="text" id="cpf" minlength="11" maxlength="11" 
       required autocomplete="off" placeholder="231.231.321-00"> <br>
      <label>RG:</label>
      <input type="text" id="rg" minlength="11" maxlength="11" placeholder="147.147.147-00"><br><br>
    
      <label>Sexo:</label> &nbsp;
      <label>Masculino</label>
      <input type="radio" name="opcao" id="op1">&nbsp;
      <label>Feminino</label>
      <input type="radio" name="opcao" id="op2">&nbsp;
      <label>Outros</label>
      <input type="radio" name="opcao" id="op3"><br><br>
      <label>Data de Nascimento:</label>
      <input type="date" name="data" id="data">
      
      <br><br>

      <h2>Endereço</h2><br>
      <label>Estado:</label> 
        <select name="estado" id="uf">
          <option value="0">Escolha sua Região</option>
          <optgroup label="Norte">
            <option value="1">Acre</option>
            <option value="2">Amazonas</option>
            <option value="3">Amapá</option>
            <option value="4">Pará</option>
            <option value="5">Rondônia</option>
            <option value="6">Roraima</option>
            <option value="7">Tocantins</option>
          </optgroup>
          <optgroup label="Nordeste">
              <option value="8">Alagoas</option>
              <option value="9">Bahia</option>
              <option value="10">Ceará</option>
              <option value="11">Maranhâo</option>
              <option value="12">Piauí</option>
              <option value="13">Pernambuco</option>
              <option value="14">Paraíba</option>
              <option value="15">Rio Grande do Norte</option>
              <option value="16">Sergipe</option>
         </optgroup> </optgroup> 
          <optgroup label="Centro-Oeste">
            <option value="17">Goiás</option>
            <option value="18">Mato Grosso</option>
            <option value="19">Mato Grosso do Sul</option>
            <option value="20">Distrito Federal</option>
          </optgroup>
          <optgroup label="Sudeste">
            <option value="21">Espirito Santo</option>
            <option value="22">Minas Gerais</option>
            <option value="23">Rio de Janeiro</option>
            <option value="24">São Paulo</option>
          </optgroup>
          <optgroup label="Sul">
            <option value="25">Paraná</option>
            <option value="26">Rio Grande do Sul</option>
            <option value="27">Santa Catarina</option>
          </optgroup>
          </select>
          <br><br>
        <label >Cidade:</label> 
        <input id="cidade" type="text" placeholder="Cidade" size="15"><br><br>
        <label>CEP:</label>
        <input id="cep" type="text" placeholder="21365-000" size="8">
        <br><br>
        <label>Bairro:</label>
        <input id="bairro" type="text" placeholder="Bairro" size="10"><br><br>
        <label>Rua:</label>
        <input type="text" size="30" placeholder="Logradouro">
        <br>
        <label>Número:</label>
        <input id="numero" type="text" size="5" placeholder=" Número"><br><br>
        <label>Complemento:</label>
        <input type="text" size="20" placeholder="Andar, Apartamento,Bloco"><br><br>
        <input type="submit" value="Enviar"> &nbsp; &nbsp;
        <input type="button" value="Voltar"><br><br>
      </form>
    </div>
</body>
</html>


