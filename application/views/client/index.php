<style>
.half-circle {
    position: relative;
    width: 200px;
    height: 200px;
    background: red;
}
</style>

<div class="container-fluid p-1">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" style="margin:7px -5px -10px -5px;">
                <div class="breadcrumb text-dark bg-white font-weight-bold  shadow border">
                    <i class="fas fa-home mt-1"></i>&nbsp; &nbsp; Home Page
                </div>
            </nav>
        </div>
    </div>
</div>
<div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
<div class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-3 shadow">
                <div class="row no-gutters">
                    <div class="col-md-4 text-center align-middle p-4">
                        <img src="https://image.flaticon.com/icons/png/512/1192/premium/1192896.png" alt="prospective"
                            width="70%">
                    </div>
                    <div class="col-md-8 bg-info text-white shadow align-middle">
                        <div class="card-body">
                            <h5 class="text-right mb-0">1.230</h5>
                            <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                            <h5 class="card-title text-right mb-0">Prospective Client</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3 shadow">
                <div class="row no-gutters">
                    <div class="col-md-4 text-center align-middle p-4">
                        <img src="https://image.flaticon.com/icons/png/512/950/950268.png" alt="Potential" width="70%">
                    </div>
                    <div class="col-md-8 bg-primary text-white shadow align-middle">
                        <div class="card-body">
                            <h5 class="text-right mb-0">430</h5>
                            <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                            <h5 class="card-title text-right mb-0">Potential Client</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3 shadow">
                <div class="row no-gutters">
                    <div class="col-md-4 text-center align-middle p-4">
                        <img src="https://image.flaticon.com/icons/png/512/2037/2037905.png" alt="Potential"
                            width="70%">
                    </div>
                    <div class="col-md-8 bg-success text-white shadow align-middle">
                        <div class="card-body">
                            <h5 class="text-right mb-0">230</h5>
                            <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                            <h5 class="card-title text-right mb-0">Fix Client</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card shadow">
                <div class="row no-gutters">
                    <div class="col-md-4 my-auto">
                        <div class="card-body p-3">
                            <canvas id="myChart" width="100px" height="100px"></canvas>
                        </div>
                    </div>
                    <div class="col-md-8 bg-secondary shadow my-auto pt-5 pb-5">
                        <div class="card-body text-white">
                            <h5 class="card-title">Potential Student's Program Status</h5>
                            <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                            <h6>- Pending <div class="float-right font-weight-bold badge badge-warning">8</div>
                            </h6>
                            <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                            <h6>- Cancel <div class="float-right font-weight-bold badge badge-danger">4</div>
                            </h6>
                            <div class="line" style="margin-top:15px; margin-bottom:15px;"></div>
                            <h6>- Success <div class="float-right font-weight-bold badge badge-success">15</div>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-body">
                    <canvas id="myLead" style="height:100vh; width:90vw"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script>
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Pending', 'Cancel', 'Success'],
        datasets: [{
            label: '# of Votes',
            data: [8, 4, 15],
            backgroundColor: [
                'rgba(255, 193, 7, 0.7)',
                'rgba(255, 71, 71, 1)',
                'rgba(60, 201, 69, 0.7)'
            ],
            borderWidth: 2
        }]
    }
});

var ls = document.getElementById('myLead');
var myChart = new Chart(ls, {
    type: 'bar',
    data: {
        labels: ['WA Blast', 'Website', 'Instagram', 'Edufair', 'Workshop', 'Word of Mouth', 'Poster',
            'Referral', 'Cross Selling', 'Email', 'Bizdev', 'Up Selling', 'Info Session'
        ],
        datasets: [{
            label: 'Lead Source',
            data: [8, 4, 15, 8, 4, 15, 8, 4, 15, 14, 4, 15, 14],
            backgroundColor: [
                'rgba(255, 193, 7, 0.7)',
                'rgba(45, 71, 71, 1)',
                'rgba(24, 42, 69, 0.7)',
                'rgba(34, 111, 7, 0.7)',
                'rgba(255, 71, 71, 1)',
                'rgba(111, 53, 69, 0.7)',
                'rgba(132, 121, 7, 0.7)',
                'rgba(222, 71, 122, 1)',
                'rgba(60, 111, 123, 0.7)',
                'rgba(60, 201, 69, 0.7)',
                'rgba(121, 71, 21, 1)',
                'rgba(42, 111, 12, 0.7)',
                'rgba(168, 23, 111, 0.7)'
            ],
            borderWidth: 2
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
});
</script>