let time = 5000,        //este é o tempo de troca de cada imagem
    currentImageIndex = 0,
    images = document
                .querySelectorAll("#backauto img")
    max = images.length;

function nextImage() {          // Este é o metodo que troca de imagem

    images[currentImageIndex]
        .classList.remove("selected")

    currentImageIndex++

    if(currentImageIndex >= max)
        currentImageIndex = 0

    images[currentImageIndex]
        .classList.add("selected")
}

function start() {
    setInterval(() => {
        // troca de image
        nextImage()
    }, time)
}

window.addEventListener("load", start) // este ativa todo o script