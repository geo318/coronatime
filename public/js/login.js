
//input validations on the go
const input = document.getElementById('login')
input.addEventListener('input', e => validate(e.target.value))
window.onload = e => validate(input.value)

function validate(value) {
    const regexEmail = new RegExp('^[A-z0-9+_.-]+@[A-z0-9+_.-]+\.([A-z]{2,})$')

    regexEmail.test(value) || regexEmail.test(input.value)
    ? input.setAttribute('name','email')
    : input.setAttribute('name','username')
}
