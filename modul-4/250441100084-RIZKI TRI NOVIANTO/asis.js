const toggle = document.querySelector('#darktoggle');
    toggle.addEventListener('click' , () => {
        document.body.classList.toggle('red-mode');

        if (document.body.classList.contains('red-mode')) {
            document.body.style.backgroundColor = '#ff0000';
            document.body.style.color = 'white'

            document.querySelector('nav').style.backgroundColor = '#800000';

            const home =document.querySelector('#Home');
            home.style.backgroundColor = '#ff0000';
        }
    })