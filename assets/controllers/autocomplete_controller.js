import {Controller} from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ["autocomplete"]

    connect() {
        console.log('Hello, Stimulus!', this.element)
    }


    toggle() {
        let address = JSON.parse(this.element.value)
        let cityInput =  document.getElementById('simple_address_city')
        let zipCodeInput =  document.getElementById('simple_address_postcode')
        let streetInput = document.getElementById('simple_address_street');

        cityInput.value = address.city
        zipCodeInput.value = address.postcode
        streetInput.value = address.name
    }
}
