var btn = document.getElementById('button');
var nav = document.querySelector('nav');

window.onscroll = function () {
  if (window.pageYOffset > 300) {
    btn.classList.add('show');
  } else {
    btn.classList.remove('show');
  }

  if (window.pageYOffset > 100) {
    nav.classList.add('show');
  } else {
    nav.classList.remove('show');
  }
};

btn.addEventListener('click', function (e) {
  e.preventDefault();
  window.scrollTo({ top: 0, behavior: 'smooth' });
});