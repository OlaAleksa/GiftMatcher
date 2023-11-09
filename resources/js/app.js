import './bootstrap';

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    let app_project = createApp({ render: () => h(app, props) });
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)

      const app = createApp({ render: () => h(App, props) })
      .component('inertia-link', Link) 
      .use(plugin)
      .mixin({ methods: { route } })
      .mount(el)
  },
})