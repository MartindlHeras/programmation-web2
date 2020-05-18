document.querySelector('#form button').addEventListener('click', function(event) {
    event.preventDefault()

    if (document.getElementById('firstName').value === '' ||
        document.getElementById('lastName').value === '' ||
        document.getElementById('message').value === '') {

        let span = document.createElement('span')
        let node = document.createTextNode('Vous devez remplir tous les champs du formulaire avant la soumission !')
        span.appendChild(node)
        span.classList.add('error')
        document.querySelector('#form').insertBefore(span, document.querySelector('#form').childNodes[0])
    }
})
