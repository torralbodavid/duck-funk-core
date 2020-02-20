import * as FilePond from 'filepond';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import FilePondPluginImageCrop from 'filepond-plugin-image-crop';
import FilePondPluginImageEdit from 'filepond-plugin-image-edit';
import FilePondPluginImageExifOrientation from 'filepond-plugin-image-exif-orientation';
import FilePondPluginImageTransform from 'filepond-plugin-image-transform';
import FilePondPluginImageResize from 'filepond-plugin-image-resize';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import toastr from 'toastr';

toastr.options.progressBar = true;

FilePond.registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginImageCrop,
    FilePondPluginImageEdit,
    FilePondPluginImageExifOrientation,
    FilePondPluginImageTransform,
    FilePondPluginImageResize,
    FilePondPluginFileValidateType
);

FilePond.setOptions({
    allowMultiple: true,
    maxFiles: 10,
    allowImageCrop: true,
    allowImageEdit: true,
    styleImageEditButtonEditItemPosition: 	"bottom center",
    imageEditInstantEdit: false,
    allowImageExifOrientation: 	true,
    allowImageResize: true,
    imageResizeTargetWidth: 1080,
    imageResizeMode: 'cover',
    imageResizeUpscale: false,
    labelFileTypeNotAllowed: 'Archivo no válido',
    fileValidateTypeLabelExpectedTypes: 'Solo aceptamos fotos o vídeos',
    server: {
        timeout: 7000,
        process: {
            url: 'upload',
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            withCredentials: true,
            onload: (response) => response,
            onerror: (response) => response,
            ondata: (formData) => {
                formData.append('serverid', formData);
                console.log(formData);
                return formData;
            }
        },
        revert: (uniqueFileId, load, error) => {

            $.ajax({
                url: 'upload',
                type: 'DELETE',
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
                },
                data:{
                    uniqueFileId: uniqueFileId,
                },
                success: function (result) {
                    console.log("ok!");
                    load();
                },
                error: function (error) {

                }
            });
        },
    }
});

const inputElement = document.querySelector('input[type="file"]');
const pond = FilePond.create( inputElement, {
    acceptedFileTypes: ['image/*'],
    fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {

        // Do custom type detection here and return with promise

        resolve(type);
    })
});


document.addEventListener('FilePond:warning', e => {

    if(e.detail.error['body'] === "Max files"){
        toastr.error('Solo puedes subir hasta 10 archivos', '¡Demasiados archivos!');
    } else {
        toastr.error('I do not think that word means what you think it means.', 'Inconceivable!');
    }

});

document.addEventListener('FilePond:init', e => {
    $("#filepondBox").css('visibility', 'visible');
    $("#loadingFilepond").hide();
});

document.addEventListener('FilePond:processfiles', e => {
    console.log('All processed');
});

document.addEventListener('FilePond:removefile', e => {
    console.log(e);
});

document.addEventListener('FilePond:processfile', e => {

    var serverId = e.detail.file.serverId;
    console.log('File added', serverId);

});
