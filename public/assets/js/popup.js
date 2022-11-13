//Close
document.querySelector('.popup-load-file').addEventListener('click', function() {
    this.style.display = 'none'
})
document.querySelector('.popup-load-file__content').addEventListener('click', function(e) {
    e.stopPropagation();
})

//Open
let loadBtns = document.querySelectorAll('.load-btn');
loadBtns.forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelector('.popup-load-file').style.display = 'flex';
    })
})

let dropArea = document.querySelector('.popup-load-file__drop-area');

;['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, preventDefaults, false)
})

function preventDefaults (e) {
    e.preventDefault()
    e.stopPropagation()
}

;['dragenter', 'dragover'].forEach(eventName => {
    dropArea.addEventListener(eventName, highlight, false)
})
;['dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, unhighlight, false)
})
function highlight(e) {

    dropArea.classList.add('popup-load-file__drop-area--highlight')
}
function unhighlight(e) {
    dropArea.classList.remove('popup-load-file__drop-area--highlight')
}

dropArea.addEventListener('drop', handleDrop, false);
function handleDrop(e) {
    let dt = e.dataTransfer;
    let files = dt.files;
    handleFiles(files);
}
function handleFiles(files) {
    files = [...files]
    files.forEach(uploadFile)
}
function uploadFile(file) {
    let formData = new FormData();
    formData.append('file', file);

    let url = '/test'
    fetch(url, {
        method: 'POST',
        body: formData
    })
        .then(() => { previewFile(file) })
        .catch(() => alert('Ошибка добавления'))
}
function previewFile(file) {
    let reader = new FileReader();
    reader.readAsDataURL(file);

    reader.onloadend = function() {
        let div = document.createElement('div');
        div.className = 'popup-load-file__gallery-item';

        document.querySelector('.popup-load-file__gallery').appendChild(div);
        div.innerHTML = `<img src="/assets/img/repository-file.svg"> <p>${file.name}</p>`;
    }
}



