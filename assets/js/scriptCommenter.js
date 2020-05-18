document.querySelector('#commenter_form button')
    .addEventListener('click', function(event) {
        event.preventDefault()

        let hasError = false
        const regexInput = /^[\S]{1,50}$/
        const inputVerif = function () {
            if (this.value.match(regexInput) === null) {
                this.classList.add('erreur')
                hasError = true
            } else {
                this.classList.remove('erreur')
                hasError = false
            }
        }

        let firstNameInput = document.getElementById('firstName')
        if (firstNameInput.value.match(regexInput) === null) {
            firstNameInput.classList.add('erreur')
            hasError = true
        }
        firstNameInput.addEventListener('input', inputVerif)

        let lastNameInput = document.getElementById('lastName')
        if (lastNameInput.value.match(regexInput) === null) {
            lastNameInput.classList.add('erreur')
            hasError = true
        }
        lastNameInput.addEventListener('input', inputVerif)

        let commentaireInput = document.getElementById('commentaire')
        if (commentaireInput.value === '') {
            commentaireInput.classList.add('erreur')
            hasError = true
        }
        commentaireInput.addEventListener('input', function () {
            if (this.value === '') {
                this.classList.add('erreur')
                hasError = true
            } else {
                this.classList.remove('erreur')
                hasError = false
            }
        })

        if (!hasError) {
            document.querySelector('#commenter_form').submit()
        }
    })

document.querySelector('#voirPlus')
    .addEventListener('click', function(event) {
        event.preventDefault();
        let request = new XMLHttpRequest;
        request.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                document.querySelector('section .commentaires').innerHTML += this.responseText
            }
        }
        let ids = document.querySelector('section .commentaires li:last-child .nom').previousSibling.textContent.split('&')

        this.style.display = 'none'

        request.open('GET', '../php/voirPlusCommentaires.php?idAnnonce=' + ids[1] + '&idCommentaire=' + ids[0])
        request.send()
    })
