document.addEventListener('DOMContentLoaded', function () {
    for (let authorId of selectedAuthors) {
        addAuthorsHtml(authorId);
    }
});

function updateAuthorList() {
    var selectList = document.getElementById('authorList');
    for (var i = 0; i < selectList.length; i++) {
        (selectedAuthors.indexOf(selectList[i].value) != -1)
            ? selectList[i].disabled = true
            : selectList[i].disabled = false;
    }
}

function addAuthor() {
    var authors = document.getElementById('authors');
    var authorsInputs = document.getElementById('authorsInputs');
    var selected = document.getElementById('authorList');
    var authorName = selected.options[selected.selectedIndex].text;
    var authorId = selected.options[selected.selectedIndex].value;
    if (!(authorId === 'placeholder')) {
        deleteButton = '<span class="del" @click="removeAuthor(' + authorId + ')">×</span>';
        authorsInputs.insertAdjacentHTML('beforeend', '<input id="authorInput' + authorId + '" type="hidden" name="authors[]" value="' + authorId + '">');
        authors.insertAdjacentHTML('beforeend', '<span  id="authorSpan' + authorId + '" class="d-flex flex-row justify-content-between rounded-pill author bg-light"><span>' + authorName + '</span>' + deleteButton + '</span>');
        selectedAuthors.push(authorId);
        selected[0].selected = true;
        updateAuthorList()

    }
}

function addAuthorsHtml(authorId) {
    console.log(authorId);
    var authors = document.getElementById('authors');
    var authorsInputs = document.getElementById('authorsInputs');
    var selected = document.getElementById('authorList');
    var authorName = document.querySelector('#authorList > option[value="' + authorId + '"]').text;
    deleteButton = '<span class="del" @click="removeAuthor(' + authorId + ')">×</span>';
    authorsInputs.insertAdjacentHTML('beforeend', '<input id="authorInput' + authorId + '" type="hidden" name="authors[]" value="' + authorId + '">');
    authors.insertAdjacentHTML('beforeend', '<span  id="authorSpan' + authorId + '" class="d-flex flex-row justify-content-between rounded-pill bg-secondary"><span>' + authorName + '</span>' + deleteButton + '</span>');
    selected[0].selected = true;
    updateAuthorList()
}

function removeAuthor(authorId) {
    var tag = document.getElementById('authorInput' + authorId);
    tag.parentNode.removeChild(tag);

    var tag = document.getElementById('authorSpan' + authorId);
    tag.parentNode.removeChild(tag);
    selectedAuthors = selectedAuthors.filter(id => id === authorId)
    updateAuthorList();
}

$('#date-picker').datepicker({
    format: "dd.mm.yyyy",
    language: "ru",
    daysOfWeekHighlighted: "0,6"
});
$(function () {
    $('#imageFile').on("change", function () {
        $.ajax({
            type: 'POST',
            url: imageUploadUrl,
            data: new FormData(document.getElementById("imageForm")),
            processData: false,
            contentType: false,
            success: function (response) {
                response = $.parseJSON(response)
                $("#cover").attr("src", response.url);
                $("#magazineImage").attr("value", response.id);
                
            },
            error: function (response, textStatus, xhr) {
                console.log('Ошибка');
                errorHTML = '<div class="alert alert-danger"><strong>Ошибки!</strong><ul>';
                for (let error of response.responseJSON.errors.image) {
                    errorHTML += '<li>' + error + '</li>';
                }
                errorHTML += '</ul></div>';
                document.getElementById("errors").innerHTML = errorHTML;
               

            },
            complete: function (response, textStatus, xhr) {
                
            }
        });
    });
});

$(function () {
    $("#fotoСhooser").click(function () {
        $("#imageFile").click();
        document.getElementById("errors").innerHTML = '';
    });
});