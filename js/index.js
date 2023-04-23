var section = document.querySelector('section');

window.addEventListener('scroll', function()
{
    var value = window.scrollY;
    section.style.clipPath = "circle("+ value +"px at center)"
});

window.addEventListener('load', function()
{
    const preloader = document.getElementById('preloader');
    preloader.style.display = 'none';
});

window.addEventListener('beforeunload', function()
{
    const preloader = document.getElementById('preloader');
    preloader.style.display = 'block';
});