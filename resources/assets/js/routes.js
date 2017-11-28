import VueRouter from 'vue-router';
import Home from './components/home/Home';
import Browse from './components/browse/Browse';
import CompanyList from './components/browse/CompanyList';
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
      name: 'list',
      component: CompanyList,
      props: true
    },
    {
      path: '/search',
      name: 'search',
      component: CompanyList,
      props: false
    },
    {
      path: '/company/:id',
      name: 'company',
      component: Company,
      props: true
    }
  ]
})