<?php
require_once (__DIR__."/../config.php");


//CONNECT TO THE DATA BASE

$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
];
$dsn = "pgsql:host=".$config['db_host'].";dbname=".$config['db_name'].";port=".$config['db_port'];

try {
$pdo = new \PDO($dsn, $config['db_user'], $config['db_password'], $options);

?>
	<div align="center">
		<h2>Sample Test Data</h2>
		
<?php
	if ($pdo) {
		echo "Connected to the database successfully!";
	}
} 
catch (PDOException $e) {
	die($e->getMessage());
} 


finally {
	if ($pdo) {
		$stmt = $pdo->prepare("SELECT * FROM db_versions WHERE version>:id");
	 	$bindings["id"]=0;
	    $stmt->execute($bindings);
	    $data= $stmt->fetchAll();
		$pdo = null;
	}
}

?>

		<hr>
		<table>
			<thead>
				<th>Version</th>
				<th>Timestamp</th>
				<th>Change Log</th>
			</thead>
			<tbody>
				<?php
					foreach ($data as $row) {

					echo "<tr><td>". $row['version'] . "</td><td>" . $row['timestamp']. "</td><td>" . $row['change_log'] ."</td></tr>";
					}
				?>
			</tbody>

		</table>
	</div>

<?php



phpinfo();
