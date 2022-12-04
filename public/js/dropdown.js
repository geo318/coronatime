const drops = document.querySelectorAll('.drop')
const triggers = document.querySelectorAll('.trigger')
const close = document.querySelector('.close')

triggers.forEach((trigger, i) => trigger.onclick = () => drops[i].classList.toggle('hidden'))
close.onclick = () => drops.forEach(e => e.classList.toggle('hidden'))

document.onclick = e => drops.forEach((drop, i) => {
    if (triggers[i].contains(e.target)) return

    if (!drop.classList.contains('hidden')) {
        drop.classList.toggle('hidden')
    }
})

close.onmouseover = e => console.log(e)