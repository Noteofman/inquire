<template>

<div class="col">
    <!-- Category -->
    <div class="single companies">
        <h3 class="side-title">{{header}} - {{subcategory}}</h3>
        <ul class="list-unstyled">
            <li v-for="item in listItems">
                <div class="container">
                  <div class="panel panel-default">
                    <div class="panel-heading text-left"><a :data-id="item.id" v-on:click='onCompanyClick' >{{item.title}}</a></div>
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
    
export default {
    props: ['header', 'listItems', 'subcategory'],

    methods: {
        onCompanyClick (event) {
            this.$emit('clicked', event);
        }
    }
}

</script>

<style>

a:hover {
 cursor:pointer;
}

@media screen and (min-width: 500px) {
    .category {
        min-width: 500px;
    }
}

.single {
    padding: 30px 15px;
    margin-top: 40px;
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