superplaceholder({
    el: document.querySelector('.text1'),
    sentences: ['Ingrese un destino...', 'Francia', 'Turquía', 'España', 'Costa Rica', 'Perú'],
    options: {
        // delay between letters (in milliseconds)
        letterDelay: 100, // milliseconds
        // delay between sentences (in milliseconds)
        sentenceDelay: 2000,
        // should start on input focus. Set false to autostart
        startOnFocus: false, // [DEPRECATED]
        // loop through passed sentences
        loop: true,
        // Initially shuffle the passed sentences
        shuffle: false,
        // Show cursor or not. Shows by default
        showCursor: true,
        // String to show as cursor
        cursor: '|',

    }
});