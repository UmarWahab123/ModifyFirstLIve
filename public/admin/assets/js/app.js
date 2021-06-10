//declearing html elements

function uploadImgae(type='', id='') {
    const img = document.querySelector('#'+id);
    const file = document.querySelector('#'+type);
    //alert(id);
    //alert('#'+id);
    file.addEventListener('change', function(){
    //this refers to file
    const choosedFile = this.files[0];

    if (choosedFile) {

        const reader = new FileReader(); //FileReader is a predefined function of JS

        reader.addEventListener('load', function(){
            img.setAttribute('src', reader.result);
        });

        reader.readAsDataURL(choosedFile);
    }
        else{
            img.setAttribute('src', "");

        }
   
});
}
