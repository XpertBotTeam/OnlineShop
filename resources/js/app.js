/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

import exchangeComponent from './components/exchangeRate.vue';
import categories from './components/categoriesGrid.vue';
import offers from './components/offers.vue'
import filters from './components/filters.vue'
import products from './components/products.vue'
import APP from './components/app.vue'
import cart from './components/cart.vue'
app.component('exchange-rate', exchangeComponent);
app.component('categories',categories)
app.component('offers',offers)
app.component('filters',filters)
app.component('products',products)
app.component('cart',cart)
app.component('app',APP)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.globEager('./**/*.vue')).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');
