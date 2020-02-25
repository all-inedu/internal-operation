<style>
h4 {
    font-size: 25px !important;
}

.pdf {
    font-size: 12px !important;
    font-family: Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif;
    margin: 0 20px;
}

table {
    border-collapse: collapse;
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
<br><br><br>
<div class="pdf">
    <h4
        style="line-height:1.6; letter-spacing:3px; font-weight:bold; text-align:center; color:#247df2; font-size:18px; margin-bottom:10px; ">
        <u><b>INVOICE</b></u>
    </h4>
    <table border="0" width="100%">
        <tr>
            <td width="60%">
                <table width="100%">
                    <tr>
                        <td width="15%" valign="top">From : </td>
                        <td width="85%"><b>PT. Jawara Edukasih Indonesia</b><br>
                            JL. Panjang No 36 <br>
                            Jakarta Barat 11530
                            <br><br>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">To : </td>
                        <td><b><?=$nama;?></b><br><?=$alamat;?><br>
                        </td>
                    </tr>
                </table>
            </td>

            <td valign="top" width="40%">
                <table border=0 width="100%">
                    <tr>
                        <td width="40%">
                            Invoice No<br>
                            Date<br>
                            Due Date<br>
                        </td>
                        <td>
                            : JEC/RIC/18201/2020 <br>
                            : 12 February 2020 <br>
                            : 19 February 2020 <br>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td>
                Please process payment to PT Jawara Edukasih Indonesia for the following services rendered :
            </td>
        </tr>
    </table>
    <table width="100%" class="table-detail" style="padding:8px 5px;">
        <tr align="center">
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
                <br>
                <b style="letter-spacing:0.7px;"><i>Total Amount : <span id="words1"></span></i> </b>
                <br><br>
                Terms of Payment :
                <div style="margin-left:2px;">
                    - Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
                    - Fuga atque ea tempora cumque dicta repellendus esse consequatur modi, <br>
                    - eum facilis consequuntur alias possimus corporis. <br>
                </div>
                <br>
                Terms & Conditions :
                <div style="margin-left:2px;">
                    - Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
                    - Fuga atque ea tempora cumque dicta repellendus esse consequatur modi, <br>
                    - eum facilis consequuntur alias possimus corporis. <br>
                </div>
            </td>
        </tr>
    </table>
    <br><br>
    <table border=0 width="100%">
        <tr>
            <td width="60%" valign="top">
                <b>Bank transfer details :</b>
                <table border="0" width="100%" style="padding:3px;">
                    <tr>
                        <td width="22%">
                            Beneficiancy <br>
                            Bank <br>
                            A/C No. <br>
                            Branch <br>
                        </td>
                        <td width="78%">
                            : PT. Jawara Edukasih Indonesia <br>
                            : BCA <br>
                            : 2483016611 <br>
                            : KCP Pasar Kebayoran Lama Jakarta Selatan
                        </td>
                    </tr>
                </table>
            </td>
            <td width="40%" align="center" valign="top">
                PT. Jawara Edukasih Indonesia
                <br><br><br><br><br>
                Nicholas Hendra Soepriatna <br>
                Director
            </td>
        </tr>
    </table>
</div>