(function() {
    tinymce.PluginManager.add('policy_mce_button', function( editor, url ) {
        editor.addButton('policy_mce_button', {
            text: 'Policy',
            icon: false,
            type: 'menubutton',
            menu: [
                {
                    text: 'Sample Item 1',
                    onclick: function() {
                        editor.insertContent('[wdm_shortcode 1]');
                    }
                },
                {
                    text: 'Sample Item 2',
                    onclick: function() {
                        editor.insertContent('[wdm_shortcode 2]');
                    }
                }
            ]
        });
    });
})();