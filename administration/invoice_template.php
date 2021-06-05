<?php 
	include '../php/connect.php';
	session_start();
	if(isset($_GET['invoice_id'])){
	$invoice_id = $_GET['invoice_id'];
	$sql_invoice = "SELECT * FROM invoice where id = $invoice_id";
	$res_invoice = mysqli_query($conn, $sql_invoice);
	$row_invoice = mysqli_fetch_assoc($res_invoice);
	}
	if(isset($_GET['student_id'])){
		$student_id = $_GET['student_id'];
		$sql_invoice = "SELECT * FROM invoice where student_id = $student_id";
		$res_invoice = mysqli_query($conn, $sql_invoice);
		$row_invoice = mysqli_fetch_assoc($res_invoice);
		$invoice_id = $row_invoice['id'];
	}
	$course_id = $row_invoice['course_id'];
	$price =  $row_invoice['total'];
	$paid = $row_invoice['paid'];
	$student_id = $row_invoice['student_id'];
	$create_uid = $row_invoice['create_uid'];
	
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
									Hoá đơn thu :<?=$invoice_id?> <br />
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
								<?php 
									$sql_staff = "SELECT * FROM nhanvien where id = $create_uid";
									$res_staff = mysqli_query($conn, $sql_staff);
									while ($row_staff = mysqli_fetch_assoc($res_staff)){
								?>
									<strong>Bên thu: </strong><br>
									 <?=$row_staff['TenNV']?><br />
									<?=$row_staff['sdt']?><br />
									<?=$row_staff['email']?><br />
									<?php } ?>
								</td>

							</tr>
						</table>
					</td>
				</tr>
				<?php 
					$sql_student = "SELECT * FROM hocvien where id = $student_id";
					$res_student = mysqli_query($conn, $sql_student);
					$row = mysqli_fetch_assoc($res_student);
					$id_student = $row['id'];
					$name_student = $row['name'];
				?>
				<p>Hoá đơn tiền học của <?=$id_student?> - <?=$name_student?></p>
				<tr class="heading">
					<td>Khoá Học</td>
					<td>Price</td>
				</tr>	
				<?php 
					$sql_course = "SELECT * FROM course WHERE id = ". $course_id;
					$res_course = mysqli_query($conn,$sql_course);
					while ($row_course = mysqli_fetch_assoc($res_course)){
						echo '<tr>';
						echo '<td>'.$row_course['tenKH'].'</td>';
						echo '<td>'.$row_course['price'].'</td>';
						echo '</tr>';
						
					}
				?>
                <tr class="heading">
					<td>Tài liệu</td>
					<td>Price</td>
				</tr>
				<?php 
					$sql_doc = "SELECT tailieu.tenTL, tailieu.price from course_tailieu_rel INNER JOIN tailieu on course_tailieu_rel.id_tailieu = tailieu.id WHERE course_tailieu_rel.id_khoahoc = ". $course_id;
					$res_doc = mysqli_query($conn, $sql_doc);
					while ($row_doc = mysqli_fetch_assoc($res_doc)){
						echo '<tr>';
						echo '<td>'.$row_doc['tenTL'].'</td>';
						echo '<td>'.$row_doc['price'].'</td>';
						echo '</tr>';
					}
				?>
				<hr>
				<?php 
					$sql_doc = "SELECT sum(tailieu.price) as 'sum_price_doc' from course_tailieu_rel INNER JOIN tailieu on course_tailieu_rel.id_tailieu = tailieu.id WHERE course_tailieu_rel.id_khoahoc = ". $course_id;
					$res_doc = mysqli_query($conn, $sql_doc);
					while ($row_total_doc = mysqli_fetch_assoc($res_doc)){
						echo '<tr class="total">';
						echo '<td><strong>Tổng tài liệu</strong></td>';
						echo '<td>'.$row_total_doc['sum_price_doc'].'</td>';
						echo '</tr>';
					}
				?>

				<tr class="heading" >
					<td >Tổng</td>
					<td><?php echo number_format($price, 0, ',', '.') . "đ";?></td>
				</tr>
				<tr >
					<td>Đã thanh toán</td>
					<td><?php echo number_format($price, 0, ',', '.') . "đ";?></td>
				</tr>
			</table>
		</div>
	</body>
</html>