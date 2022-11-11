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
    console.log(e.target)
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
