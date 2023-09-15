<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<div class="topnav">
<h1 class="h1" align="center">MONITORING METER GAS</h1>
</div>
<body>

<?php 
        include "koneksi.php";

        // Ambil semua data untuk grafik
        $query_grafik = mysqli_query($koneksi, "SELECT suhu, tanggal FROM tbmonitor");

        // Persiapan array untuk data grafik
        $tanggalData = [];
        // $persentaseData = [];

        while ($data_grafik = mysqli_fetch_array($query_grafik)) {
            $tanggalData[] = $data_grafik['tanggal'];
            $persentaseData[] = $data_grafik['suhu'];
        }
    ?>


<?php 
	include "koneksi.php";

	$query = mysqli_query($koneksi, "SELECT * FROM tbmonitor ORDER BY id DESC LIMIT 1");
	while ($data = mysqli_fetch_array($query)) {
    
        

 ?>


	Waktu update terakhir :	(<?php echo $data['waktu'] ?>) Tanggal : (<?php echo $data['tanggal'] ?>)
		
<div class="container">
	<div class=kotak>
		<h2 class="h2">GAS METER</h2>
		<div class="nilai">
		<?php echo $data['suhu'] ?><font size="7">PPM</font>
		</div>
	</div>    

    <div class="kotak">
        <h2 class="h2">Grafik Tanggal</h2>
        <canvas id="myChart"></canvas>
    </div>
</div>


<script>
    // Membuat grafik menggunakan Chart.js
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($tanggalData); ?>,
            datasets: [{
                label: 'Persentase',
                data: <?php echo json_encode($persentaseData); ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        }
    });
</script>

</div>
<?php } ?>



</script>
<a href="hapus.php">Reset Data..!</a> <br><br>

</body>
</html>