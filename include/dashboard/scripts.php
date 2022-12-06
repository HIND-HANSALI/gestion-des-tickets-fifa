
<script src="../vendor/popper/popper.min.js"></script>
<script src="../vendor/bootstrap/bootstrap.min.js"></script>
<script src="../vendor/anchorjs/anchor.min.js"></script>
<script src="../vendor/echarts/echarts.min.js"></script>
<script src="../vendor/fontawesome/all.min.js"></script>
<script src="../vendor/lodash/lodash.min.js"></script>
<script src="../assets/js/dash/theme.js"></script>
<script src="../assets/js/dash/app.js"></script>

<script>
      $(document).ready(function () {
        // Basic
        $('.dropify').dropify({
            tpl: {
                wrap: '<div id="PictureFileField" class="dropify-wrapper" style=" border-radius: 1em !important;background-color: rgb(18,30,45) !important;"></div>',
                preview: '<div id="PreviewFileField" class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p></div></div></div>',
            },
            messages: {
                default: '<h6>Drag picture here</h6>',
                replace: 'Drag picture here or click to replace',
                remove: 'Remove',
                error: 'Sorry, the file size is too big',
            },
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function (event, element) {
            return confirm('Do you really want to delete "' + element.file.name + '" ?');
        });

        drEvent.on('dropify.afterClear', function (event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function (event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify');
        $('#toggleDropify').on('click', function (e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        });
      });
    </script>