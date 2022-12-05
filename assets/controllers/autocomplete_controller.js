import {Controller} from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ["autocomplete", "output"]

    toggle() {
        let select = document.getElementById('simple_address_choix');
        this.outputTarget.textContent = select.options[select.selectedIndex].text
        console.log(this.outputTarget.textContent)
        let zipcodeInput = document.getElementById('simple_address_zipCode');
        let cityInput = document.getElementById('simple_address_city');
        // if (zipcodeInput && cityInput) {
        //
        //     zipcodeInput.value = select.options[select.selectedIndex].postcode;
        //     cityInput.value = select.options[select.selectedIndex].text;
        // }
    }
}
