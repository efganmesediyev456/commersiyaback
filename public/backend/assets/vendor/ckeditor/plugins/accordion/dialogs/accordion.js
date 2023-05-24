CKEDITOR.dialog.add( 'accordionDialog', function( editor ) {
    return {
        title: 'Blokların əlavə edilməsi',
        minWidth: 400,
        minHeight: 200,

        contents: [
            {
                id: 'tab-basic',
                style: 'width:1000px;',
                label: 'Basic Settings',
                elements: [
                    {
	                	type: 'text',
	                	id: 'title',
	                	label: 'Başlıq',
	                	validate: CKEDITOR.dialog.validate.notEmpty( "Başlıq sahəsi boş saxlana bilməz...." )
                    },
                    {
	                	type: 'text',
	                	id: 'icon_class',
	                	label: 'Ikon class',
	                	//validate: CKEDITOR.dialog.validate.notEmpty( "Ikon class sahəsi boş saxlana bilməz...." )
                	},
                	{
                        type: 'textarea',
                        id: 'body',
                        style: 'height:700px;',
                        class: 'editor2',
                        name: 'accordion_body',
                        onShow: function() {
                                //alert(1);
                                var idOfDiv =  document.getElementsByClassName('editor2')[0];
                                idOfDiv.setAttribute('name', 'accordion_body');
                                //console.log(idOfDiv);
                                /*CKEDITOR.replace(idOfDiv);
                                var iframe_body = $('.cke_dialog iframe').contents().find('body');
                                console.log(iframe_body.attr('class'));

                                iframe_body.bind('keydown', function(e){alert(123);});

                                iframe_body.on('keydown', function(){ 
                                    console.log($(this).html());
                                    $('textarea[name="accordion_body"]').val($(this).html());
                                    //alert(123); 
                                });*/
                                // $('.editor2').summernote({
                                //     height: 600,
                                // });
                                //$('.cke_contents').on('keydown', function(){ alert(123);});
                        },
                        label: 'Mətn',
                        validate: CKEDITOR.dialog.validate.notEmpty( "Mətn sahəsə boş saxlana bilməz...." )
                    }
                    // {
                    //     type: 'checkbox',
                    //     id: 'font-weight',
                    //     label: 'Başlıq qalın yazı ilə',
                    //     default: 'checked'
                    // }
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

        	// var block = editor.document.createElement('div');

            var block = CKEDITOR.document.createElement('div');

            block.setAttribute( 'class', 'leadership-item' );

            var childElement = CKEDITOR.document.createElement('div');
            
            //console.log(dialog.getValueOf('tab-basic','font-weight'));

            // block.setAttribute('class', dialog.getValueOf('tab-basic', 'title'));

            // block.setText(dialog.getValueOf('tab-basic', 'zamanly'));

            //var is_bold = dialog.getValueOf('tab-basic','font-weight');

            var body = dialog.getValueOf('tab-basic','body');
            body = body.replace(/\n/g, "<br/>");
            //console.log(body);
   

            block.appendHtml(`<div class="leadership-item-head">`
            

                                + (dialog.getValueOf('tab-basic','icon_class') ? `<div>
                                <span class="icon-box"> <i class="${dialog.getValueOf('tab-basic','icon_class')}"><span style="display:none;">.</span></i></span>
                            </div>` : '') +

                                `<p>${dialog.getValueOf('tab-basic','title')}</p>
                                <span class="arrow">
                                    <i class="fal fa-plus"><span style="display:none;">.</span></i>
                                </span>
                            </div>
                            <div class="leadership-item-body">
                                <div>
                                    <p>
                                    ${body}
                                    </p>
                                </div>
                            </div>`);
        	
            editor.insertElement(block);


        }
    };
});

