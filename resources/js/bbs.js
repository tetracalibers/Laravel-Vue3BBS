require('./bootstrap');

import { createApp } from 'vue'
import bbs from './vue/BBS.vue'

const app = createApp(bbs)

app.mount('#bbsapp')
