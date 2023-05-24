CKEDITOR.plugins.add( 'accordion', {
    icons: 'accordion',
    init: function( editor ) {
        // Plugin logic goes here...

        editor.addCommand( 'accordion', new CKEDITOR.dialogCommand( 'accordionDialog' ) );

        editor.ui.addButton( 'accordion', {
						    label: 'Insert accordion',
						    command: 'accordion',
						    toolbar: 'insert'
						});

        CKEDITOR.dialog.add( 'accordionDialog', this.path + 'dialogs/accordion.js' );
    }
});
