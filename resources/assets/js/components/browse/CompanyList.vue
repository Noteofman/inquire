<template>

<div class="col">
    <!-- Category -->
    <div class="single companies">
        <h3 class="side-title">{{header}}</h3>
        <ul class="list-unstyled">
            <li v-for="item in listItems">
                <a v-on:click='onCompanyClick' :data-category="item.category" v-if title="">{{item.title}}</a>
            </li>   
        </ul>
   </div>
</div> 

</template>

<script>
    
export default {
    props: ['header', 'listItems'],

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
    color: #333;
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
    color: #666;
    font-size: 14px;
    text-transform: uppercase;
    border-bottom: 1px solid #f0f0f0;
    line-height: 40px;
    display: block;
    text-decoration: none; }
    .single li a:hover {
    color: #ff173c; }
    .single li:last-child a {
    border-bottom: 0; 
}   

</style>