class scrollSpy {

    constructor() {
        if (arguments.length <= 0) {
            let m = new Error('Arguments cannot be null')
            return console.error(m);
        } else {
            this.clientHeight = window.innerHeight || document.documentElement.clientHeight
            this.NodeList = document.querySelectorAll(arguments[0])
            this.DOMRect = new Object()
            for (let i = 0; i < this.NodeList.length; i++) {
                this.DOMRect[i] = this.NodeList[i].getBoundingClientRect()
                this.NodeList[i].inView  = false
                this.NodeList[i].onTop = false
                this.NodeList[i].onBottom = false
                this.getPosition(i, this)
            }
            this.callback = new Object()
            if (typeof arguments[1] == 'string') {
                this.mode = arguments[1]
            }
            this.mode = 'alternate'
            this.delay = 0
        }
    }

    getPosition(i, x) {
        if (typeof i == 'number' && x == this) {
            if (this.DOMRect[i].top + 10 <= this.clientHeight && this.DOMRect[i].top + 10 > 0) {
                this.NodeList[i].dataset.position = 'inView'
                this.NodeList[i].position = 'inView'
                return 'inView'
            }
            if (this.DOMRect[i].bottom < 0) {
                this.NodeList[i].dataset.position = 'top'
                this.NodeList[i].position = 'top'
                return 'top'
            }
            if (this.DOMRect[i].top && this.DOMRect[i].top > this.clientHeight) {
                this.NodeList[i].dataset.position = 'bottom'
                this.NodeList[i].position = 'bottom'
                return 'bottom'
            }
        } else {
            let e = new Error('Method not allowed!')
            return console.error(e)
        }
    }

    inView() {
        let isTrue = new Array()
        if (typeof arguments[0] !== 'function') {
            let e = new Error('Argument must be a function, ' + typeof arguments[0] + ' given')
            if (typeof arguments[0] == 'undefined') {
                e = new Error('Argument cannot be null')
            }
            return console.error(e)
        }
        this.callback.inView = arguments[0]
        if (typeof arguments[1] == 'string') {
            this.mode = arguments[1]
            if (typeof arguments[2] == 'number' || 'function') {
                this.delay = arguments[2]
            }
        }
        if (typeof arguments[1] == 'number' || 'function') {
            this.delay = arguments[1]
        }
        for (let i = 0; i < this.NodeList.length; i++) {
            this.DOMRect[i] = this.NodeList[i].getBoundingClientRect()
            isTrue[i] = (this.getPosition(i, this) == 'inView') ? true : false
            this.NodeList[i].inView = this.NodeList[i].classList.contains('seen')
            this.NodeList[i].delay = (typeof this.delay == 'function' || (this.NodeList[i].inView && typeof this.delay == 'function')) ? this.delay(i) : this.delay = 0
            switch (this.mode) {
                case 'once':
                    if (!this.NodeList[i].inView && isTrue[i]) {
                        this.NodeList[i].classList.add('seen')
                        setTimeout(
                            function (a, b) {
                                a(b)
                            }, this.NodeList[i].delay, this.callback.inView, this.NodeList[i])
                    }
                    break;
                default:
                    if (this.DOMRect[i].top + 10 >= this.clientHeight) { this.NodeList[i].classList.remove('seen') }
                    if (!this.NodeList[i].inView && isTrue[i]) {
                        this.NodeList[i].classList.add('seen')
                        setTimeout(
                            function (a, b) {
                                a(b)
                            }, this.NodeList[i].delay, this.callback.inView, this.NodeList[i])
                    }
                    break;
            }
            
        }
        return this
    }

