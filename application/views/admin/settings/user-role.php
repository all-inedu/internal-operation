<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings Role</title>
    <link rel="icon" href="<?=base_url('assets/img/bigdata.ico');?>" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="<?=base_url();?>assets/css/style-sidebars.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/fc-3.3.0/fh-3.1.6/datatables.min.css" />
    <link rel="stylesheet" href="<?=base_url('assets/css');?>/icofont/icofont.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/jquery-ui.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/styles.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/all-in.css">
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="m-0 mb-3">User List : </h5>
                        <table class="table table-bordered table-hover">
                            <?php foreach ($users as $u): ?>
                            <tr onclick="window.location='<?=base_url('admin/settings/menus/'.$u['empl_id']);?>'">
                                <td>
                                    <?=$u['empl_firstname'].' '.$u['empl_lastname'];?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="m-0 mb-3">Menu List : <?=$empl['empl_firstname'].' '.$empl['empl_lastname'];?></h5>
                        <form action="" method="post">
                            <input type="hidden" name="empl_id" value="<?=$empl['empl_id'];?>">
                            <table class="table table-hover table-bordered">
                                <?php $i=1; foreach ($menus as $m) : ?>
                                <tr class="align-middle">
                                    <td class="text-center" width="1%">
                                        <?=$i;?>
                                    </td>
                                    <td>
                                        <p>
                                            <b><?=$m['menus_mainmenu'];?></b>
                                            <?php if($m['menus_menu']) { ?>
                                            - <?=$m['menus_menu'];?>
                                            <?php }?>
                                        </p>
                                    </td>
                                    <td class="text-center">
                                        <?php 
                                        $menus_id = $m['menus_id'];
                                        $check = $this->menu->checkMenu($empl['empl_id'], $menus_id, 1);
                                        if($check) {
                                            $class='checked';
                                        } else {
                                            $class='';
                                        }
                                    ?>
                                        <input type="checkbox" name="menus_id[]" value="<?=$m['menus_id'];?>"
                                            <?=$class;?>>
                                    </td>
                                </tr>
                                <?php $i++; endforeach; ?>
                            </table>
                            <button type="submit" class="btn btn-sm btn-primary"><i class="icofont-save"></i> Save
                                Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>