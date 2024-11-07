import './bootstrap';

import {createApp, h} from 'vue'
import {createInertiaApp} from '@inertiajs/vue3'
import {ZiggyVue} from '../../vendor/tightenco/ziggy';

const appName = import.meta.env.VITE_APP_NAME || 'Jobbar - The Ultimate Job Board';

createInertiaApp({
    title: (title) => title ? `${title} | ${appName}` : appName,
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', {eager: true})
        return pages[`./Pages/${name}.vue`]
    },
    setup({el, App, props, plugin}) {
        return createApp({render: () => h(App, props)})
            .use(plugin)
            .use(ZiggyVue)
            .mount(el)
    },
})
