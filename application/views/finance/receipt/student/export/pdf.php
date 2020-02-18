<style>
h4 {
    font-size: 25px !important;
    margin: 20px 20px;
}

.pdf {
    font-size: 12px !important;
    font-family: Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif;
    margin: 0 20px;
}

table tr td,
th {
    padding: 8px 7px;
    line-height: 15px;
}

.table-detail td,
th {
    border: 1px solid #dedede;
}
</style>
<br><br><br><br>

<table>
    <tr>
        <td>
            <h4 style="line-height:1.6; letter-spacing:2px; color:#bcbaba; font-size:18px; margin-bottom:10px; ">PAYMENT
                RECEIPT</h4>
        </td>
    </tr>
</table>

<div class="pdf">
    <table border="0" width="100%">
        <tr>
            <td width="60%">
                PT. Jawara Edukasih Indonesia</b><br>
                JL. Panjang No 36 <br>
                Jakarta Barat 11530
            </td>

            <td valign="top" width="40%">
                <table border=0 width="100%">
                    <tr>
                        <td width="40%" valign="top">
                            Received from :
                        </td>
                        <td>
                            <?=$nama;?><br><?=$alamat;?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br><br>
    <table>
        <tr>
            <td>
                Receipt No. 028/REC-JEI/II/20
            </td>
        </tr>
    </table>

    <table width="100%" class="table-detail" style="padding:8px 5px;">
        <tr align="center" style="background:#008080; color:#fff;">
            <th width="30%">Payment Method</th>
            <th width="40%">Cheque No.</th>
            <th width="30%">Amount</th>
        </tr>
        <tr>
            <td align="center">Wire Transfer</td>
            <td align="center"></td>
            <td align="right">Rp. 1.040.000</td>
        </tr>
    </table>

    <table width="100%" class="table-detail" style="padding:8px 5px;">
        <tr align="center" style="background:#008080; color:#fff;">
            <th width="8%">No</th>
            <th width="44%">Description</th>
            <th width="24%">Price (IDR)</th>
            <th width="24%">Total (IDR)</th>
        </tr>
        <tr>
            <td valign="top" align="center">1</td>
            <td valign="top" style="padding-bottom:50px;">
                <b><?=$program;?> ($ 2.200)</b> <br>
                <i>Early Bird ($ 100)</i> <br>
                <i>Discount ($ 100)</i><br>
                <i>Notes</i>
            </td>
            <td valign="top" align="right">
                Rp. 32.384.000
            </td>
            <td valign="top" align="right">
                Rp. 32.384.000 <br>
                (Rp. 1.472.000) <br>
                (Rp. 1.472.000) <br>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="right"><b>Total</b></td>
            <td valign="top" align="right">
                <b>Rp. 32.384.000</b>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td>
                <b style="letter-spacing:0.7px;"><i>Total Amount : <span id="words1"></span></i> </b>
                <br><br>
            </td>
        </tr>
    </table>
    <br><br>
    <table border=0 width="100%">
        <tr>
            <td width="60%" valign="top">

            </td>
            <td width="40%" align="center" valign="top">
                Jakarta, 4 February 2020
                <br><br><br><br><br>
                Nicholas Hendra Soepriatna <br>
                Director
            </td>
        </tr>
    </table>
    <br><br><br>
    <table width="100%">
        <tr>
            <td width="100%" align="center">
                Thank You for Your Business
            </td>
        </tr>
    </table>
</div>