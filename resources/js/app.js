import './bootstrap';
import {createApp, h} from 'vue';
import {createInertiaApp, Link} from '@inertiajs/inertia-vue3';
import {InertiaProgress} from '@inertiajs/progress';
import Layout from './Pages/Layout/Layout';
import {library} from '@fortawesome/fontawesome-svg-core';
import {faEye, faEdit, faPlus, faTrash} from '@fortawesome/free-solid-svg-icons';
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome';

library.add(faPlus, faTrash, faEye, faEdit);

createInertiaApp({
    resolve: name => {
        const page = require(`./Pages/${name}`).default
        page.layout = page.layout || Layout
        return page
    },
    setup({el, App, props, plugin}) {
        createApp({render: () => h(App, props)})
            .use(plugin)
            .component('Link', Link)
            .component('font-awesome-icon', FontAwesomeIcon)
            .mount(el)
    },
});

// InertiaProgress.init();



