const typed = new Typed('.typed', {
    strings: [
        '<i class="acambaro">Europa</i>',
        '<i class="jerecuaro">Canada</i>',
        '<i class="coroneo">Perú</i>',
        '<i class="tarimoro">Japón</i>',
        '<i class="salvatierra">Egipto</i>',
        '<i class="taranda">Colombia</i>'
    ],

    //stringsElement: '#cadenas-texto', // ID del elemento que contiene cadenas de texto a mostrar.
    typeSpeed: 75, // Velocidad en mlisegundos para poner una letra,
    startDelay: 300, // Tiempo de retraso en iniciar la animacion. Aplica tambien cuando termina y vuelve a iniciar,
    backSpeed: 75, // Velocidad en milisegundos para borrrar una letra,
    //smartBackspace: true, // Eliminar solamente las palabras que sean nuevas en una cadena de texto.
    shuffle: false, // Alterar el orden en el que escribe las palabras.
    backDelay: 2000, // Tiempo de espera despues de que termina de escribir una palabra.
    loop: true, // Repetir el array de strings
    loopCount: false, // Cantidad de veces a repetir el array.  false = infinite
    showCursor: true, // Mostrar cursor palpitanto
    cursorChar: '|', // Caracter para el cursor
    contentType: 'html', // 'html' o 'null' para texto sin formato
});


window.addEventListener('load', function() {
    new Glider(document.querySelector('.carousel__lista'), {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: '.carousel__indicadores',
        arrows: {
            prev: '.carousel__anterior',
            next: '.carousel__siguiente'
        },
        responsive: [{
            // screens greater than >= 775px
            breakpoint: 450,
            settings: {
                // Set to `auto` and provide item width to adjust to viewport
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }, {
            // screens greater than >= 1024px
            breakpoint: 800,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 4
            }
        }]
    });

});

var slider = new Glider(document.querySelector('.carousel__lista'), {
    slidesToScroll: 1,
    slidesToShow: 1,
    dots: '.carousel__indicadores',
    arrows: {
        prev: '.carousel__anterior',
        next: '.carousel__siguiente'
    },
    responsive: [{
        // screens greater than >= 775px
        breakpoint: 450,
        settings: {
            // Set to `auto` and provide item width to adjust to viewport
            slidesToShow: 2,
            slidesToScroll: 2
        }
    }, {
        // screens greater than >= 1024px
        breakpoint: 800,
        settings: {
            slidesToShow: 4,
            slidesToScroll: 4
        }
    }]
});

slideAutoPaly(slider, '.carousel__lista');

function slideAutoPaly(glider, selector, delay = 5000, repeat = true) {
    let autoplay = null;
    const slidesCount = glider.track.childElementCount;
    let nextIndex = 1;
    let pause = true;

    function slide() {
        autoplay = setInterval(() => {
            if (nextIndex >= slidesCount) {
                if (!repeat) {
                    clearInterval(autoplay);
                } else {
                    nextIndex = 0;
                }
            }
            glider.scrollItem(nextIndex++);
        }, delay);
    }

    slide();

    var element = document.querySelector(selector);
    element.addEventListener('mouseover', (event) => {
        if (pause) {
            clearInterval(autoplay);
            pause = false;
        }
    }, 300);

    element.addEventListener('mouseout', (event) => {
        if (!pause) {
            slide();
            pause = true;
        }
    }, 300);
}