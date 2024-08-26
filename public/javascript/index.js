// check status of item that can be mark and strike through them
const elementStrikable = document.querySelectorAll('.mark-status')
elementStrikable.forEach((element) => {
    if (element.dataset.status === '1') {
        element.classList.toggle('strikethrough')
    }
});

// update the status from the list i.e. marked them has done
const checked = document.querySelectorAll('.checkbox')
checked.forEach((element) => {
    element.addEventListener('change', () => {
        sendRequest(
            'update-status',
            'put',
            element.getAttribute('id'),
            element.checked,
        )
    });
});

// add delete action to button
const deleteButton = document.querySelectorAll('.delete-item');
deleteButton.forEach((element) => {
    element.addEventListener('click', () => {
        sendRequest(
            'delete-item',
            'delete',
            element.value)
    });
});


// total the price of items together
const prices = document.querySelectorAll('.flex-item-price');
const total = document.querySelector('.total-value');
let result = parseFloat(total.innerHTML);
prices.forEach((element) => {
    result += parseFloat(element.innerHTML);
});
total.innerHTML = result


/**
 *  Send request to backend
 * @param url string
 * @param method string
 * @param arg string
 * @param arg2 string
 */
function sendRequest(url, method, arg, arg2 = null) {
    let fullURL = `/${url}/${arg}`

    if (arg2 != null) {
        fullURL = `/${url}/${arg}-${arg2}`
        console.log(fullURL)
        console.log(`id=${arg}-status=${arg2}`)
    }

    fetch(fullURL, {
        method: `${method}`
    }).then(function (response) {
        // @TODO check response is success before reload
        window.location.reload();
    }).catch(function (err) {
        // @TODO add error handling
        console.log(err);
    });
}