<div class="content">
    <div class="row">
        <div class="col-md-12 mb-2">
            <div class="card shadow">
                <div class="row no-gutters p-2">
                    <div class="col-md-4 align-middle p-1">
                        <div class="card-body text-center">
                            <h5 class="mb-0">Overall Students Program Status</h5>
                            <small>Month to Date</small>
                            <hr class="mb-3 mt-0">
                            <canvas id="Overall" style="height:105vh; width:90vw"></canvas>
                        </div>

                        <div class=" card shadow mt-2">
                            <div class="card-body text-center">
                                <h6 class="mb-0">Initial Consultation</h6>
                                <small>Month to Date</small>
                                <hr class="mb-3 mt-2">
                                Potential of Admissions Mentoring : <b><?=$init_consult_empl;?></b> <br>
                                Initial Assessment Sent: <b><?=$ass_sent_empl;?></b>
                                <hr class="mb-2 mt-2">
                                Initial Assessment Making: <b>
                                    <?php
                                        if(empty($ass_making_empl['ass_making'])) { echo '-';}
                                        else {
                                            echo number_format(($ass_making_empl['ass_making']/$ass_making_empl['tot']),0);
                                        }
                                    ?> Days
                                </b>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 p-1">
                        <div class="card shadow">
                            <div class="card-body text-center">
                                <h5 class="mb-0">Admissions Mentoring</h5>
                                <small>Month to Date</small>
                                <hr class="mb-3 mt-0">
                                <canvas id="admChartEmpl" style="height:60vh; width:90vw"></canvas>
                                <div class="badge badge-default p-1 pl-4 pr-4 m-1">
                                    Total IDR : Rp. <?= number_format($tot_inv_adm_empl[0]['tot'],0);?>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow mt-2">
                            <div class="card-body text-center">
                                <h5 class="mb-0">Career Exploration</h5>
                                <small>Month to Date</small>
                                <hr class="mb-3 mt-0">
                                <canvas id="careerChartEmpl" style="height:60vh; width:90vw"></canvas>
                                <div class="badge badge-default p-1 pl-4 pr-4 m-1">
                                    Total IDR : Rp. <?= number_format($tot_inv_career_empl[0]['tot'],0);?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 p-1">
                        <div class="card shadow">
                            <div class="card-body text-center">
                                <h5 class="mb-0">SAT</h5>
                                <small>Month to Date</small>
                                <hr class="mb-3 mt-0">
                                <canvas id="satChartEmpl" style="height:60vh; width:90vw"></canvas>
                                <div class="badge badge-default p-1 pl-4 pr-4 m-1">
                                    Total IDR : Rp. <?= number_format($tot_inv_sat_empl[0]['tot'],0);?>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow mt-2">
                            <div class="card-body text-center">
                                <h5 class="mb-0">Writing Course</h5>
                                <small>Month to Date</small>
                                <hr class="mb-3 mt-0">
                                <canvas id="writingChartEmpl" style="height:60vh; width:90vw"></canvas>
                                <div class="badge badge-default p-1 pl-4 pr-4 m-1">
                                    Total IDR : Rp. <?= number_format($tot_inv_writing_empl[0]['tot'],0);?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="<?=base_url('assets/js/moment.js');?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script>
var ctx = document.getElementById('Overall');
var progs = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Pending', 'Failed', 'Success'],
        datasets: [{
            label: '# of Votes',
            data: ['<?=$pend_empl;?>', '<?=$fail_empl;?>', '<?=$succ_empl;?>'],
            backgroundColor: [
                'rgba(255, 193, 7, 0.7)',
                'rgba(255, 71, 71, 1)',
                'rgba(60, 201, 69, 0.7)'
            ],
            borderWidth: 2
        }],
    },
    options: {
        legend: {
            display: true,
            labels: {
                boxWidth: 10
            }
        },
        'onClick': function(e) {
            var activePoints = progs.getElementsAtEvent(e);
            var selectedIndex = activePoints[0]._index;
            if (selectedIndex == 0) {
                window.location.href = "<?=base_url('client/dashboard/program/all/pending/'.$empl_id);?>";
            } else if (selectedIndex == 1) {
                window.location.href = "<?=base_url('client/dashboard/program/all/failed/'.$empl_id);?>";
            } else if (selectedIndex == 2) {
                window.location.href = "<?=base_url('client/dashboard/program/all/success/'.$empl_id);?>";
            }
        }
    },
});


