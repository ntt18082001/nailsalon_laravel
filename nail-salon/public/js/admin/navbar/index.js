const arrAction = ['user', 'service-category', 'nail-service', 'ticket', 'config', 'about', 'slider', 'gallery', 'subscriber', 'ticket-promo'];
const arrHref = window.location.href.split('/');
const listLi = document.querySelectorAll('.nav-item a');
var active = "";

listLi.forEach(item => {
    const splitHref = item.href.split('/');
    if(arrHref[arrHref.length-1].includes(splitHref[splitHref.length - 1])) {
        active = "active";
        item.classList.add(active);
    }
});