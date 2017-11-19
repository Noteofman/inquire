import VueRouter from 'vue-router';
import Home from './components/home/Home';
import Browse from './components/browse/Browse';

export default new VueRouter({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/browse',
      name: 'Browse',
      component: Browse
    }
  ]
})