export default {
    options: null,
    
    get (force = false, callback = false) {
      if (this.options && !force) {
        if (typeof callback === 'function') {
          return callback(this.options)
        }
        return this.options;
      }
      axios.get('/api/config')
        .then(response => {
          this.options = response.data;
          if (typeof callback === 'function') {
            return callback(this.options)
          }
          return this.options;
        })
        .catch(error => {
          console.log('Could not get configuration options.', error);
        });
     }
}