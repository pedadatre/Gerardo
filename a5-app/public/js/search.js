$(document).ready(function() {
    $('#preview-button').on('click', function() {
        var fileInput = $('#uploader_file')[0];
        var file = fileInput.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            var previewContainer = $('#file-preview');
            previewContainer.empty(); // Limpiar cualquier vista previa anterior

            if (file.type.startsWith('image/')) {
                var img = $('<img>').attr('src', e.target.result).css('max-width', '100%');
                previewContainer.append(img);
            } else if (file.type === 'application/pdf') {
                var iframe = $('<iframe>').attr('src', e.target.result).css('width', '100%').css('height', '500px');
                previewContainer.append(iframe);
            } else {
                previewContainer.append('<p>Vista previa no disponible para este tipo de archivo.</p>');
            }
        };

        reader.readAsDataURL(file);
    });

    // Evento de clic para los botones "Ver"
    $('.view-button').on('click', function() {
        var fileUrl = $(this).data('file-url');
        var previewContainer = $('#file-preview');
        previewContainer.empty(); // Limpiar cualquier vista previa anterior

        if (fileUrl.endsWith('.jpg') || fileUrl.endsWith('.jpeg') || fileUrl.endsWith('.png') || fileUrl.endsWith('.gif')) {
            var img = $('<img>').attr('src', fileUrl).css('max-width', '100%');
            previewContainer.append(img);
        } else if (fileUrl.endsWith('.pdf')) {
            var iframe = $('<iframe>').attr('src', fileUrl).css('width', '100%').css('height', '500px');
            previewContainer.append(iframe);
        } else {
            previewContainer.append('<p>Vista previa no disponible para este tipo de archivo.</p>');
        }
    });

    $('#search-form').on('submit', function(e) {
        e.preventDefault(); // Evitar el envío del formulario por defecto

        var query = $('#search-query').val();

        $.ajax({
            url: $(this).attr('action'),
            method: 'GET',
            data: { query: query },
            success: function(response) {
                $('#search-results').html(response);
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });
    });
});