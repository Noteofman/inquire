<template>

<div class="col">
    <div class="container">
        <div class="row">
            <div class="col">
          <div>
            <form v-on:submit.prevent="onFilter" class="form-horizontal">
              <div class="form-group-filter">
                <label for="location1" class="control-label">Distance</label>
                <select v-model="selected_distance" class="form-control" name="distance" id="distance">
                  <option value="">Any</option>
                  <option value="1">1 Mile</option>
                  <option value="2">2 Miles</option>
                  <option value="3">3 Miles</option>
                  <option value="5">5 Miles</option>
                  <option value="10">10 Miles</option>
                </select>
              </div>
              <div class="form-group-filter">
                <label for="type1" class="control-label">Type</label>
                <select v-model="selected_subcat" class="form-control" name="" id="type1">
                  <option value=""></option>
                  <option :value='cat.business_sub_category' v-for='cat in subcategories' value="">{{cat.business_sub_category}}</option>
                </select>
              </div>
              <p id='search-filter' class="text-center"><button type="submit" href="#" class="btn btn-danger glyphicon glyphicon-search" role="button"></button></p>
            </form>
          </div>
        </div>
        </div>
    </div>
    <div class="single companies" v-infinite-scroll="loadMore" infinite-scroll-disabled="busy" infinite-scroll-distance="10" infinite-scroll-immediate-check='false'>
        <h3 class="side-title"><strong>BUSINESSES - {{category}}</strong></h3>
        <ul class="list-unstyled">
            <li v-for="item in listItems">
                <div class="container">
                  <div class="panel panel-default">
                    <div class="panel-heading text-left">
                       <strong> <a id='company-header' :data-id="item.id" v-on:click='onCompanyClick' >
                        {{item.title}}</a> </strong>
                        <span v-if='item.distance'><i>{{item.distance}} Miles Away</i></span>
                    </div>
                    <div class="panel-body">
                        <div class="pull-left"><i>{{item.business_sub_category}}</i></div> <br>
                        <div class="pull-left">{{item.location}}</div>
                        <div class="pull-right"><span class="fa fa-phone"></span> <strong>{{item.telephone}}</strong></div>
                    </div>
                  </div>
                </div>
            </li>   
        </ul>
   </div>
</div> 

</template>

<script>

import router from '../../routes';
    
export default {
    props: ['id'],

    data() {
      return {
        listItems: null,
        subcategories: null,
        category: this.$route.query.category,
        term: this.$route.query.term,
        busy: false,
        selected_distance: null,
        selected_subcat: null
      }
    },

    methods: {
        onCompanyClick(event) {
          var el = $(event.target);
          var id = el.attr('data-id');
          router.push('/company/' + id);
        },

        loadMore() {
        },

        setup(callback)
        {
          var params =  {
              category_id: this.id,
              term: this.term
          };
          if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(location => {
                  params.longitude = location.coords.longitude;
                  params.latitude = location.coords.latitude;
                  callback(params);
              }, (error) => {
                callback(params);
              });
          } else {
              callback(params);
          }
        },

        onFilter() {
          this.setup((params) => {
            params.subcat = this.selected_subcat,
            params.distance = this.selected_distance,
            axios.get('/api/companies/filter',
            {
              params: params
            }
            )
            .then(response => {
              this.listItems = response.data;
            })
          });
        },
    },

    created() {
      this.setup( params => {
        axios.get('/api/companies/filter',
        {
          params: params
        })
        .then(response => {
          this.listItems = response.data;
        })
        .catch(error => {
          this.loading =false;
          console.log(error);
        });
      });
      axios.get('/api/companies/categories/' + this.id)
        .then(response => {
            this.subcategories = response.data;
        })
    },
}

</script>

<style scoped>

#search-filter button {
  width: 75px;
  margin-bottom: 3px;
}

li {
  height: 130px;
}

select:required:invalid {
  color: gray;
}
option[value=""][disabled] {
  display: none;
}
option {
  color: black;
}

a:hover {
 cursor:pointer;
}

#search-filter{
    margin-left:15px;
    display: inline-block;
}

.form-group-filter {
    display: inline-block;
}

#company-header {
    display: inline-block;
    padding-right: 15px;
}

@media screen and (min-width: 500px) {
    .category {
        min-width: 500px;
    }
}

.panel-heading {
    padding: 0px 15px;
    background-color:#f5f5f5
}


.single {
    padding: 30px 15px;
    background: #fcfcfc;
    border: 1px solid #f0f0f0; 
}
.single h3.side-title {
    margin: 0;
    margin-bottom: 10px;
    padding: 0;
    font-size: 20px;
    text-transform: uppercase;
}
.single h3.side-title:after 
{
    content: '';
    width: 60px;
    height: 1px;
    background: #ff173c;
    display: block;
    margin-top: 6px; 
}

.single ul {
    margin-bottom: 0; }
    .single li a {
    font-size: 14px;
    text-transform: uppercase;
    line-height: 40px;
    display: block;
    text-decoration: none; }
    .single li a:hover {
    color: #ff173c; }
    .single li:last-child a {
    border-bottom: 0; 
}   

</style>