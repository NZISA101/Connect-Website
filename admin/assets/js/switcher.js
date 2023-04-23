let btn = document.getElementById('btn')

function change_color(color)
{
    document.body.style.background = color;
    btn.style.background = color;

    document.querySelectorAll('span').forEach(function(item)
    {
        item.classList.remove('active');
    })

    event.target.classList.add('active');
}

// set the value of "--theme-color" to the selected color
document.documentElement.style.setProperty('--theme-color', color);

document.querySelectorAll('span').forEach(function(item)
{
    item.classList.remove('active');
})

event.target.classList.add('active');