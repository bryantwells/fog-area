class Speaker {

    constructor () {
        this.synth = window.speechSynthesis
        this.synth.onvoiceschanged = () => {
            this.voices = this.synth.getVoices()
        }
    }

    speak(script) {
        const utterance = new SpeechSynthesisUtterance(script.line)
        utterance.voice = this.voices[script.voiceIndex]
        utterance.rate = script.rate
        utterance.pitch = script.pitch
        this.synth.speak(utterance)
    }

}

class SpeakerBox {

    constructor(selector, scriptList) {
        this.element = document.querySelector(selector)
        this.scriptList = scriptList
        this.activeScript = this.scriptList[0]
        this.speaker = new Speaker()

        this.init()
    }

    init () {
        this.caption = this.activeScript.line
        window.addEventListener('click', () => {
            if (!this.speaker.synth.speaking) {
                this.speak()
            }
        })
    }

    speak () {
        console.log({ 
            aka: this.activeScript.name,
            name: this.speaker.voices[this.activeScript.voiceIndex].name,
            lang: this.speaker.voices[this.activeScript.voiceIndex].lang,
            rate: this.activeScript.rate,
            pitch: this.activeScript.pitch
        })
        this.speaker.speak(this.activeScript)
        this.image = this.activeScript.img
        this.caption = this.activeScript.line
        this.advanceScript()
    }

    advanceScript () {
        if (this.activeScriptIndex < this.scriptList.length - 1) {
            this.activeScriptIndex++
        } else {
            this.activeScriptIndex = 0
        }
    }

    get activeScriptIndex () {
        return this.scriptList.indexOf(this.activeScript)
    }

    set activeScriptIndex (val) {
        this.activeScript = this.scriptList[val]
    }

    set image (imageSrc) {
        this.element.querySelector('img').src = `assets/media/${ imageSrc }`
    }

    set caption (line) {
        this.element.querySelector('figcaption').innerText = this.activeScript.line
    }

}

const scriptList = [
    {
        name: 'Lily',
        img: 'crease-3.jpg',
        line: "sheesh crease",
        voiceIndex: 49,
        rate: 1,
        pitch: 1
    },
    {
        name: 'Alex',
        img: 'crease-6.jpg',
        line: 'sheesh crease',
        voiceIndex: 0,
        rate: 1.4,
        pitch: 0.7
    },
    {
        name: 'Daniel',
        img: 'crease-7.jpg',
        line: 'sheeeesh',
        voiceIndex: 0,
        rate: 0.2,
        pitch: 0.5
    },
    {
        name: 'Tom',
        img: 'crease-11.jpg',
        line: 'crease!',
        voiceIndex: 50,
        rate: 1.5,
        pitch: 1.5
    },
    {
        name: 'Victoria',
        img: 'crease-5.jpg',
        line: 'sheesh? crease?',
        voiceIndex: 40,
        rate: 1,
        pitch: 1.3
    },
    {
        name: 'Karen',
        img: 'crease-1.jpg',
        line: 'sheeshy',
        voiceIndex: 17,
        rate: 1,
        pitch: 0.6
    },
    {
        name: 'Moira',
        img: 'crease-2.jpg',
        line: 'creasy',
        voiceIndex: 28,
        rate: 1.2,
        pitch: 2
    },
    {
        name: 'Donny',
        img: 'crease-10.jpg',
        line: 'sheesh!',
        voiceIndex: 50,
        rate: 1.3,
        pitch: 0
    }
]

const speakerBox = new SpeakerBox('main', scriptList)
