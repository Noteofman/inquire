import VueRouter from 'vue-router';
import Home from './components/home/Home';
import Browse from './components/browse/Browse';
import Company from './components/company/Company';

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
    },
    {
      path: '/browse/:id',
      name: 'company',
      component: Company,
      props: true
    }
  ]
})