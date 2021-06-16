

( function() {
    import Carousel from './vue-carousel.vue'
    const works = window.works;
    var vm = new Vue({
        el: document.querySelector('#mount'),
        mounted: function(){
            console.log("Hello Vue!", this.works);
        },
       // render: h => h(Carousel),
        propsData: { works }
    });
})();