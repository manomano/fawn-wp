

( function() {


    const carousel = Vue.component('Carousel', {
        props:['works'],
        template: '<div class="vue-cont"><div v-for="work in works">' +
            '<div>{{work.post_title}}</div>' +
            '<div>{{work.post_content}}</div>'+
            '<div><figure><img :src="work.image.guid" clas="gal"/></figure></div>'+
            '</div></div>',
        mounted(){
            console.log(this.works, "what is in works");
        }

    })





    const works = window.works;
    var vm = new Vue({
        el: document.querySelector('#mount'),
        data(){
            return {
                works:works
            }
        },
        template: '<div class="parent-div"><Carousel :works="works"/></div>',

        mounted: function(){
            console.log("Hello Vue!", this.works);
        },

    });
})();