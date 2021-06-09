require('./bootstrap');

// Import modules...
import Vue from 'vue';
import {App as InertiaApp, plugin as InertiaPlugin} from '@inertiajs/inertia-vue';
import VueFilterDateFormat from '@vuejs-community/vue-filter-date-format';
import JsonCSV from 'vue-json-csv';
import { Photoshop } from 'vue-color'
import {asset} from '@codinglabs/laravel-asset'

Vue.component('downloadCsv', JsonCSV)
Vue.use(VueFilterDateFormat);
// import PortalVue from 'portal-vue';

Vue.mixin({methods: {route, asset}});
Vue.use(InertiaPlugin);
// Vue.use(PortalVue);

const app = document.getElementById('app');

new Vue({
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);

// InertiaProgress.init({ color: '#4B5563' });
