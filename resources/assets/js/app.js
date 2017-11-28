import  './bootstrap';
import './components';
import router from './routes';
import App from './App'

window.addEventListener('components:loaded', () => {
	const app = new Vue({
	    el: '#app',
	    router,
	    template: '<App/>',
	  	components: { App }
	});
});