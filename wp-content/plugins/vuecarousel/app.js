(function () {


    const carousel = Vue.component('Carousel', {
        props: ['works'],
        data() {
            return {
                items: [],
                leftPosition: '0',
                page: 1,
                pages: 0,
                stepWidth: 0,
                isFirstUpdate: true,
                isRightArrow: true,
                initialTranslate: '',
                leftIndex: 0,
                rightIndex: 0,
                xPosition: 0,
                isVisible: true,
                transition:0.8

            }
        },

        template: '<div class="vue-cont"  @mouseover="detectArrow"   :class="[isRightArrow ? \'cursor_right\' : \'cursor_left\',]"  @click="clickHandler">' +

            '<div class="gallery-container"  v-show="isVisible" name="list-complete"  :style="{transform: `translate3d(${xPosition}rem, 0px, 0px)`, transition: `all  ${transition}s ease 0s`}">' +
            '<div class="work list-complete-item" v-for="(work, index) in items" :key="index+\'_\'+work.ID"  :class="[\'dada_\'+work.ID]">' +
            '<div class="work-background" v-bind:style="{backgroundImage: \'url(\' + work.image.guid + \')\' }">' +
            '<div class="work-label"><span>{{work.ID}}</span></div>' +
            '</div>' +
            '<div class="work-title">{{work.post_title}}</div>' +
            '<div class="work-content">{{smallText(work.post_content)}}</div>' +
            '</div>' +
            '</div>' +
            '</div>',

        mounted() {

            const rest = this.works.length;
            this.pages = (this.works.length - rest) / 3 + rest > 0 ? 1 : 0;
            this.stepWidth = this.converter(screen.width * 0.33);
            const left = this.works.slice(0, Math.ceil(this.works.length / 2));
            const right = this.works.slice(Math.floor(this.works.length / 2), this.works.length);
            this.items = right.concat([...this.works]).concat(left);
            this.xPosition = this.stepWidth * Math.ceil(this.works.length / 2) * -1;


            this.leftIndex = this.works.length - right.length;
            this.rightIndex = left.length - 1;

        },
        computed: {},
        watch: {
            isVisible: function (val) {

                //console.log("isVisible",val)
                this.transition = 0;
                this.xPosition = this.stepWidth;

            },
        },
        methods: {

            detectArrow(event) {
                if (event.clientX > screen.width / 2) {
                    this.isRightArrow = true;
                } else {
                    this.isRightArrow = false;
                }

            },
            converter: (x) => x / 16,
            backgroundStyle(imageUrl) {
                return {
                    background: 'url(' + imageUrl + ')'
                }
            },
            smallText(text) {
                return text.split(" ").slice(0, 10).join(" ") + "..."
            },
            clickHandler(event) {

                this.page += 1;
                if (this.isRightArrow) {
                    this.items.shift();
                    this.leftIndex = this.leftIndex === this.works.length - 1 ? 0 : this.leftIndex + 1;
                    this.rightIndex = this.leftIndex === this.works.length - 1 ? 0 : this.rightIndex + 1;
                    this.items.push(this.works[this.leftIndex]);
                    const initialPos = this.stepWidth * Math.ceil(this.works.length / 2) * -1;
                    console.log("xPosition: ",this.xPosition, " stepWidth:", this.stepWidth, "threshold", this.stepWidth * 4  );
                    if(Math.abs(this.xPosition) === this.stepWidth * 4){
                        console.log("the moment");
                        this.isVisible = false;

                        this.$nextTick( () => {
                            console.log("tick");
                            this.transition = 0.8;
                            this.xPosition = initialPos;
                            this.$nextTick( () => {
                                this.isVisible = true;
                            });
                        });

                    }else{
                        this.xPosition = this.xPosition - this.stepWidth;
                        this.transition = 0.8;
                    }


                } else {
                    this.items.pop();
                    this.rightIndex = this.rightIndex === 0 ? this.works.length - 1 : this.rightIndex - 1;
                    this.leftIndex = this.leftIndex === this.works.length - 1 ? 0 : this.leftIndex + 1;
                    this.items.splice(0, 0, this.works[this.rightIndex]);
                    this.xPosition = this.xPosition + this.stepWidth;
                }

                //console.log(this.isRightArrow ? "right Click" : "left CLick");
                //console.log("leftIndex: ", this.leftIndex, " rightIndex:", this.rightIndex);


            }
        }

    })


    const works = window.works;
    var vm = new Vue({
        el: document.querySelector('#mount'),
        data() {
            return {
                works: works
            }
        },
        template: '<div class="parent-div"><Carousel :works="works"/></div>',

        mounted: function () {
            console.log("Hello Vue!", this.works);
        },

    });
})();