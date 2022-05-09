@section('scripts')
    @parent
    <!-- The rest of your scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"
        integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

    {{-- <div class="container"> --}}
        <div class="row justify-content-center align-items-center mt-4">
            <div class="d-md-flex d-lg-flex d-sm-block">
                <div>
                    <canvas id="horizontalChart" width="400"></canvas>
                </div>

            </div>
        </div>
    {{-- </div> --}}

<script>
    $(function() {
        var datas = <?php echo json_encode($datas); ?>;
        console.log(datas);

        var barCanvas = document.getElementById('horizontalChart').getContext('2d');
        var barChart = new Chart(barCanvas, {
            type: 'horizontalBar',
            /*pie horizontalBar*/
            data: {
                labels: ['Conocimiento', 'Desempeño', 'Compromiso', 'Puntualidad',
                    'Presentación y cordialidad'
                ],
                datasets: [{
                    label: '# Valoración promedio por pregunta',
                    data: datas,
                    backgroundColor: [
                        'rgb(244, 180, 0)',
                        'rgb(244, 180, 0)',
                        'rgb(244, 180, 0)',
                        'rgb(244, 180, 0)',
                        'rgb(244, 180, 0)'
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
