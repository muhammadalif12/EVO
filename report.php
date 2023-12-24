<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT tb_kandidat.id, tb_kandidat.nomor_urut, COUNT(tb_pemilihan.nomor_pengenal) AS jumlah_vote
    FROM tb_kandidat
    LEFT JOIN tb_pemilihan ON tb_kandidat.nomor_urut = tb_pemilihan.nomor_urut
    GROUP BY tb_kandidat.id ORDER BY tb_kandidat.nomor_urut ASC");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="col-lg-9 mt-2">
    <div class="card border-0 bg-light">
        <div class="card-body text-center">
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    const ctx = document.getElementById('myChart');
    
    // Extracting labels and data from PHP array
    const labels = <?php echo json_encode(array_column($result, 'nomor_urut')); ?>;
    const data = <?php echo json_encode(array_column($result, 'jumlah_vote')); ?>;

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Number of Votes',
                data: data,
                borderWidth: 1,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                hoverBackgroundColor: 'rgba(75, 192, 192, 0.4)',
                hoverBorderColor: 'rgba(75, 192, 192, 1)',
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
