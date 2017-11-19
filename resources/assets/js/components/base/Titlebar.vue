<template>

<div>
     <div class="container">
        <div class="row">
            <div class="col">
                <div id='title-text' class="pull-left"> <h2>{{title}} </h2></div>
            </div>
        </div>
    </div>
    <div id="titlebar">
    </div>
</div>

</template>

<script>

export default {
	
	name: 'titlebar',

	props: ['title']
}

</script>

<style type="text/css">

#titlebar {
    border-bottom: solid black 2px;
    width:82%;
    opacity: 0.15;
}

#title-text {
    margin-left:25px;
}

</style>