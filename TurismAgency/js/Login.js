const paragrafo = document.querySelector('.popup-p');
const img = document.querySelector('.popup-img');
const h1 = document.querySelector('.popup-h1');
const btn = document.querySelector('.popup-link');

window.onload = function () {
    const urlParams = new URLSearchParams(window.location.search);
    const success = urlParams.get('success');
    const error = urlParams.get('error');
    const alert = urlParams.get('usuariofound');
    if (success === 'true') {
        document.querySelector('.popup').style.visibility = 'visible';
    } else {
        if (error === 'true') {
            document.querySelector('.popup').style.visibility = 'visible';
            document.querySelector('.popup').style.border = '2px solid red';
            paragrafo.innerHTML = 'Dados Incorretos, Tente novamente';
            img.src = 'img/x.png';
            h1.innerHTML = 'ERRO';
            btn.addEventListener('mouseenter', function () {
                btn.style.border = '2px solid red';
            });

            btn.addEventListener('click', function () {
                btn.href = 'login.html'
            });
        } else {
            if (alert === 'true') {
                document.querySelector('.popup').style.visibility = 'visible';
                document.querySelector('.popup').style.border = '2px solid yellow';
                paragrafo.innerHTML = 'O Email já está em uso!';
                img.src = 'img/warning.png';
                h1.innerHTML = 'ALERTA';
                btn.addEventListener('mouseenter', function () {
                    btn.style.border = '2px solid yellow';
                });

                btn.addEventListener('click', function () {
                    btn.href = 'login.html'
                });
            }
        }
    }
};
