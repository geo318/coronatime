
//input validations on the go
const inputs = document.querySelectorAll('.validate')
inputs.forEach((e,i) => e.addEventListener('blur', event => validate(event.target.value, i)))

function validate(value, i) {
    const regex = new RegExp(inputs[i].pattern)
    const borderStyles = ['border-success', 'border-error','border-app-gray','border-app-red']

    borderStyles.forEach(cls =>
        inputs[i].classList.contains(cls)
        && inputs[i].classList.remove(cls)
    )
    regex.test(value)
    ? inputs[i].classList.add([borderStyles[0]] )
    : inputs[i].classList.add(borderStyles[1])
}
