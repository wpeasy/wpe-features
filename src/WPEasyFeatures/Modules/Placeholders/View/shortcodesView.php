<?php
\WPEasyLibrary\WordPress\ShortcodeTableRenderer::render(\WPEasyFeatures\Modules\Placeholders\Controller\ModuleController::$moduleConfig['shortcodes'], true)
?>
<script>
    (function ($) {
        $(document).ready( function () {
            $('.wpe_clickToCopy').clickToCopy({logEvents: true});
        })

    })(jQuery);
</script>
