import { createApp, h } from 'vue'
import { createInertiaApp, Head, Link } from '@inertiajs/vue3'
import Layout from './Shared/Layout.vue'

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })

    const page = pages[`./Pages/${name}.vue`]

    page.default.layout ??= Layout

    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .component('Link', Link)
      .component('Head', Head)
      .use(plugin)
      .mount(el)
  },
  title: (title) => `My App - ${title}`
})