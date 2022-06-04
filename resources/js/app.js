require('./bootstrap');

import { createApp } from "vue";

import App from './components/app'

const app = createApp({});

app.component('App', App);

app.mount("#app")
