// EscolherArmadura.js

document.getElementById('definir').addEventListener('click', function() {
    const form = document.getElementById('armorForm');
    const formData = new FormData(form);

    fetch("", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.querySelector('.image-container').innerHTML = new DOMParser().parseFromString(data, 'text/html').querySelector('.image-container').innerHTML;
    });
});

document.getElementById('resetar').addEventListener('click', function() {
    fetch("", {
        method: "POST",
        body: new URLSearchParams('resetar=1')
    })
    .then(response => response.text())
    .then(data => {
        document.querySelector('.image-container').innerHTML = new DOMParser().parseFromString(data, 'text/html').querySelector('.image-container').innerHTML;
    });
});
