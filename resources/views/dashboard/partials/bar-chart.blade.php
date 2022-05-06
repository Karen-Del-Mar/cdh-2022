@extends('dashboard.master')

@section('scripts')
    @parent
    <!-- The rest of your scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"
        integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('content')
<div class="container">
    <div class="row height d-flex justify-content-center align-items-center mt-4">
    <div class="row col-3">
        <canvas id="barChart" width="400" height="400"></canvas>
    </div>
    </div>
</div>

    <script>
        $(function() {
            var datas = `<?php echo json_encode($datas); ?>`;
            console.log(datas);
            var d = [];

            for (let i = 1; i < datas.length - 1; i++) {
                if (datas[i] == ',') {
                    i++;
                }
                d.push(datas[Number(i)]);
            }
            console.log(d);

            var barCanvas = document.getElementById('barChart').getContext('2d');
            var barChart = new Chart(barCanvas, {
                type: 'bar', /*pie*/
                data: {
                    labels: ['Ene', 'Feb', 'Mzo', 'Abr', 'May', 'Jun', 'Jul', 'Agt', 'Sept', 'Oct', 'Nov',
                        'Dec'
                    ],
                    datasets: [{
                        label: '# Nuevos usuarios',
                        data: d,
                        backgroundColor: [
                            'rgb(236, 112, 99)',
                            'rgb(210, 180, 222)',
                            'rgb(133, 193, 233)',
                            'rgb(247, 220, 111)',
                            'rgb(153, 102, 255)',
                            'rgb(255, 51, 150)',
                            'rgb(255,164,58)',
                            'rgb(117,158,255)',
                            'rgb(156,224,219)',
                            'rgb(200,81,163)',
                            'rgb(92,203,95)',
                            'rgb(241,108,108)'
                        ]
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }

            })

        });
    </script>
@endsection
