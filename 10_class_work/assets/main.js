
    let output = document.querySelector('.output');
    let image = document.querySelector('.output-main img');
    let lang = document.getElementsByName('lang[]');
    image.hidden = true;

    document.addEventListener('DOMContentLoaded', function() {
    const formBlock = document.getElementById('contact-form');

    const ACTION = formBlock.getAttribute('data-action');
    const METHOD = formBlock.getAttribute('data-method');

    document.querySelector('button').addEventListener('click', async function() {
    let elements = document.querySelectorAll('#contact-form [name]');
    image.hidden = false;

    const formData = new FormData();

    [...elements].map(element => {

    if (element.files){
    for (let file of element.files) {
    formData.append(element.name, file);
}
}else if(element.name !== 'lang[]'){
    formData.append(element.name, element.value);
}
    else if(element.name === 'lang[]'){
    if (element.checked) {
    formData.append(element.name, element.value);
}
}
});


    let response = await fetch(ACTION, {
    method: METHOD,
    body: formData
});

    response = await response.text();

    image.src = `files/new/jpg/${response}.jpg`;
});
});