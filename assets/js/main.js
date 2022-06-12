/*document.getElementById('button').addEventListener('click', function() {
    document.querySelector('.bg-modal').style.display = 'flex';
})*/

function openModal(id) {
    document.querySelector('.bg-modal-' + id).style.display = 'flex';
}

function closeModal(event) {
    event.target.parentElement.parentElement.style.display = "none";
}