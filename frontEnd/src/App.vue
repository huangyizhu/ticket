<template>
  <div id="app">
    <transition name="bounce">
        <router-view></router-view>
    </transition>
  </div>
</template>

<script>
export default {
    name: 'App'
}
</script>

<style>
    html,
    body{
        height: 100%;
    }

    body{
        margin: 0;
        padding: 0;
    }

    #app{
        height: 100%;
    }

    .bounce-enter-active{
        animation: bounce-in .5s;
    }

    .bounce-leave-active{
        animation: bounce-out .2s;
    }

    @keyframes bounce-in{
        0% {
            transform: scale(0);
        }
        50% {
            transform: scale(1.05);
        }

        100% {
            transform: scale(1);
        }
    }

    @keyframes bounce-out{
        0%{
            transform: scale(1);
        }
        50%{
            transform: scale(0.95);
        }
        100%{
            transform: scale(0);
        }
    }
</style>
