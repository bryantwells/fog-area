class Bug {

    constructor(parent, letter) {
        this.parent = parent
        this.letter = letter
        this.element = document.createElement('bug')

        this.make()
    }

    make() {
        this.element.innerHTML = (this.letter !== ' ')
            ? this.letter
            : '&nbsp;'
    }

    crawl(min, max) {
        this.position = {
            top: Math.random() * (max - min) + min,
            left: Math.random() * (max - min) + min
        }
    }

    get position() {
        return {
            top: parseInt(this.element.style.top, 10) || 0,
            left: parseInt(this.element.style.left, 10) || 0
        }
    }

    set position(val) {
        this.element.style.top = `${this.position.top + val.top}px`
        this.element.style.left = `${this.position.left + val.left}px`
    }

}

class Colony {

    constructor(parent, word) {
        this.parent = parent
        this.bugs = word.trim().split('')
            .map(letter => new Bug(this.element, letter))
        this.element = document.createElement('colony')

        this.make()
    }

    make() {
        this.element.innerHTML = ''
        this.bugs.forEach((bug) => {
            this.element.appendChild(bug.element)
        })
    }

    excite(speed, distance) {
        this.bugs.forEach((bug, i) => {
            setTimeout(() => {
                bug.crawl(0 - distance, distance)
            }, i * speed)
        })
    }

}

class SuperColony {

    constructor(selector) {
        this.element = document.querySelector(selector)
        this.colonies = this.element.textContent.trim().split(' ')
            .map(word => new Colony(this.element, word))

        this.make()
    }

    make() {
        this.element.innerHTML = ''
        this.colonies.forEach((colony) => {
            this.element.appendChild(colony.element)
        })
    }

    excite(speed, distance) {
        this.colonies.forEach((colony) => {
            colony.excite(speed, distance)
            setInterval(() => { colony.excite(speed, distance) }, colony.bugs.length * speed)
        })
    }
}

class Leaf {

    constructor(parent, distance) {
        this.parent = parent
        this.distance = distance
        this.element = document.createElement('leaf')

        this.make()
    }

    make() {
        const max = this.distance
        const min = 0 - this.distance
        this.position = {
            top: Math.random() * (max - min) + min,
            left: Math.random() * (max - min) + min,
        }
        this.parent.appendChild(this.element)
    }

    get position() {
        return {
            top: parseInt(this.element.style.top, 10) || 0,
            left: parseInt(this.element.style.left, 10) || 0
        }
    }

    set position(val) {
        this.element.style.top = `${this.position.top + val.top}%`
        this.element.style.left = `${this.position.left + val.left}%`
    }

}

const superColony = new SuperColony('.SuperColony')
superColony.excite(150, 15)