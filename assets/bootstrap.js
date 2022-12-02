import { startStimulusApp } from '@symfony/stimulus-bridge';
import { Autocomplete } from 'stimulus-autocomplete'
import CustomAutocomplete_controller from "./controllers/custom-autocomplete_controller";
import Hello_controller from "./controllers/hello_controller";

// Registers Stimulus controllers from controllers.json and in the controllers/ directory
export const app = startStimulusApp(require.context(
    '@symfony/stimulus-bridge/lazy-controller-loader!./controllers',
    true,
    /\.[jt]sx?$/
));

// register any custom, 3rd party controllers here
app.register('hello_controller', Hello_controller);
