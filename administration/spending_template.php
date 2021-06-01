<?php 
	include '../php/connect.php';
	include '../php/session.php';
	$name = $_GET['name'];
	$id = $_GET['id'];
	$description = $_GET['description'];
	$price = $_GET['price'];
	$type = $_GET['type'];
	$sql_user = "SELECT * FROM nhanvien where email ='". $_SESSION['user']. "' limit 1";
	$res = mysqli_query($conn, $sql_user);
	$row_user = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!-- Favicon -->

		<!-- Invoice styling -->
		<style>
			body {
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				text-align: center;
				color: #777;
			}

			body h1 {
				font-weight: 300;
				margin-bottom: 0px;
				padding-bottom: 0px;
				color: #000;
			}

			body h3 {
				font-weight: 300;
				margin-top: 10px;
				margin-bottom: 20px;
				font-style: italic;
				color: #555;
			}

			body a {
				color: #06f;
			}

			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
				border-collapse: collapse;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table>
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="./images/logo.png" alt="Mr.Chau logo" style="width: 100%; max-width: 300px" />
								</td>

								<td>
									Hoá đơn chi :<?=$id?> <br />
									Created: <?php echo date("d/m/Y")?><br />

								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									Anh ngữ Mr.Chau.<br />
									7/26/50/286 Lê Lai<br />
                                    Ngô Quyền, Hải Phòng
								</td>

								<td>
									<?=$row_user['TenNV']?><br />
									<?=$row_user['sdt']?><br />
									<?=$row_user['email']?><br />
								</td>
							</tr>
						</table>
					</td>
				</tr>

                <tr>
					<td>Tên</td>
					<td><?=$price?></td>
				</tr>
				<tr>
					<td><?=$type?></td>
					<td><?=$description?></td>
				</tr>
				<hr>

				<tr class="heading" >
					<td >Tổng</td>
					<td><?php echo number_format($price, 0, ',', '.') . "đ";?></td>
				</tr>
			</table>
		</div>
	</body>
</html>