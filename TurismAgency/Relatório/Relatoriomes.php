<html>
<head>
<title>Relatório Total de Viagens</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<form action="Relatoriomes.php?botao=gravar" method="post" name="form1">
<table width="95%" border="1" align="center">
  <tr>
    <td colspan=5 align="center">Relatório Total de Viagens</td>
  </tr>
  <tr>
    <td width="50%" align="right">Mês:</td>
    <td width="30%"><input type="text" name="nomef" /></td>
    <td width="21%"><input type="submit" name="botao" value="Gerar" /></td>
  </tr>
</table>
</form>

<?php if (@$_POST['botao'] == "Gerar") { ?>

<table width="95%" border="1" align="center">
  <tr bgcolor="#9999FF">
    <th width="25%">Check-In</th>
    <th width="10%">Check-Out</th>
    <th width="10%">Destino</th>
    <th width="10%">Valor</th>
  </tr>

<?php
include ('../php/Config.php'); 

$nomef = $_POST['nomef'];

$query = "SELECT CHECKIN, CHECKOUT, DESTINO, VALOR FROM VENDAS";
$query .= ($nomef ? " WHERE MONTH(CHECKIN) = $nomef" : "");

$result = sqlsrv_query($conn, $query);

while ($coluna = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
    $checkin = $coluna['CHECKIN'];
    $checkout = $coluna['CHECKOUT'];
    
    $checkinFormatado = $checkin ? $checkin->format('d/m/Y') : 'Data inválida';
    $checkoutFormatado = $checkout ? $checkout->format('d/m/Y') : 'Data inválida';

    $valor = number_format($coluna['VALOR'], 2, ',', '.');
?>
    <tr>
      <td width="10%"><?php echo $checkinFormatado; ?></td>
      <td width="10%"><?php echo $checkoutFormatado; ?></td>
      <td width="10%"><?php echo $coluna['DESTINO']; ?></td>
      <td width="10%"><?php echo $valor; ?></td>
    </tr>
<?php
} // fim do while
?>
</table>

<?php
}
?>

<a href="../views/index.html">Home</a>



<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
}

.container {
    width: 80%;
    margin: 20px auto;
    gap: 20px;
}

h1 {
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 8px;
    text-align: left;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}

input[type="text"],
input[type="submit"] {
    padding: 8px;
    border: none;
    border-radius: 4px;
    margin-bottom: 10px;
    width: 100px;

}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

a{
    border: solid #000;
    border-radius: 10px;
    padding: 20px;
    display: flex;
    width: 100px;
    margin-top: 50px;
    align-items: center;
    justify-content: center;
    background-color: #4CAF50;
    color: #fff;
    margin-left: 10px;
}


</body>
</html>
