<section class="m-4">
    <h1 class="m-0 pb-1">Home</h1>
    @foreach ($nameOfTechnolgies as $item)
        <div class="d-none labels">
            {{ $item }}
        </div>
    @endforeach
    @foreach ($numOfTechnolgy as $item)
        <div class="d-none datas">{{ $item }}</div>
    @endforeach
    @foreach ($numOfCategory as $item)
        <div class="d-none datas2">{{ $item }}</div>
    @endforeach
    @foreach ($nameOfCategory as $item)
        <div class="d-none labels2">
            {{ $item }}
        </div>
    @endforeach
    <div class="mt-5">
        <div class="row ">
            <div class="col-8">
                <canvas id="myChart"></canvas>
            </div>
            <div class="col-4">
                <canvas id="myChart2"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/DavideViolante/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>

    <script>
        const technologies = [];
        document.querySelectorAll('div.labels').forEach((value) => {
            technologies.push(value.textContent);
        })

        const datas = [];
        document.querySelectorAll('div.datas').forEach((value) => {
            datas.push(parseInt(value.textContent));
        })

        const datas2 = [];
        document.querySelectorAll('div.datas2').forEach((value) => {
            datas2.push(parseInt(value.textContent));
        })

        const categories = [];
        document.querySelectorAll('div.labels2').forEach((value) => {
            categories.push(value.textContent);
        })

        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: technologies,
                datasets: [{
                    label: 'Technologies',
                    data: datas,
                    borderWidth: 5,
                    backgroundColor: ['#9f9080ff', '#cdb49aff', '#535356ff']
                }, ]
            },

            options: {
                indexAxis: 'y',
                plugins: {
                    title: {
                        display: true,
                        text: 'Most used technologies',
                        color: '#535356ff',
                        font: {
                            size: 30,
                            weight: 'bold'
                        },
                        padding: {
                            top: 0,
                            left: 0,
                            right: 0,
                            bottom: 0
                        }
                    }
                },
                scales: {
                    x: {
                        beginAtZero: false,
                        ticks: {
                            align: 'end',
                        }
                    },
                    y: {
                        beginAtZero: true,
                    }
                }
            },
        });

        const ctx2 = document.getElementById('myChart2');
        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: categories,
                datasets: [{
                    label: 'Categories',
                    data: datas2,
                    borderWidth: 5,
                    backgroundColor: ['#cdb49aff', '#9f9080ff', '#535356ff']
                }, ]
            },

            options: {
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {}
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,

                    }
                }
            },
        });
    </script>
</section>
