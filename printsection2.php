<div class="container" style="margin-top: 9px">
    <table width="100%">
        <tr>
            <td style="width: 30%"><img src="assets/images/logos/mra.png" width="120" alt=""></td>
            <td style="width: 70%">
                <h4><strong>MRA GLOBAL SDN BHD</strong><br><h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LEAVE FORM</h6></h4>
            </td>
        </tr>
    </table>
    <br>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%">DATE</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 1%">:</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 69%; border-bottom: 2px solid"></td>
        </tr>
    </table>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%">NAME</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 1%">:</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 69%; border-bottom: 2px solid"></td>
        </tr>
    </table>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%">IC NUMBER</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 1%">:</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 69%; border-bottom: 2px solid"></td>
        </tr>
    </table>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%">POSITION</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 1%">:</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 69%; border-bottom: 2px solid"></td>
        </tr>
    </table>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%">DATE APPLY</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 1%">:</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 29%; border-bottom: 2px solid"></td>
            <td style="padding-top:3px; padding-bottom:3px; width: 10%">UNTIL</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 1%">:</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 29%; border-bottom: 2px solid"></td>
        </tr>
    </table>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%"></td>
            <td style="padding-top:3px; padding-bottom:3px; width: 10%">DAYS</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 1%">:</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%; border-bottom: 2px solid"></td>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%"></td>
        </tr>
    </table>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%">PURPOSE</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 1%">:</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 69%; border-bottom: 2px solid"></td>
        </tr>
    </table>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px; width: 30%">CONTACT NO</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 1%">:</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 69%; border-bottom: 2px solid"></td>
        </tr>
    </table>
    <br>
    <table class="text-black" width="100%">
        <tr>
            <?php if ($matters == "ANNUAL LEAVE") { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"></td>
            <?php } else { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"></td>
            <?php } ?>
            <td style="padding-top:3px; padding-bottom:3px; width: 40%; border: 2px solid">&nbsp;&nbsp;ANNUAL LEAVE</td>
            <?php if ($matters == "METERNITY LEAVE") { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"></td>
            <?php } else { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"></td>
            <?php } ?>
            <td style="padding-top:3px; padding-bottom:3px; width: 40%; border: 2px solid">&nbsp;&nbsp;METERNITY LEAVE</td>
        </tr>
        <tr>
            <?php if ($matters == "MEDICAL LEAVE") { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"></td>
            <?php } else { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"></td>
            <?php } ?>
            <td style="padding-top:3px; padding-bottom:3px; width: 40%; border: 2px solid">&nbsp;&nbsp;MEDICAL LEAVE</td>
            <?php if ($matters == "HOSPITALITY LEAVE") { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"></td>
            <?php } else { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"></td>
            <?php } ?>
            <td style="padding-top:3px; padding-bottom:3px; width: 40%; border: 2px solid">&nbsp;&nbsp;HOSPITALITY LEAVE</td>
        </tr>
        <tr>
            <?php if ($matters == "UNPAID LEAVE") { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"></td>
            <?php } else { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"></td>
            <?php } ?>
            <td style="padding-top:3px; padding-bottom:3px; width: 40%; border: 2px solid">&nbsp;&nbsp;UNPAID LEAVE</td>
            <?php if ($matters == "EMERGENCY LEAVE") { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"></td>
            <?php } else { ?>
                <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid; text-align: center"></td>
            <?php } ?>
            <td style="padding-top:3px; padding-bottom:3px; width: 40%; border: 2px solid">&nbsp;&nbsp;EMERGENCY LEAVE</td>
        </tr>
    </table>
    <br>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px; width: 10%; border: 2px solid"></td>
            <td style="padding-top:3px; padding-bottom:3px; width: 90%; border: 2px solid">&nbsp;&nbsp;<strong>REMARKS: (Please Key In Balance of AL (Annual Leave)</strong></td>
        </tr>
    </table>
    <br>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px; width: 33.33333333333333%; text-align:center;">APPLICANT</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 33.33333333333333%; text-align:center;">SUPPORT BY</td>
            <td style="padding-top:3px; padding-bottom:3px; width: 33.33333333333333%; text-align:center;">APPROVE BY</td>
        </tr>
    </table>
    <br>
    <table class="text-black" width="100%" height="100%">
    <br>
    <br>
    <br>
        <tr>
            <td rowspan="15" style="padding-top:3px; padding-bottom:3px; width: 33.33333333333333%; text-align:center;"></td>
            <td rowspan="15" style="padding-top:3px; padding-bottom:3px; width: 33.33333333333333%; text-align:center;"></td>
            <td rowspan="15" style="padding-top:3px; padding-bottom:3px; width: 33.33333333333333%; text-align:center;"></td>
        </tr>
    </table>
    <table class="text-black" width="100%">
        <tr>
            <td style="padding-top:3px; padding-bottom:3px;width: 2%;"></td>
            <td style="padding-top:3px; padding-bottom:3px;width: 29.33333333333333%; border-top: 2px solid">DATE :</td>
            <td style="padding-top:3px; padding-bottom:3px;width: 2%;"></td>
            <td style="padding-top:3px; padding-bottom:3px;width: 2%;"></td>
            <td style="padding-top:3px; padding-bottom:3px;width: 29.33333333333333%; border-top: 2px solid">DATE :</td>
            <td style="padding-top:3px; padding-bottom:3px;width: 2%;"></td>
            <td style="padding-top:3px; padding-bottom:3px;width: 1%;"></td>
            <td style="padding-top:3px; padding-bottom:3px;width: 30.33333333333333%; border-top: 2px solid">DATE :</td>
            <td style="padding-top:3px; padding-bottom:3px;width: 1%;"></td>
        </tr>
    </table>
</div>