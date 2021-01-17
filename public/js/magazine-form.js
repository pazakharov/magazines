document.addEventListener('DOMContentLoaded', function () {
    for (let authorId of selectedAuthors) {
        addAuthorHtml(authorId)
    }
    setCoverSrcFromInput()

    document.getElementById("imageFile").addEventListener('change', function () {
        try {
            getAjaxImage()
        } catch (error) {
            console.log('Ошибки Сети')
        }
    })
    document.getElementById("fotoСhooser").onclick = function () {
        document.getElementById("imageFile").click()
        document.getElementById("errors").innerHTML = ''
    }
    document.querySelector(".modal-footer > .btn-secondary").onclick = function () {
        document.getElementById('dialoge').style.display = 'none'
    }
    document.getElementById("plus").onclick = function () {
        document.getElementById('dialoge').style.display = 'block'
    }
    document.querySelector(".modal-footer > .btn-primary").onclick = function () {
        addAuthor()
    }
    function updateAuthorList() {
        let selectList = document.getElementById('authorList')
        for (let i = 0; i < selectList.length; i++) {
            (selectedAuthors.indexOf(selectList[i].value) != -1)
                ? selectList[i].disabled = true
                : selectList[i].disabled = false
        }
    }
    function addAuthor() {
        let selected = document.getElementById('authorList')
        let authorId = selected.options[selected.selectedIndex].value
        if (!(authorId === 'placeholder')) {
            selectedAuthors.push(authorId)
            addAuthorHtml(authorId)
        }
    }
    function addAuthorHtml(authorId) {
        let authors = document.getElementById('authors')
        let authorsInputs = document.getElementById('authorsInputs')
        let selected = document.getElementById('authorList')
        let authorName = document.querySelector('#authorList > option[value="' + authorId + '"]').text
        deleteButton = '<span class="del rounded-circle" author="' + authorId + '">×</span>'
        authorsInputs.insertAdjacentHTML('beforeend', '<input id="authorInput' + authorId + '" type="hidden" name="authors[]" value="' + authorId + '">')
        authors.insertAdjacentHTML('beforeend', '<span  id="authorSpan' + authorId + '" class="d-flex flex-row justify-content-between rounded-pill bg-light"><span>' + authorName + '</span>' + deleteButton + '</span>')
        selected[0].selected = true
        updateAuthorList()
        addAddClickCloses()
    }
    function addAddClickCloses() {
        let buttons = document.querySelectorAll(".del")
        buttons.forEach(function (button) {
            button.addEventListener('click', function () {
                authorId = this.getAttribute('author')

                removeAuthor(authorId);
            })
        })
    }
    function removeAuthor(authorId) {


        let tag = document.getElementById('authorInput' + authorId);
        if (tag !== null) {
            tag.parentNode.removeChild(tag);
            tag = document.getElementById('authorSpan' + authorId);
            tag.parentNode.removeChild(tag);
            selectedAuthors = selectedAuthors.filter(id => id === authorId)
        }
        updateAuthorList();
    }
    function getAjaxImage() {
        fetch(imageUploadUrl, {
            method: 'POST',
            body: new FormData(imageForm),
            redirect: "follow",
        })
            .then(response => {
                if (response.status >= 200 && response.status < 300) {
                    return Promise.resolve(response.json())
                } else {
                    return Promise.reject(response)
                }
            })
            .then(function (result) {
                document.getElementById("cover").setAttribute("src", result.url)
                document.getElementById("magazineImageUrl").setAttribute("value", result.url)
                document.getElementById("magazineImage").setAttribute("value", result.id)
            })
            .catch(function (response) {
                if (response instanceof Response) {
                    response.json().then(function (result) {
                        errorHTML = '<div class="alert alert-danger"><strong>Ошибки!</strong><ul>'
                        for (let error of result.errors.image) {
                            errorHTML += '<li>' + error + '</li>'
                        }
                        errorHTML += '</ul></div>'
                        document.getElementById("errors").innerHTML = errorHTML
                    })
                }
            });
    }
    function setCoverSrcFromInput() {
        imageUrl = document.getElementById("magazineImageUrl").getAttribute("value")
        document.getElementById("cover").setAttribute("src", imageUrl)
    }
});
$('#date-picker').datepicker({
    format: "dd.mm.yyyy",
    language: "ru",
    daysOfWeekHighlighted: "0,6"
});