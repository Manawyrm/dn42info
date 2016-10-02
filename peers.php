<?php
	include("config.php");
	include("header.php");
	/* 
	birdc6 show protocol | curl -X POST --form upload=@- https://dn42info.tbspace.de/pushInfo.php?key=keyhier
	*/

	$bird4peers = json_decode(file_get_contents("bird4.json"));
	$bird6peers = json_decode(file_get_contents("bird6.json"));
?>
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Active Peerings IPv6</div>
					<table class="table table-striped table-responsive table-hover">
						<thead>
							<tr>
								<th class="col-md-1" style="width: 0.133333%;">&nbsp;</th>
								<th class="col-md-2">Name</th>
								<th class="col-md-2">Status</th>
								<th class="col-md-2">Time</th>
								<th class="col-md-1">State</th>
								<th class="col-md-4">Error</th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach ($bird6peers as $peer)
							{
								switch ($peer[5])
								{
									case 'Established':
										$class = "success";
										break;
									case 'Connect':
										$class = "warning";
										break;
									case 'Idle':
										$class = "danger";
										break;
									default:
										$class = "";
										break;
								}
						?>
							<tr>
								<td class="<?php echo $class; ?>">&nbsp;</td>
								<td><?php echo $peer[0]; ?></td>
								<td><?php echo $peer[3]; ?></td>
								<td><?php echo $peer[4]; ?></td>
								<td><?php echo $peer[5]; ?></td>
								<td><?php echo $peer[6]; ?></td>
							</tr>
						<?php 
							}
						?>
						</tbody>
					</table>
					<div class="panel-footer">
					Updated <?php echo date("d.m.Y H:i:s", filemtime("bird6.json")); ?>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Active Peerings IPv4</div>
					<table class="table table-striped table-responsive table-hover">
						<thead>
							<tr>
								<th class="col-md-1" style="width: 0.133333%;">&nbsp;</th>
								<th class="col-md-1">Name</th>
								<th class="col-md-1">Status</th>
								<th class="col-md-1">Time</th>
								<th class="col-md-1">State</th>
								<th class="col-md-2">Error</th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach ($bird4peers as $peer)
							{
								switch ($peer[5])
								{
									case 'Established':
										$class = "success";
										break;
									case 'Connect':
										$class = "warning";
										break;
									case 'Idle':
										$class = "danger";
										break;
									default:
										$class = "";
										break;
								}
						?>
							<tr>
								<td class="<?php echo $class; ?>" >&nbsp;</td>
								<td><?php echo $peer[0]; ?></td>
								<td><?php echo $peer[3]; ?></td>
								<td><?php echo $peer[4]; ?></td>
								<td><?php echo $peer[5]; ?></td>
								<td><?php echo $peer[6]; ?></td>
							</tr>
						<?php 
							}
						?>
						</tbody>
					</table>
					<div class="panel-footer">
					Updated <?php echo date("d.m.Y H:i:s", filemtime("bird4.json")); ?>
					</div>
				</div>
			</div>
		</div>
<?php include("footer.php"); ?>