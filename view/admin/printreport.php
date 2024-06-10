<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: ../public/index.php");
    exit();
}
?>

<?php
include '../../controllers/berita.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report InternSight</title>

    <!-- chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- html2pdf.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
</head>
<style>
    body{
        display: flex;
        justify-content: center;
    }
    main{
        width: 1000px;
    }
    .graph {
        text-align: center;
        display: flex;
        flex-direction: column;
        height: 400px;
        width: 100%;
        margin-bottom: 100px;
    }

    .graph h2 {
        font-family: poppins;
    }
</style>
<body>
    <main id="reportContent">
        <div class="graph">
            <div>
                <h2>
                    Statistik Jumlah Lowongan Internship Berdasarkan Kategori
                </h2>
            </div>
            <canvas id="kategoriChart" width="200" height="200"></canvas>
        </div>
        <div class="graph">
            <div>
                <h2>
                    Statistik Jumlah Lowongan Internship Yang Dibuat Oleh Setiap Perusahaan
                </h2>
            </div>
            <canvas id="companyNewsChart" width="200" height="200"></canvas>
        </div>
    </main>
    <script>
        // Function to create the charts
        function createCharts() {
            return Promise.all([
                fetch('../../controllers/kategorireport.php')
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok ' + response.statusText);
                        }
                        return response.json();
                    })
                    .then(data => {
                        const labels = data.map(row => 'Kategori ' + row.kategori);
                        const countData = data.map(row => row.count);

                        const ctx = document.getElementById('kategoriChart').getContext('2d');
                        new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Jumlah Berita',
                                    data: countData,
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false
                            }
                        });
                    })
                    .catch(error => console.error('Error fetching data:', error)),

                fetch('../../controllers/perusahaanreport.php')
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok ' + response.statusText);
                        }
                        return response.json();
                    })
                    .then(data => {
                        const labels = data.map(row => row.nama_perusahaan);
                        const countData = data.map(row => row.jumlah_berita);

                        const ctx = document.getElementById('companyNewsChart').getContext('2d');
                        new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Jumlah Berita',
                                    data: countData,
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    })
                    .catch(error => console.error('Error fetching data:', error))
            ]);
        }

        window.addEventListener('load', () => {
            createCharts().then(() => {
                const element = document.getElementById('reportContent');
                const opt = {
                    margin: 0.5,
                    filename: 'Report_InternSight.pdf',
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 2 },
                    jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
                };

                html2pdf().from(element).set(opt).save().then(() => {
                    // Attempt to go back to the previous page
                    window.history.back();
                    // Attempt to close the window/tab
                    setTimeout(() => {
                        window.open('', '_self').close();
                    }, 1000); // Adjust the timeout if needed
                });
            });
        });
    </script>
</body>

</html>
