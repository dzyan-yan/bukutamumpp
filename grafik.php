<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    .chart-content {
        width: 1000px;
    }
</style>

<body onload=getDataTamu()>
    <h1> test</h1>

    <div class="chart-content">
        <canvas id="myChart"></canvas>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <script>
        function getDataTamu() {
            $.ajax({
                type: 'GET',
                url: 'admin.php',
            })
        }

        const labels = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'Agustus',
            'September',
            'Oktober',

        ];

        const data = {
            labels: labels,
            datasets: [{
                label: 'Jumlah Pengunjung 7 Hari Terakhir',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45],
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

</body>

</html>