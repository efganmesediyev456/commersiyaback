<div class="clearfix"></div>

</div>
<!-- /#right-panel -->

<!-- Scripts -->
<script src="{{asset('backend/assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('backend/assets/js/popper.min.js')}}"></script>
<script src="{{asset('backend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backend/assets/js/jquery.matchHeight.min.js')}}"></script>
<script src="{{asset('backend/assets/js/main.js')}}"></script>
<script src="{{asset('backend/assets/js/nestable.js')}}"></script>
<script src="{{asset('backend/assets/js/datepicker.min.js')}}"></script>
<script src="{{asset('backend/assets/js/moment.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/assets/js/bootstrap-datetimepicker.min.js')}}"></script>





<script src="{{ asset('/backend/assets/vendor/ckeditor/ckeditor.js') }}"></script>

<script>
    var $=jQuery.noConflict();
    var options = {
        filebrowserImageBrowseUrl: '/file-manager/ckeditor',
        filebrowserBrowseUrl: '/file-manager/ckeditor',
    };
</script>
<script>
    CKEDITOR.config.filebrowserImageBrowseUrl = '/file-manager/ckeditor';
    CKEDITOR.config.filebrowserBrowseUrl = '/file-manager/ckeditor';
    CKEDITOR.config.allowedContent = true;
    CKEDITOR.config.filebrowserUploadMethod = 'form';

    // CKEDITOR.config.pasteFromWordRemoveStyles = false;
    // CKEDITOR.config.pasteFilter = 'semantic-content';
    CKEDITOR.config.extraPlugins = 'html5video';
    CKEDITOR.config.extraPlugins = 'html5audio';
    CKEDITOR.config.extraPlugins = 'con';
    CKEDITOR.config.extraPlugins = 'accordion';
    CKEDITOR.config.disallowedContent = 'span';
    // CKEDITOR.config.removePlugins = 'htmlwriter';
    // CKEDITOR.config.removePlugins = 'pastefromword';
    CKEDITOR.config.protectedSource.push(/<\?[\s\S]*?\?>/g);
    CKEDITOR.replaceAll('editor', options);

    // CKEDITOR.replace('apply_page_terms', options);

    let href= window.location.href.split('?');
   $('#main-menu a').each(function (key,index) {
       let a = $(index).attr('href').split('?');
       console.log()
       if (href[0].includes(a[0]) && href[1] && href[1].includes(a[1]) && !a[0].endsWith('admin') )
       {
           console.log(href[1],a[0])
            $(index).parent().addClass('active')
            $(index).parents('.sub-menu').addClass('show')
            $(index).parents('.menu-item-has-children').addClass('show')
       }else if(href[0].includes(a[0]) && !href[1] && !a[0].endsWith('admin'))
       {
         $(index).parent().addClass('active')
        $(index).parents('.sub-menu').addClass('show')
         $(index).parents('.menu-item-has-children').addClass('show')
       }
       else if( a[0].endsWith('admin'))
       {
           $(index).parent().addClass('active')
           $(index).parents('.sub-menu').addClass('show')
           $(index).parents('.menu-item-has-children').addClass('show')
       }


   })


</script>

@yield('js')

@stack('scripts')


</body>
</html>
