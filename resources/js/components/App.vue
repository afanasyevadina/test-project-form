<template>
    <div>
        <Form v-if="route === 'form'"/>
        <Messages v-else />
        <div class="fixed-bottom pb-4 px-4 bottom-btn">
            <a href="#" @click.prevent="route = 'messages'" class="btn btn-primary btn-lg" v-if="route === 'form'">View previous messages</a>
            <a href="#" @click.prevent="route = 'form'" class="btn btn-success btn-lg" v-else>Send new message</a>
        </div>
    </div>
</template>

<script>
import Form from "./FormView"
import Messages from "./MessagesView";
export default {
    components: {Form, Messages},
    data() {
        return {
            route: 'form'
        }
    },
    watch: {
        route: function () {
            location.hash = '#' + this.route
        }
    },
    mounted() {
        let hash = location.hash.replaceAll('#', '')
        if(['form', 'messages'].includes(hash)) this.route = hash
    }
}
</script>


<style>
@keyframes blick-slide {
    0% {
        left: 0;
    }
    70% {
        left: 120%;
    }
    100% {
        left: 120%;
    }
}
@keyframes rotate {
    100% {
        transform: rotate(360deg);
    }
}
.btn-loading {
    position: relative;
    overflow: hidden;
    pointer-events: none;
}
.btn-loading:after {
    content: '';
    position: absolute;
    top: 0;
    height: 100%;
    width: 20%;
    background: #fff;
    opacity: .5;
    transform: skewX(-30deg);
    animation: blick-slide 1.7s ease infinite;
}
.loader {
    margin: 1.5rem auto;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    border: 5px solid #9c9c9c;
    border-top-color: transparent;
    animation: rotate 1s linear infinite;
}
.fade-50 {
    opacity: .5;
}
.bottom-btn {
    left: unset;
}
</style>
