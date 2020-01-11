import axios from "axios"

class CreateNews {

    constructor(form, url) {
        this._form = form
        this._url = url

        this.init()
    }

    get url() {
        return this._url
    }
    get form() {
        return this._form
    }

    init() {
        this.captureForm()
        console.log('loaded')
    }

    captureForm() {
        $(this.form).submit(function(e) {
            e.preventDefault()
            let form = $(this.form).serialize() + '&allCategories=' + this.allCategories()

            this.sendForm(form)
        }.bind(this))
    }

    allCategories()
    {
        let categories = JSON.parse('{"categories":[]}')

        $.each($(this.form).serializeArray(), function(i, field){
            if(field.name === 'categories') {
                categories['categories'].push(field.value)
            }
        })

        return JSON.stringify(categories)
    }

    sendForm(data) {
        axios({
            method: 'post',
            url: this.url,
            data: data
        })
            .then(function (response) {
                //handle success
                console.log(response)
            })
            .catch(function (response) {
                //handle error
                console.log(response)
            })
    }

}

window.CreateNews = CreateNews
