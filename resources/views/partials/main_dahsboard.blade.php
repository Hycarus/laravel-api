<section class="m-4">
    <h1 class="m-0 pb-1">Home</h1>
    <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">Project</a>
    <a class="btn btn-primary" href="{{ route('admin.categories.index') }}">Category</a>
    <a href="{{ route('admin.technologies.index') }}" class="btn btn-primary">Technology</a>
    <script>
        axios.get('http://127.0.0.1:8000/api/projects').then((response) => {
            this.projects = response.data;
            console.log(this.projects);
        }).catch((err) => {

        });
    </script>
    <div>
        <canvas id="myChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <script>
        const ctx = document.getElementById('myChart');


        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Laravel', 'Vue', 'PHP', 'Bootstrap', 'SCSS', 'HTML'],
                datasets: [{
                        label: '# of Technologies',
                        data: [12, 19, 3, 5, 2, 3],
                        borderWidth: 5,
                        backgroundColor: '#9f9080ff'
                    },
                    {
                        label: '# of Projects',
                        data: [5, 3, 15, 21, 14, 9],
                        borderWidth: 5,
                        backgroundColor: '#535356ff'
                    }
                ]
            },

            options: {
                animations: {
                    tension: {
                        duration: 2500,
                        easing: 'linear',
                        from: 0.5,
                        to: 0,
                        loop: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        });
    </script>
</section>
