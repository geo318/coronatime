const drops = document.querySelectorAll('.drop')
const triggers = document.querySelectorAll('.trigger')
const closes = document.querySelectorAll('.close')

triggers.forEach((trigger, i) => trigger.onclick = () => drops[i].classList.toggle('hidden'))

closes.forEach(close => close.onclick = () => close.parentNode.classList.toggle('hidden'))

document.onclick = e => drops.forEach((drop, i) => {
    if (triggers[i].contains(e.target) || (drop.contains(e.target) && !drop.firstChild.contains(e.target))) return
    if (!drop.classList.contains('hidden'))
        drop.classList.toggle('hidden')
})

/*
* <<simple toggle menu>>
* give .trigger class to an element that should open menu
* give .drop and a .hidden (display:none in tailwind) classes to a drop menu
* if you have a close button, use a .close class to make the button work
* foreach loop enable you to have as many dropdown items in a document, as you wish
*/