    onTop() {
        let isTrue = new Array()
        if (typeof arguments[0] !== 'function') {
            let e = new Error('Argument must be a function, ' + typeof arguments[0] + ' given')
            if (typeof arguments[0] == 'undefined') {
                e = new Error('Argument cannot be null')
            }
            return console.error(e)
        }
        this.callback.onTop = arguments[0]
        if (typeof arguments[1] == 'string') {
            this.mode = arguments[1]
            if (typeof arguments[2] == 'number' || 'function') {
                this.delay = arguments[2]
            }
        }
        if (typeof arguments[1] == 'number' || 'function') {
            this.delay = arguments[1]
        }
        for (let i = 0; i < this.NodeList.length; i++) {
            this.getPosition(i, this)
            this.DOMRect[i] = this.NodeList[i].getBoundingClientRect()
            isTrue[i] = (this.NodeList[i].position == 'top') ? true : false
            this.NodeList[i].delay = (typeof this.delay == 'function') ? this.delay(i) : this.delay = 0
            switch (this.mode) {
                case 'once':
                    this.NodeList[i].onTop = this.NodeList[i].classList.contains('onTop')
                    if (!this.NodeList[i].onTop && isTrue[i]) {
                        this.NodeList[i].classList.add('onTop')
                        setTimeout(
                            function (a, b) {
                                a(b)
                            }, this.NodeList[i].delay, this.callback.onTop, this.NodeList[i])
                    }
                    break;
                default:
                    if (this.DOMRect[i].bottom >= 0) { this.NodeList[i].classList.remove('onTop') }
                    this.NodeList[i].onTop = this.NodeList[i].classList.contains('onTop')
                    if (!this.NodeList[i].onTop && isTrue[i]) {
                        this.NodeList[i].classList.add('onTop')
                        setTimeout(
                            function (a, b) {
                                a(b)
                            }, this.NodeList[i].delay, this.callback.onTop, this.NodeList[i])
                    }
                    break;
            }
        }
        return this
    }

    onBottom() {
        let isTrue = new Array()
        if (typeof arguments[0] !== 'function') {
            let e = new Error('Argument must be a function, ' + typeof arguments[0] + ' given')
            if (typeof arguments[0] == 'undefined') {
                e = new Error('Argument cannot be null')
            }
            return console.error(e)
        }
        this.callback.onBottom = arguments[0]
        if (typeof arguments[1] == 'string') {
            this.mode = arguments[1]
            if (typeof arguments[2] == 'number' || 'function') {
                this.delay = arguments[2]
            }
        }
        if (typeof arguments[1] == 'number' || 'function') {
            this.delay = arguments[1]
        }
        for (let i = 0; i < this.NodeList.length; i++) {
            this.DOMRect[i] = this.NodeList[i].getBoundingClientRect()
            isTrue[i] = (this.getPosition(i, this) == 'bottom') ? true : false
            this.NodeList[i].delay = (typeof this.delay == 'function') ? this.delay(i) : this.delay = 0
            switch (this.mode) {
                case 'once':
                    this.NodeList[i].onBottom = this.NodeList[i].classList.contains('onBottom')
                    if (!this.NodeList[i].onBottom && isTrue[i]) {
                        this.NodeList[i].classList.add('onBottom')
                        setTimeout(
                            function (a, b) {
                                a(b)
                            }, this.NodeList[i].delay, this.callback.onBottom, this.NodeList[i])
                    }
                    break;
                default:
                    if (this.DOMRect[i].bottom <= this.clientHeight) { this.NodeList[i].classList.remove('onBottom') }
                    this.NodeList[i].onBottom = this.NodeList[i].classList.contains('onBottom')
                    if (!this.NodeList[i].onBottom && isTrue[i]) {
                        this.NodeList[i].classList.add('onBottom')
                        setTimeout(
                            function (a, b) {
                                a(b)
                            }, this.NodeList[i].delay, this.callback.onBottom, this.NodeList[i])
                    }
                    break;
            }
        }
        return this
    }

    reach() {
        let e
        if (arguments.length < 2) {
            e = new Error('Arguments length must be 2 or 3, ' + arguments.length + ' given')
            return console.error(e)
        } else {
            if (typeof arguments[0] != 'number') {
                e = new Error('Argument 1 must be number, ' + typeof arguments[0] + ' given')
                return console.error(e)
            }
            if (typeof arguments[1] != 'function') {
                e = new Error('Argument 2 must be function, ' + typeof arguments[1] + ' given')
                return console.error(e)
            }
            if (arguments.length == 3 && typeof arguments[2] != 'function') {
                e = new Error('Argument 3 must be function, ' + typeof arguments[2] + ' given')
                return console.error(e)
            }
        }
        if (window.scrollY >= arguments[0]) {
            for (let i = 0; i < this.NodeList.length; i++) {
                this.NodeList[i]
                if (typeof arguments[1] == 'function') {
                    arguments[1](this.NodeList[i], window.scrollY)
                }
            }
            
        } else {
            for (let i = 0; i < this.NodeList.length; i++) {
                this.NodeList[i]
                if (typeof arguments[2] == 'function') {
                    arguments[2](this.NodeList[i], window.scrollY)
                }
            }
        }
        return this
    }
}
