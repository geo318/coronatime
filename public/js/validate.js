//input validations on the go

const inputs = document.querySelectorAll('.validate')
const borderStyles = ['border-success', 'border-error','border-app-gray','border-app-red']

inputs.forEach((e,i) => e.addEventListener('blur', event => validate(event.target.value, i)))

function validate(value, i) {
    const regex = new RegExp(inputs[i].pattern)

    borderStyles.forEach(cls => inputs[i].classList.remove(cls))

    regex.test(value)
    ? inputs[i].classList.add(borderStyles[0])
    : inputs[i].classList.add(borderStyles[1])
}

// repeat password validation

const repeat = document.getElementById('repeat')

if(repeat) repeat.onblur = e => {
    const password = document.getElementById('password')
    password.value !== e.target.value
    ? [password,repeat].forEach(el => {
        el.classList.add(borderStyles[1])
        el.classList.remove(borderStyles[0])
    })
    : [password,repeat].forEach(el => {
        el.classList.add(borderStyles[0])
        el.classList.remove(borderStyles[1])
    })
}
