document.addEventListener('DOMContentLoaded', function () {
    let buttons = document.querySelectorAll('.dialogeButton')
    buttons.forEach(function (button) {
        button.addEventListener('click', function () {
            authorId = this.getAttribute('author-data')
            document.getElementById('modal'+authorId).style.display = 'block'
        })
    })
    let closeButtons = document.querySelectorAll('.closeDialoge')
    closeButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            authorId = this.getAttribute('author-data')
            document.getElementById('modal'+authorId).style.display = 'none'
        })
    })
})