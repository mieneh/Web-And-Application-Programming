function direc() {
    document.getElementById('container').classList.toggle('activeMenu');
}   


function logIn() {
    document.getElementById('form').classList.remove('register');
    document.getElementById('form').classList.add('login');
    document.getElementById('bg-active').style.left = '0px';

}
function regisTer() {
    document.getElementById('form').classList.remove('login');
    document.getElementById('form').classList.add('register');
    document.getElementById('bg-active').style.left = '135px';

}