<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$student['st_firstname'];?></title>
</head>

<body>
    <p>
        Dear mentors, <br>
        Here is the student's profile and related documents for admission mentoring needs.
    </p>

    <table border="0">
        <tr>
            <td>Name</td>
            <td>:</td>
            <td><?=$student['st_firstname'].' '.$student['st_lastname'];?></td>
        </tr>
        <tr>
            <td>Grade</td>
            <td>:</td>
            <td>
                <?php 
                        $ynow = date('Y');
                        $yinput = date('Y', strtotime($student['st_datecreate']));
                        $ginput = $student['st_grade'];
                        $mnow = date('m'); 
                        if(($mnow>=7) and ($ynow>$yinput)) {
                            $gnow = ($ynow - $yinput) + $ginput;
                        } else 
                        if(($mnow<7) and ($ynow>$yinput)) {
                            $gnow = ($ynow - $yinput) + ($ginput - 1);
                        } else 
                        if(($mnow>=7) and ($ynow==$yinput)) {
                            $gnow = $ginput + 1;
                        } else {
                            $gnow = $ginput;
                        }

                        if($gnow <= 12) {
                            echo $gnow;
                        } else {
                            echo 'Not High School';
                        }
                        ?>
            </td>
        </tr>
        <tr>
            <td>School</td>
            <td>:</td>
            <td><?=$student['sch_name'];?></td>
        </tr>
        <tr>
            <td>Program Name</td>
            <td>:</td>
            <td><?=$stprog['prog_sub'].': '.$stprog['prog_program'];?></td>
        </tr>
        <tr>
            <td>End Date</td>
            <td class="text-center">:</td>
            <td><?=date('M Y', strtotime($stprog['stprog_end_date']));?></td>
        </tr>
        <tr>
            <td>Total Universities</td>
            <td>:</td>
            <td><?=$stprog['stprog_tot_uni'];?></td>
        </tr>
        <tr>
            <td>Major of Study Abroad</td>
            <td>:</td>
            <td><?=$student['st_abrmajor'];?></td>
        </tr>
        <tr>
            <td>Year of Going Study Abroad</td>
            <td>:</td>
            <td><?=$student['st_abryear'];?></td>
        </tr>
    </table>
    <?php if($notes): ?>
    <p>
        Additional Notes:
        <?=$notes;?>
    </p>
    <?php endif; ?>
    <br>
    <p>
        Thank you
    </p>
</body>

</html>