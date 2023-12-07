import './bootstrap';
import '../css/app.scss'

import { createApp, h } from 'vue'
import { createInertiaApp, Link } from '@inertiajs/vue3';
import { VueReCaptcha, useReCaptcha } from 'vue-recaptcha-v3';
import Toaster from "@meforma/vue-toaster";


import ComponentsUI from "@/Components/UI";

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    // If you want to use UI components in entire project, you should add this component in file @/Components/UI/index.js
    let app_project = createApp({ render: () => h(app, props) });
    ComponentsUI.forEach(component => {
        app_project.component(component.name, component)
    });

    const captcheKey = props.initialPage.props.recaptcha_site_key;
    const app = createApp({ render: () => h(App, props) })
      .component('inertia-link', Link) 
      .use(plugin)
      .use(VueReCaptcha, { siteKey: captcheKey } )
      .use(Toaster)
      .mixin({ methods: { route } })
      .mount(el)
  },
})
