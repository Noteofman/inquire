<template>

<div id="side-list">
    <div class="col-md-5">
        <!-- Category -->
        <div class="single category">
            <h3 class="side-title">{{header}}</h3>
            <ul class="list-unstyled">
                <li v-for="item in listItems">
                    <a v-on:click='onCategoryClick' :data-category="item.category" v-if title="">{{item.category}} <span class="pull-right">{{item.count}}</span></a>
                </li>   
            </ul>
       </div>
    </div>
    <div class="col-md-4 col-md-offset-1">
        <div id='arrow-area'>
           <img id="arrow" width='300px' src="/img/arrow.svg">
           <h3> Select a category and see whats about!</h3>
        </div>
    </div> 
</div>

</template>

<script>
    
export default {
    props: ['header', 'listItems'],

    methods: {
        onCategoryClick (event) {
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

#arrow {
}

#arrow-area{
    margin-top:25px;
    margin-left:35px;
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