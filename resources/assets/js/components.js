
import * as Maps from 'vue2-google-maps'
import Config from './utils/Config';
import ReadMore from 'vue-read-more';
import infiniteScroll from 'vue-infinite-scroll'

var completeEvent = new Event('components:loaded');

Config.get(false, config => {
	Vue.use(Maps, {
	  load: {
	    key: config.maps.api_key,
	    libraries: 'places'
	  }
	});
	Vue.use(ReadMore);
	Vue.use(infiniteScroll);
	window.dispatchEvent(completeEvent);
});

