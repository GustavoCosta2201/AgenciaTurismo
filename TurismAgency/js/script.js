const card1 = document.querySelector('.card1');
const card2 = document.querySelector('.card2');
const card3 = document.querySelector('.card3');
const card4 = document.querySelector('.card4');
const bg = document.querySelector('.general');
const title = document.querySelector('h1');
const textCard = document.querySelector('p');
const colorTitle = '#FFA500';

card1.addEventListener('click', () =>{
    bg.style.backgroundImage = "linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),url('img/pipa.jpg')";
    title.innerText = 'Pipa de Buggy';
    textCard.innerText = 'Lorem ipsum dolor sit amet consectetur adipisicing elit.Voluptate, repellendus provident. Soluta, id quis quas omnis, sed pariatur in officia perferendis, odit ea dolores minus accusamus vitae! Assumenda vero asperiores, tempore, incidunt consequuntur commodi';
});
card2.addEventListener('click', () =>{
    bg.style.backgroundImage = "linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),url('img/NY.jpg')";
    title.innerText = 'Nova York';
    textCard.innerText = 'Lorem ipsum dolor sit amet consectetur adipisicing elit.Voluptate, repellendus provident. Soluta, id quis quas omnis,'
})
card3.addEventListener('click', () =>{
    bg.style.backgroundImage = "linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),url('img/parrachos.jpg')";
    title.innerText = 'Parrachos de Maracajaú';
    textCard.innerText = 'Lorem ipsum dolor sit amet consectetur adipisicing elit.Voluptate, repellendus provident. Soluta, id quis quas omnis,Lorem ipsum dolor sit amet consectetur adipisicing elit.Voluptate, repellendus provident. Soluta, id quis quas omnis,';
})
card4.addEventListener('click', () =>{
    bg.style.backgroundImage = "linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),url('img/Praia.jpg')";
    title.innerText = 'Praia';

    textCard.innerText = 'Lorem ipsum dolor sit amet consectetur adipisicing elit.Voluptate, repellendus provident. Soluta, id quis quas omnis,Lorem ipsum dolor sit amet consectetur adipisicing elit.Voluptate, repellendus provident. Soluta, id quis quas omnis,';
})

/* MENU MOBILE */

const menuMobile = document.querySelector('.menu-mobile');
const links = document.querySelector('.links');
const linksItens = document.querySelectorAll('.links a');

menuMobile.addEventListener('click', () => {
    links.classList.toggle('active');
});

/* FECHA O MENU AO CLICAR NO LINK */
linksItens.forEach((linksItem) => {
    linksItem.addEventListener('click', () => {
        links.classList.toggle('active');
    })
})