<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Internal Operation</title>

    <!-- Bootstrap CSS CDN -->
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
    <link rel="stylesheet" href="<?=base_url();?>assets/css/styles.css">
    <style>
    .display tbody tr td,
    .table tbody tr td {
        vertical-align: middle;
    }

    .dtr-title:after {
        content: " :";
    }

    .dtr-title {
        font-weight: bold;
        font-size: 11px;
    }

    .dtr-data {
        display: block;
        width: 150px;
        word-wrap: break-word;
    }

    .dtr-data:before {
        content: "";
        /* this is your text. You can also use UTF-8 character codes as I do here */
    }

    .dtr-details {
        margin-bottom: 0px;
    }

    .dtr-details li {
        list-style-type: none;
        left: 0;
        border-top: 1px solid #dedede;
        border-bottom: 1px solid #dedede;
        margin-left: -40px;
        padding: 5px 0;
    }

    p {
        line-height: 1.5;
        color: #000;
        font-size: 12px;
        margin: 0 0;
    }

    .btn-sm {
        font-size: 12px;
    }

    .ss-main .ss-single-selected .placeholder .ss-disabled {
        color: #6b6b6b;
    }

    .ss-main .ss-multi-selected .ss-values .ss-value {
        background-color: #e6893a;
    }

    .file-drop-area {
        position: relative;
        display: flex;
        align-items: center;
        margin: 0px 0px;
        width: 100%;
        padding: 5px;
        border: 1px solid #dedede;
        ;
        border-radius: 3px;
        transition: 0.2s;

        &.is-active {
            background-color: red;
        }
    }

    .fake-btn {
        flex-shrink: 0;
        background-color: #3b6ddb;
        border: 1px solid #dedede;
        color: white;
        border-radius: 3px;
        padding: 5px 15px;
        margin-right: 0px;
        font-size: 12px;
        text-transform: uppercase;
    }

    .file-msg {
        width: 100%;
        padding: 5px 15px;
        font-size: small;
        font-weight: 300;
        line-height: 1.4;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        border: 1px dashed #dedede;
        border-radius: 3px;
    }

    .file-input {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        cursor: pointer;
        opacity: 0;

        &:focus {
            outline: none;
        }
    }

    .form-control-sm,
    .input-group-sm>.form-control,
    .input-group-sm>.input-group-append>.btn,
    .input-group-sm>.input-group-append>.input-group-text,
    .input-group-sm>.input-group-prepend>.btn,
    .input-group-sm>.input-group-prepend>.input-group-text {
        font-size: 12px !important;
    }

    ::-webkit-scrollbar {
        width: 5px;
    }

    ::-webkit-scrollbar-thumb {
        background: #2e7ee8;
        border-radius: 10px;
    }
    </style>
</head>

<body>

    <?php
if ($this->session->flashdata('success')) {
    echo '<div class="flash-data" data-success="' . $this->session->flashdata('success') . '"></div>';
} else if ($this->session->flashdata('error')) {
    echo '<div class="flash-data" data-error="' . $this->session->flashdata('error') . '"></div>';
} else if ($this->session->flashdata('warning')) {
    echo '<div class="flash-data" data-warning="' . $this->session->flashdata('warning') . '"></div>';
}
?>