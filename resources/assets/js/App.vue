<template>
  <div id="app">
    <app-nav></app-nav>
    <transition name="fade">
      <router-view></router-view>
    </transition>
  </div>
</template>

<script>

import Nav from './components/base/Nav';

export default {
  name: 'app',
  components: {
    'app-nav' : Nav
  }
}
</script>

<style>

@import '/css/app.css';

#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;

}

.fade-enter-active, .fade-leave-active {
  transition-property: opacity;
  transition-duration: .1s;
}

.fade-enter-active {
  transition-delay: .1s;
}

.fade-enter, .fade-leave-active {
  opacity: 0
}
</style>