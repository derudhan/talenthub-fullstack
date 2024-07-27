<div>
    <script src="https://cdn.tiny.cloud/1/7cpwu9lo3ix55cdzrlyroxwxwkwu3do805fcvv0krkuaj9hf/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea.tiny-mce',
            plugins: 'advlist autolink lists link image charmap preview anchor pagebreak code insertdatetime media table searchreplace fullscreen',
            toolbar_mode: 'floating',
            menubar: 'file',
            toolbar: 'undo redo | formatselect | bold italic underline strikethrough hr | forecolor backcolor | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | link image paste | charmap | preview | code | print',
            image_title: true,
            automatic_uploads: true,
            file_picker_types: 'image',
            images_upload_url: '{{ route('admin.news.upload') }}',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
            },
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];
                    var reader = new FileReader();
                    reader.onload = function() {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    };
                    reader.readAsDataURL(file);
                };
                input.click();
            },
        });
    </script>
</div>
