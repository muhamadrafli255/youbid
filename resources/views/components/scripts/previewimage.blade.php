<script>
    function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
    
    oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
    }
}

function previewImageCard(){
const imageCard = document.querySelector('#imageCard');
const imgPreviewCard = document.querySelector('.img-preview-card');

const oFReader1 = new FileReader();
oFReader1.readAsDataURL(imageCard.files[0]);

oFReader1.onload = function(oFREvent){
    imgPreviewCard.src = oFREvent.target.result;
}
}
</script>