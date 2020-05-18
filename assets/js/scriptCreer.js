document.querySelector('#creation_annonce button')
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

        let titreInput = document.getElementById('titre')
        if (titreInput.value.match(regexInput) === null) {
            titreInput.classList.add('erreur')
            hasError = true
        }
        titreInput.addEventListener('input', inputVerif)

        let descriptionInput = document.getElementById('description')
        if (descriptionInput.value === '') {
            descriptionInput.classList.add('erreur')
            hasError = true
        }
        descriptionInput.addEventListener('input', function () {
            if (this.value === '') {
                this.classList.add('erreur')
                hasError = true
            } else {
                this.classList.remove('erreur')
                hasError = false
            }
        })

        let firstNameInput = document.getElementById('firstName')
        if (firstNameInput.value.match(regexInput) === null) {
            firstNameInput.classList.add('erreur')
            hasError = true
        }
        firstNameInput.addEventListener('input', inputVerif)

        let mailInput = document.getElementById('mail')
        if (mailInput.value.match(/^[0-9a-z.-_]+@[0-9a-z.-_]{3,32}\.[a-z]{2,}$/) === null) {
            mailInput.classList.add('erreur')
            hasError = true
        }
        mailInput.addEventListener('input', function () {
            if (this.value.match(/^[0-9a-z.-_]+@[0-9a-z.-_]{3,32}\.[a-z]{2,}$/) === null) {
                this.classList.add('erreur')
                hasError = true
            } else {
                this.classList.remove('erreur')
                hasError = false
            }
        })

        if (!hasError) {
            document.querySelector('#creation_annonce').submit()
        }
    })
