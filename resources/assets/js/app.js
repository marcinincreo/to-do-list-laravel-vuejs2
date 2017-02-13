require('./bootstrap');
Vue.use(require('vue-resource'));

Vue.component('tasks', require('./components/Tasks.vue'));

var app = new Vue({
    el: '#app'
});
