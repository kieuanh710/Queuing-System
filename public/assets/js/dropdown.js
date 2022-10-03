const option = document.querySelectorAll('.option')
const dropdown = document.querySelectorAll('.dropdown')

let count = 0
for (let d = 0; d < dropdown.length; d++) {
    dropdown[d].addEventListener("click", () => {
        count += 1
        if (count % 2 == 1) {
            option[d].style.display = 'block'
        }

        if (count % 2 == 0) {
            option[d].style.display = "none"
            count = 0
        }
    })
}

function chooseOption(anything, i) {
    let strClass = '.' + anything + ' .option-item'

    const optionList = document.querySelectorAll(`${strClass}`)
    const textbox = document.getElementById(`${anything}`)

    textbox.value = optionList[i].innerHTML

    optionList.forEach(l => {
        l.classList.remove('active')
    })

    optionList[i].classList.add('active')
    count = 1
}