import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone',{
    dictDefaultMessage: 'sube tu imagen aca',
    acceptedFiles: ".png, .jpg, .jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar archivo',
    maxFiles:1,
    uploadMultiple: false,
}
);
dropzone.on('success',function(file,response){
    document.querySelector('[name="imagen"]').value = response.imagen;
});
dropzone.on('removedfile',function(){
    document.querySelector('[name="imagen"]').value = "";

});