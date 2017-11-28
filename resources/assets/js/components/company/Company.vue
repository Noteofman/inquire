<template>

<div id="company-profile">
    <div v-if='info' class="container">
        <div class="row">
            <div class="col">
             <div class="well profile">
                <div class="col-sm-12">
                    <div class="col-xs-12 col-sm-8">
                        <h2>{{info.title}}</h2>
                        <read-more id='body' more-str="Read more" :text="info.body" link="#" less-str="Read less" :max-chars="400"></read-more>
                        <p><strong>Hobbies: </strong> Read, out with friends, listen to music, draw and learn new things. </p>
                        <p><strong>Skills: </strong>
                            <span class="tags">html5</span> 
                            <span class="tags">css3</span>
                            <span class="tags">jquery</span>
                            <span class="tags">bootstrap3</span>
                        </p>
                    </div>             
                    <div class="col-xs-12 col-sm-4 text-center">
                        <figure>
                            <div class="panel panel-default">
                                <div class="panel-heading text-left"><h4><strong>Contact Information</strong></h4></div>
                                <div class="panel-body">
                                    <span v-if='info.telephone' class="contact-item">
                                        <i class="fa fa-phone"></i>
                                        <strong>{{info.telephone}}</strong>
                                    </span> <br>
                                    <span v-if='info.email_address' class="contact-item">
                                        <i class="fa fa-envelope"></i>
                                        <strong>{{info.email_address}}</strong>
                                    </span> <br>
                                    <div id="social">
                                        <a v-bind:href='info.facebook' v-if='info.facebook'><i class="fa fa-facebook-square fa-3x"></i></a>    
                                        <a v-bind:href='info.twitter' v-if='info.twitter'><i class="fa fa-twitter-square fa-3x"></i></a>    
                                        <a v-bind:href='info.instagram 'v-if='info.instagram'><i class="fa fa-instagram fa-3x"></i></a>    
                                    </div>
                                </div>
                              </div>
                            <figcaption class="ratings">
                                <p>Ratings
                                <a href="#">
                                    <span class="fa fa-star"></span>
                                </a>
                                <a href="#">
                                    <span class="fa fa-star"></span>
                                </a>
                                <a href="#">
                                    <span class="fa fa-star"></span>
                                </a>
                                <a href="#">
                                    <span class="fa fa-star"></span>
                                </a>
                                <a href="#">
                                     <span class="fa fa-star-o"></span>
                                </a> 
                                </p>
                            </figcaption>
                        </figure>
                    </div>
                </div>            
                <div class="col-xs-12 divider text-center">
                    <div class="col-xs-12 col-sm-4 emphasis">
                        <h3><strong> {{info.name}} </strong></h3>                    
                    </div>
                    <div class="col-xs-12 col-sm-4 emphasis">
                        <h3><strong>{{info.business_sub_category}}</strong></h3>                    
                    </div>
                    <div class="col-xs-12 col-sm-4 emphasis">
                        <a v-if='url' v-bind:href='url'><h3><strong><a> <i class="fa fa-sign-out"></i>Visit Site</a></strong></h3></a>
                    </div>
                </div>
             </div>                 
            </div>
            <gmap-map v-if='info.latitude'
              :center="{lat:info.latitude, lng: info.longitude}"
              :zoom="15"
              map-type-id="terrain"
              style="width: 600px; height: 300px"
            >
            <gmap-marker
              :position="{lat:info.latitude, lng: info.longitude}"
              :clickable="true"
              :draggable="true"
            ></gmap-marker>    
            </gmap-map>
        </div>
    </div>
</div>

</template>

<script>

import 'readmore-js';

export default {
    props: ['id'],

    data() {
        return {
            info: null
        }
    },

    created() {
      axios.get('/api/companies/' + this.id)
        .then(response => {
          this.loading = false;
          this.info = response.data;
        })
        .catch(error => {
          this.loading = false;
          console.log(error);
      });  
    },

    computed: {
        url() {
            var url = this.info.web_address;
            if (!url) {
                return false;
            }
            if (url.indexOf("http://") != 0 && url.indexOf("https://") != 0) {
               url = 'http://' + url;
            }
            return url;
        }
    }
}

</script>

<style scoped>

#body {
    text-align: left;
}

.vue-map-container {
    width: unset !important;
}

#social {
    margin-top:10px;
}

.contact-item {
    text-align: left;
    float:left;
}

#company-profile {
    margin-top:100px;
}

p{
    text-align: left;
}

a {
    color: #026297;
    cursor: pointer;
}

@import url(http://fonts.googleapis.com/css?family=Lato:400,700);
body
{
    font-family: 'Lato', 'sans-serif';
    }
.profile 
{
    min-height: 355px;
    display: inline-block;
    }
figcaption.ratings
{
    margin-top:20px;
    }
figcaption.ratings a
{
    color:#f1c40f;
    font-size:11px;
    }
figcaption.ratings a:hover
{
    color:#f39c12;
    text-decoration:none;
    }
.divider 
{
    border-top:1px solid rgba(0,0,0,0.1);
    }
.emphasis 
{
    border-top: 4px solid transparent;
    }
.emphasis:hover 
{
    border-top: 4px solid #1abc9c;
    }
.emphasis h2
{
    margin-bottom:0;
    }
span.tags 
{
    background: #1abc9c;
    border-radius: 2px;
    color: #f5f5f5;
    font-weight: bold;
    padding: 2px 4px;
    }
.dropdown-menu 
{
    background-color: #34495e;    
    box-shadow: none;
    -webkit-box-shadow: none;
    width: 250px;
    margin-left: -125px;
    left: 50%;
    }
.dropdown-menu .divider 
{
    background:none;    
    }
.dropdown-menu>li>a
{
    color:#f5f5f5;
    }
.dropup .dropdown-menu 
{
    margin-bottom:10px;
    }
.dropup .dropdown-menu:before 
{
    content: "";
    border-top: 10px solid #34495e;
    border-right: 10px solid transparent;
    border-left: 10px solid transparent;
    position: absolute;
    bottom: -10px;
    left: 50%;
    margin-left: -10px;
    z-index: 10;
    }
    
</style>