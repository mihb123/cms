<script src="{{ asset('admin/ck_editor_finder/ckeditor_v4/ckeditor.js') }}"></script>
<script src="{{ asset('admin/ck_editor_finder/ckfinder_v3/ckfinder.js') }}"></script>
<script>
    $(function () {
        CKEDITOR.replace( 'editor', {
            toolbarGroups: [
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                { name: 'links', groups: [ 'links' ] },
                { name: 'insert', groups: [ 'insert' ] },
                { name: 'styles', groups: [ 'styles' ] },
                { name: 'colors', groups: [ 'colors' ] },
            ],
            removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Specialchar'
        });
        CKFinder.setupCKEditor();
    });
</script>