CKEDITOR.dialog.add( 'zamanlyDialog', function( editor ) {
    return {
        title: 'Turan Zamanly plugAin',
        minWidth: 400,
        minHeight: 200,

        contents: [
            {
                id: 'tab-basic',
                label: 'Basic Settings',
                elements: [
                    {
	                	type: 'text',
	                	id: 'zamanly',
	                	label: 'Ayaqliq',
	                	validate: CKEDITOR.dialog.validate.notEmpty( "Başlıq sahəsi boş saxlana bilməz." )
                	},
                	{
                        type: 'text',
                        id: 'title',
                        label: 'Explanation',
                        validate: CKEDITOR.dialog.validate.notEmpty( "Mətn sahəsə boş saxlana bilməz" )
                    },
                    {
		                type: 'text',
		                id: 'hay',
		                label: 'Salam',
		                validate: CKEDITOR.dialog.validate.notEmpty( "SALAM sahəsə boş saxlana bilməz" )
		            }
                ]
            },
            {
                id: 'tab-adv',
                label: 'Advanced Settings',
                elements: [
                    // UI elements of the second tab will be defined here.
                ]
            }
        ],

        onOk: function() {

        	var dialog = this;

        	var zamanly = editor.document.createElement('div');

        	zamanly.setAttribute('class', dialog.getValueOf('tab-basic', 'title'));
        	zamanly.setText(dialog.getValueOf('tab-basic', 'zamanly'));


        	editor.insertElement(zamanly);



        }
    };
});