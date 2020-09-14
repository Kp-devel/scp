require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('busqueda-paleta', require('./components/busquedaPaleta.vue').default);
Vue.component('busqueda-adicional', require('./components/busquedaAdicional.vue').default);
Vue.component('operativos', require('./components/operativos.vue').default);

const app = new Vue({
    el: '#app',
});
