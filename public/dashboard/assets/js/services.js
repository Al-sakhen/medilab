$('#image').on('change', function (e) {
    let url = URL.createObjectURL(e.target.files[0]);
    let image = `<img id="previewed-image" src="${url}" alt="" style="width:100% ; height:100%">`;
    $('.preview-image').html(image)
})
