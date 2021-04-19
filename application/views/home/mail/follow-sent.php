<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Follow-Up Reminder</title>
    <style>
    table {
        border-collapse: collapse;
    }

    table tr th {
        padding: 10px;
        background: #dedede;
        text-align: center;
    }

    table tr td {
        padding: 5px;
    }
    </style>
</head>
<?php
    $next_day = date('Y-m-d',(strtotime ( '+1 day' , strtotime ( date('Y-m-d')) ) ));
    $next_2_day = date('Y-m-d',(strtotime ( '+2 day' , strtotime ( date('Y-m-d')) ) ));
?>

<body>
    <h3>Follow-Up Reminder</h3>
    <hr>
    Date : <?= date('d M Y',(strtotime($next_day)));?>
    <table width="100%" border="1">
        <tr>
            <th width="5%" align="center">No</th>
            <th width="25%" align="center">Students Name</th>
            <th width="50%" align="center">Program</th>
            <th width="25%" align="center">PIC</th>
        </tr>
        <?php 
            $no=1;
            foreach($flw as $f):
            if($f['flw_date']==$next_day) {
        ?>
        <tr>
            <td align="center"><?=$no;?></td>
            <td><?=$f['st_firstname']." ".$f['st_lastname'];?></td>
            <td><?=$f['prog_sub']." ".$f['prog_program'];?></td>
            <td align="center"><?=$f['empl_firstname'];?></td>
        </tr>
        <?php 
            } 
            $no++; 
            endforeach; 
        ?>
    </table>
    <br>
    <hr>
    <br>
    Date : <?= date('d M Y',(strtotime($next_2_day)));?>
    <table width=" 100%" border="1">
        <tr>
            <th width="5%" align="center">No</th>
            <th width="25%" align="center">Students Name</th>
            <th width="50%" align="center">Program</th>
            <th width="25%" align="center">PIC</th>
        </tr>
        <?php 
            $no=1;
            foreach($flw as $f):
            if($f['flw_date']==$next_2_day) {
        ?>
        <tr>
            <td align="center"><?=$no;?></td>
            <td><?=$f['st_firstname']." ".$f['st_lastname'];?></td>
            <td><?=$f['prog_sub']." ".$f['prog_program'];?></td>
            <td align="center"><?=$f['empl_firstname'];?></td>
        </tr>
        <?php 
            } 
            $no++; 
            endforeach; 
        ?>
    </table>
</body>

</html>