//Admission Chart
var adms = new Chart($('#admChartEmpl'), {
    type: 'doughnut',
    data: {
        labels: ['Pending', 'Failed', 'Success'],
        datasets: [{
            label: '# of Votes',
            data: ['<?=$pend_adm_empl;?>', '<?=$fail_adm_empl;?>', '<?=$succ_adm_empl;?>'],
            backgroundColor: [
                'rgba(255, 193, 7, 0.7)',
                'rgba(255, 71, 71, 1)',
                'rgba(60, 201, 69, 0.7)'
            ],
            borderWidth: 2
        }],
    },
    options: {
        legend: {
            display: false
        },
        'onClick': function(e) {
            var activePoints = adms.getElementsAtEvent(e);
            var selectedIndex = activePoints[0]._index;
            if (selectedIndex == 0) {
                window.location.href =
                    "<?=base_url('client/dashboard/program/admissions/pending/'.$empl_id);?>";
            } else if (selectedIndex == 1) {
                window.location.href =
                    "<?=base_url('client/dashboard/program/admissions/failed/'.$empl_id);?>";
            } else if (selectedIndex == 2) {
                window.location.href =
                    "<?=base_url('client/dashboard/program/admissions/success/'.$empl_id);?>";
            }
        }
    }
});

//Career Exploration Chart
var career = new Chart($('#careerChartEmpl'), {
    type: 'doughnut',
    data: {
        labels: ['Pending', 'Failed', 'Success'],
        datasets: [{
            label: '# of Votes',
            data: ['<?=$pend_career_empl;?>', '<?=$fail_career_empl;?>', '<?=$succ_career_empl;?>'],
            backgroundColor: [
                'rgba(255, 193, 7, 0.7)',
                'rgba(255, 71, 71, 1)',
                'rgba(60, 201, 69, 0.7)'
            ],
            borderWidth: 2
        }],
    },
    options: {
        legend: {
            display: false
        },
        'onClick': function(e) {
            var activePoints = career.getElementsAtEvent(e);
            var selectedIndex = activePoints[0]._index;
            if (selectedIndex == 0) {
                window.location.href =
                    "<?=base_url('client/dashboard/program/career/pending/'.$empl_id);?>";
            } else if (selectedIndex == 1) {
                window.location.href = "<?=base_url('client/dashboard/program/career/failed/'.$empl_id);?>";
            } else if (selectedIndex == 2) {
                window.location.href =
                    "<?=base_url('client/dashboard/program/career/success/'.$empl_id);?>";
            }
        }
    }
});

//SAT Chart
var sat = new Chart($('#satChartEmpl'), {
    type: 'doughnut',
    data: {
        labels: ['Pending', 'Failed', 'Success'],
        datasets: [{
            label: '# of Votes',
            data: ['<?=$pend_sat_empl;?>', '<?=$fail_sat_empl;?>', '<?=$succ_sat_empl;?>'],
            backgroundColor: [
                'rgba(255, 193, 7, 0.7)',
                'rgba(255, 71, 71, 1)',
                'rgba(60, 201, 69, 0.7)'
            ],
            borderWidth: 2
        }],
    },
    options: {
        legend: {
            display: false
        },
        'onClick': function(e) {
            var activePoints = sat.getElementsAtEvent(e);
            var selectedIndex = activePoints[0]._index;
            if (selectedIndex == 0) {
                window.location.href = "<?=base_url('client/dashboard/program/sat/pending/'.$empl_id);?>";
            } else if (selectedIndex == 1) {
                window.location.href = "<?=base_url('client/dashboard/program/sat/failed/'.$empl_id);?>";
            } else if (selectedIndex == 2) {
                window.location.href = "<?=base_url('client/dashboard/program/sat/success/'.$empl_id);?>";
            }
        }
    }
});

//SAT Chart
var writing = new Chart($('#writingChartEmpl'), {
    type: 'doughnut',
    data: {
        labels: ['Pending', 'Failed', 'Success'],
        datasets: [{
            label: '# of Votes',
            data: ['<?=$pend_writing_empl;?>', '<?=$fail_writing_empl;?>', '<?=$succ_writing_empl;?>'],
            backgroundColor: [
                'rgba(255, 193, 7, 0.7)',
                'rgba(255, 71, 71, 1)',
                'rgba(60, 201, 69, 0.7)'
            ],
            borderWidth: 2
        }],
    },
    options: {
        legend: {
            display: false
        },
        'onClick': function(e) {
            var activePoints = writing.getElementsAtEvent(e);
            var selectedIndex = activePoints[0]._index;
            if (selectedIndex == 0) {
                window.location.href =
                    "<?=base_url('client/dashboard/program/writing/pending/'.$empl_id);?>";
            } else if (selectedIndex == 1) {
                window.location.href =
                    "<?=base_url('client/dashboard/program/writing/failed/'.$empl_id);?>";
            } else if (selectedIndex == 2) {
                window.location.href =
                    "<?=base_url('client/dashboard/program/writing/success/'.$empl_id);?>";
            }
        }
    }
});
</script>