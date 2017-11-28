<template>
<div id="browse">
    <titlebar title='Browse'></titlebar>
    <div class="container">
        <div class="row">
            <div class="col">
                <h3> Lets take a look at some local businesses shall we?</h3>
            </div>
        </div>
        <div class="row">
            <div class="loading" v-if="loading">
              Loading...
            </div>
              <div id="category-list">
                <sidelist v-if="postCategory" header='CATEGORY' :list-items='postCategory' > </sidelist>
              </div>
        </div>
    </div>
</div>
</template>

<script>

import Titlebar from '../base/Titlebar';
import SideList from './SideList';

export default {
    name: 'browse',
    components: {
        'titlebar' : Titlebar,
        'sidelist' : SideList,
    },

    data () {
        return {
          loading: false,
          postCategory: null,
          error: null,
        }
    },

    created() {
        this.loading = true;
        axios.get('/api/companies/categories')
          .then(response => {
            this.loading = false;
            this.postCategory = response.data;
          })
          .catch(error => {
            this.loading = false;
            console.log(error);
          });
    }
}
</script>