<?php
$settingsConf = \WPEasyFeatures\Modules\Placeholders\Controller\ModuleController::$moduleConfig['settings'];
$optionName = $settingsConf['optionName'];
$settings = get_option($optionName);
$nonce = wp_create_nonce(\WPEasyFeatures\Modules\Placeholders\Controller\SettingsController::$nonceAction)
?>

<form method="post" novalidate="novalidate" id="settingsForm">
    <input type="hidden" id="_wpnonce" name="_wpnonce" value="<?= $nonce ?>"/>
    <div class="container-fluid wpe-div-table table-striped">
        <div class="row">
            <div class="col-12 col-sm-2" >
                Company Trading Name
            </div>
            <div class="col-12 col-sm-5">
                <input
                        type="text"
                        class="form-control"
                        name="<?= $optionName ?>[company_trading_name]"
                        placeholder="COMPANY TRADING NAME"
                        value="<?= $settings['company_trading_name']?>"
                />
            </div>
            <div class="col-12 col-sm-5">
                <span class="wpe_clickToCopy d-block">[wpe_company_trading_name]</span>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-2">
                Company Legal Name
            </div>
            <div class="col-12 col-sm-5">
                <input
                        type="text"
                        class="form-control"
                        name="<?= $optionName ?>[company_legal_name]"
                        placeholder="COMPANY LEGAL NAME"
                        value="<?= $settings['company_legal_name']?>"
                />
            </div>
            <div class="col-12 col-sm-5">
                <span class="wpe_clickToCopy d-block">[wpe_company_legal_name]</span>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-2">
                Company ABN
            </div>
            <div class="col-12 col-sm-5">
                <input
                        type="text"
                        class="form-control"
                        name="<?= $optionName ?>[company_abn_acn]"
                        placeholder="COMPANY ABN"
                        value="<?= $settings['company_abn_acn']?>"
                />
            </div>
            <div class="col-12 col-sm-5">
                <span class="wpe_clickToCopy d-block">[wpe_company_abn_acn]</span>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-2">
                Company Phone
            </div>
            <div class="col-12 col-sm-5">
                <input
                        type="text"
                        class="form-control"
                        name="<?= $optionName ?>[company_phone]"
                        placeholder="COMPANY PHONE"
                        value="<?= $settings['company_phone']?>"
                />
            </div>
            <div class="col-12 col-sm-5">
                <span class="wpe_clickToCopy d-block">[wpe_company_phone]</span>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-2">
                Company Email
            </div>
            <div class="col-12 col-sm-5">
                <input
                        type="email"
                        class="form-control"
                        name="<?= $optionName ?>[company_email]"
                        placeholder="COMPANY EMAIL"
                        value="<?= $settings['company_email']?>"
                />
            </div>
            <div class="col-12 col-sm-5">
                <span class="wpe_clickToCopy d-block">[wpe_company_email]</span>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-2">
                Company Address
            </div>
            <div class="col-12 col-sm-5">
                <textarea
                        class="form-control"
                        name="<?= $optionName ?>[company_address]"
                        placeholder="COMPANY ADDRESS"
                ><?= $settings['company_address']?></textarea>
            </div>
            <div class="col-12 col-sm-5">
                <span class="wpe_clickToCopy d-block">[wpe_company_address]</span>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-2">
                Company Postal Address
            </div>
            <div class="col-12 col-sm-5">
                <textarea
                        class="form-control"
                        name="<?= $optionName ?>[company_postal_address]"
                        placeholder="COMPANY ADDRESS"
                ><?= $settings['company_postal_address']?></textarea>
            </div>
            <div class="col-12 col-sm-5">
                <span class="wpe_clickToCopy d-block">[wpe_company_postal_address]</span>
            </div>
        </div>

    </div>

    <button type="submit" class="btn btn-primary " id="submitButton">Save Changes <span class="wpe-spinner-small d-none"></span></button>
</form>
<script>
    (function ($) {
        var $settingsFrom = $('#settingsForm');
        var $submitButtonSpinner = $('#submitButton .wpe-spinner-small');
        $settingsFrom.on('submit', function (e) {
            e.preventDefault();
            $submitButtonSpinner.removeClass('d-none');
            $.post(
                {
                    url : window.ajaxurl,
                    data: {action: 'wpe_placeholder_save', nonce: $('#_wpnonce').val(), data: $(this).serialize()}
                }
            )
            .done(function (result) {
                console.log('DONE');
            })
            .fail(function (err) {
                console.log('ERROR', err);

            })
            .always(function () {
                $submitButtonSpinner.addClass('d-none');
            })
        })
    })(jQuery)
</script>
