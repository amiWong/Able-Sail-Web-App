<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("../data_model/model.php");
$model = new Database_Reader;

$registrations = $model->get_all_registrations();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>View Registrations</title>

	<!--Bootstrap-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</head>
<body>
	<section class="container-fluid">
		<h1>Hello Admin!</h1>
		<p>Please view your registrations below.</p>
		<div id="registrationsarea">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Email</th>
						<th>Emergency Contact</th>
						<th>Has Contacts</th>
						<th>Has Power Wheelchair</th>
						<th>Has Manual Wheelchair</th>
						<th>Has Scooter</th>
						<th>Has Cane</th>
						<th>Has Walker</th>
						<th>Other Assistive Devices</th>
						<th>Needs Transfer Assistance</th>
						<th>Other Disabilities</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($registrations as $r): ?>
						<tr>
							<td><?php echo $r{"ID"}; ?></td>
							<td><?php echo $r{"first_name"}; ?></td>
							<td><?php echo $r{"last_name"}; ?></td>
							<td><?php echo $r{"address"}; ?></td>
							<td><a href="tel:<?php echo $r{"phone"}; ?>"><?php echo $r{"phone"}; ?></a></td>
							<td>
								<a href="mailto:<?php echo $r{"email"}; ?>"><?php echo $r{"email"}; ?></a>
							</td>
							<td><a href="tel:<?php echo $r{"emergency_contact"}; ?>"><?php echo $r{"emergency_contact"}; ?></a></td>
							<td>
								<?php 
								if($r{"lenses"}) {
									echo "Yes";
								}
								else {
									echo "No";
								} ?>
							</td>
							<td><?php 
								if($r{"wheelchair_power"}) {
									echo "Yes";
								}
								else {
									echo "No";
								} ?></td>
								<td><?php 
									if($r{"wheelchair_manual"}) {
										echo "Yes";
									}
									else {
										echo "No";
									} ?></td>
									<td><?php 
										if($r{"scooter"}) {
											echo "Yes";
										}
										else {
											echo "No";
										} ?></td>
										<td>
											<?php 
											if($r{"cane"}) {
												echo "Yes";
											}
											else {
												echo "No";
											} ?>
										</td>
										<td>
											<?php 
											if($r{"walker"}) {
												echo "Yes";
											}
											else {
												echo "No";
											} ?>
										</td>
										<td>
											<?php echo $r{"other"}; ?>
										</td>
										<td><?php echo $r{"transfer_assistance"}; ?></td>
										<td><?php echo $r{"disabilities"}; ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</section>
			</body>
			</html>