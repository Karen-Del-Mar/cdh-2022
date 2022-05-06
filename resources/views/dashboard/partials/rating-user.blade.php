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
        <div class="row justify-content-center align-items-center mt-4">
            <div class="d-md-flex d-lg-flex d-sm-block">
                <div class="">
                    <canvas id="barChart" width="400" height="400"></canvas>
                </div>
                <div class="">
                    <div class="p-4"> <strong>Preguntas</strong></div>
                    
                    <div class="ms-4">
                        <strong>P1:</strong>
                        <p>Aquí va el enunciado de la pregunta 1</p>
                    </div>
                    <div class="ms-4">
                        <strong>P2:</strong>
                        <p>Aquí va el enunciado de la pregunta 2</p>
                    </div>
                    <div class="ms-4">
                        <strong>P3:</strong>
                        <p>Aquí va el enunciado de la pregunta 3</p>
                    </div>
                    <div class="ms-4">
                        <strong>P4:</strong>
                        <p>Aquí va el enunciado de la pregunta 4</p>
                    </div>
                    <div class="ms-4">
                        <strong>P5:</strong>
                        <p>Aquí va el enunciado de la pregunta 5</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            var datas = <?php echo json_encode($datas); ?>;
            console.log(datas);

            var barCanvas = document.getElementById('barChart').getContext('2d');
            var barChart = new Chart(barCanvas, {
                type: 'horizontalBar',
                /*pie horizontalBar*/
                data: {
                    labels: ['Pregunta 1', 'Pregunta 2', 'Pregunta 3', 'Pregunta 4', 'Pregunta 5'],
                    datasets: [{
                        label: '# Valoración promedio por pregunta',
                        data: datas,
                        backgroundColor: [
                            'rgb(236, 112, 99)',
                            'rgb(210, 180, 222)',
                            'rgb(133, 193, 233)',
                            'rgb(247, 220, 111)',
                            'rgb(153, 102, 255)'
                        ]
                    }]
                },
                options: {
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            position: 'top' // Establezca el valor de la posición en la parte superior, y el eje X se mostrará en la parte superior
                        }]
                    }
                }

            })

        });
    </script>
@endsection
