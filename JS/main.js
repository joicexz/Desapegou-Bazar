let count = 1;
// BOTÃO CARROSSEL
document.getElementById("radio1").checked = true;

// passar para o prox slide dps de 5seg
setInterval(function () {
    nextImage();
}, 5000)

function nextImage() {
    count++;
    if (count > 3) {
        count = 1;
    }

    document.getElementById("radio" + count).checked = true;
}