const bugs = ['*', '~', ',', '"', '>', '°', '-', '.', '_', '∞', '•', '\u205f​​​', '\u205f​​​', '\u205f​​​']

setInterval(() => {
    const i = Math.floor(Math.random() * bugs.length)
    document.title = `${bugs[i]} ${document.title}`
    if (document.title.length > 100) {
        document.title = document.title.slice(0, -1)
    }
}, 500)