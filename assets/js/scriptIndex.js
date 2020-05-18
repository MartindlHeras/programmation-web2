document.querySelector('#voirPlus')
    .addEventListener('click', function(event) {
        event.preventDefault();
        let request = new XMLHttpRequest;
        request.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                document.querySelector('section ul').innerHTML += this.responseText
            }
        }
        let url = document.querySelector('section ul li:last-child a').href.split('=')
        let n = url[1]
        n-=1

        if (n == 1) {
            this.style.display = 'none'
        }

        request.open('GET', 'assets/php/voirPlusAnnonces.php?id=' + n)
        request.send()
    })
