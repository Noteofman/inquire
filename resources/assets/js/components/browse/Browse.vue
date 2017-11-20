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
                <sidelist v-if="postCategory" @clicked='onCategoryClick' header='CATEGORY' :list-items='postCategory' > </sidelist>
              </div>
              <div id='company-list'>
                <transition name="fade">
                  <company-list @clicked='onCompanyClick' header='BUSINESSES' :subcategory='selectedCat' :list-items='companies' v-if="showCompanyList"> </company-list>
                </transition>
              </div>
        </div>
    </div>
</div>
</template>

<script>

import Titlebar from '../base/Titlebar';
import SideList from './SideList';
import CompanyList from './CompanyList';
import router from '../../routes';

export default {
    name: 'browse',
    components: {
        'titlebar' : Titlebar,
        'sidelist' : SideList,
        'companyList' : CompanyList
    },
    data () {
        return {
          loading: false,
          postCategory: null,
          error: null,
          selectedCat: null,
          showCompanyList: null,
          companies: null
        }
    },

    methods: {
      onCategoryClick(event) {
        this.loading;
        var el = $(event.target);
        this.selectedCat = el.attr('data-category')
        axios.get('/api/companies/filter',
          {
            params: {
              type: 'category',
              value: this.selectedCat
            }
          }
          )
          .then(response => {
            this.loading = false;
            $("#category-list").animate({
                width: 0,
              },
              {
                complete: _.bind(function() {
                    $("#category-list").hide();
                    this.showCompanyList = true;
                    this.companies = response.data;
                }, this)
              }
            );
          })
          .catch(error => {
            this.loading =false;
            console.log(error);
          });
      },

      onCompanyClick(event) {
        var el = $(event.target);
        var id = el.attr('data-id');
        router.push('/browse/' + id);
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