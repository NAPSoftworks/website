import '../css/app.css';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import type { DefineComponent } from 'vue';
import { createApp, h } from 'vue';
import { ZiggyVue } from 'ziggy-js';
import { initializeTheme } from './composables/useAppearance';
import { createI18n } from 'vue-i18n';
import enUS from './lang/en-US.json'

type MessageSchema = typeof enUS

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';
const i18n = createI18n<[MessageSchema], 'en-US'>({
    legacy: false,
    locale: 'en-US',
    fallbackLocale: 'en-US',
    messages: {
        'en-US': Object.assign(enUS)
    },
})

createInertiaApp({
    title: (title) => (title ? `${title} - ${appName}` : appName),
    resolve: (name) => resolvePageComponent(`./pages/${name}.vue`, import.meta.glob<DefineComponent>('./pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(i18n)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
}).then(() => initializeTheme());
