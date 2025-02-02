<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/loja.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/Trip.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Gold Style</title>
	<link rel="icon" href="../img/cargo.ico">
</head>
<body>

	<header>
        <nav>
            <div class="container">
                <div class="logo">
                    <img src="../img/cargo.png" alt="">
                    ExploreX
                </div>

                <div class="links">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="Trip.html">Viagens</a></li>
                        <li><a href="About.html">Sobre</a></li>
                        <li><a href="Login.html">Login</a></li>
                        <li><a href="cart.php"><img src="../img/car.png" alt=""></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
	
	<div class="small-container cart-page">
		<table>
			<tr>
				<th>Viagens</th>
				<th></th>
				<th>Total</th>
			</tr>

			<?php
			

        include ("../php/config.php");

			$sql = "SELECT * FROM vendas";
			$stmt = sqlsrv_query($conn, $sql);

			if ($stmt === false) {
				die(print_r(sqlsrv_errors(), true));
			}

			$total = 0; 

	
			while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
				echo "<tr>";
				echo "<td>";
				echo "<div class='cart-info'>";
				echo "<div>";
				echo "<p>Viagem " . htmlspecialchars($row['DESTINO']) . "</p>";
				echo "<small>Preço: R$ " . number_format($row['VALOR'], 2, ',', '.') . "</small>";
				echo "<br>";
				echo "<a href=''>Remover</a>";
				echo "</div>";
				echo "</div>";
				echo "</td>";
				echo "<td><input type='number' value='1'></td>";
				echo "<td>R$ " . number_format($row['VALOR'], 2, ',', '.') . "</td>";
				echo "</tr>";


				$total += $row['VALOR'];
			}

			$taxa = $total * 0.03;


			$totalFinal = $total + $taxa;

			sqlsrv_free_stmt($stmt);
			sqlsrv_close($conn);
			?>
		</table>
		<div class="total-price">
			<table>
				<tr>
					<td>SubTotal</td>
					<td>R$ <?php echo number_format($total, 2, ',', '.'); ?></td>
				</tr>
				<tr>
					<td>Taxa</td>
					<td>R$ <?php echo number_format($taxa, 2, ',', '.'); ?></td>
				</tr>
				<tr>
					<td>Total</td>
					<td>R$ <?php echo number_format($totalFinal, 2, ',', '.'); ?></td>
				</tr>
			</table>
		</div>
		<select class="select-opt" name="" id="">
			<option value="">Forma de Pagamento</option>
			<option value="">Débito</option>
			<option value="">Crédito</option>
		</select>
	</div>

	<button class="btn-trip">Finalizar Compra</button>

</body>
</html>
