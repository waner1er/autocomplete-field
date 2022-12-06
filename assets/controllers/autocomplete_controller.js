import {Controller} from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ["autocomplete"]

    connect() {
        console.log("Hello, Stimulus!", this.element)
        // this.outputTarget.textContent = 'Hello, Stimulus!'
    }


    toggle() {
        // this.outputTarget.textContent = select.options[select.selectedIndex].text
        let address = JSON.parse(this.element.value)
        // console.log(address)
        let cityInput =  document.getElementById('simple_address_city')
        let zipCodeInput =  document.getElementById('simple_address_postcode')
        let streetInput = document.getElementById('simple_address_choix');

        console.log(this.element.value)

        cityInput.value = address.city
        zipCodeInput.value = address.postcode
    }
}
