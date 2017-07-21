<template>
    <!--<button class="btn btn-xs" :class="{'btn-success': enabled, 'btn-danger': !enabled }" v-on:click="toggleState" style="width:70px;">
        <span v-if="enabled"> <i class="fa fa-check">&nbsp;</i>Enabled</span>
        <span v-else> <i class="fa fa-times">&nbsp;</i>Disabled</span>
    </button>-->
    <span>
        <input type="hidden" name="published" :value="data_published">
        <input type="hidden" name="published_twitter" :value="data_published_twitter">
        <input type="hidden" name="published_facebook" :value="data_published_facebook">

        <button class="btn" :class="{'btn-success' : data_published, 'btn-default' : !data_published}" v-on:click="toggleState($event)">
            <i class="fa" :class="{'fa-check' : data_published, 'fa-times' : !data_published}"></i>
            Web
        </button>

        <button class="btn" :class="{'btn-info' : data_published_twitter, 'btn-default' : !data_published_twitter}" v-on:click="toggleStateTwitter($event)">
            <i class="fa" :class="{'fa-twitter' : data_published_twitter, 'fa-times' : !data_published_twitter}"></i>
            Twitter
        </button>

        <button class="btn" :class="{'btn-primary' : data_published_facebook, 'btn-default' : !data_published_facebook}"  v-on:click="toggleStateFacebook($event)">
            <i class="fa" :class="{'fa-facebook' : data_published_facebook, 'fa-times' : !data_published_facebook}"></i>
            Facebook
        </button>
    </span>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.');
            this.data_published = this.published;
            this.data_published_facebook = this.published_facebook;
            this.data_published_twitter = this.published_twitter;
        },
        data(){
            return {
                data_published: false,
                data_published_facebook: false,
                data_published_twitter: false,
            }
        },
        props: ['published', 'published_facebook', 'published_twitter'],
        methods: {
            'toggleState': function(event){
                event.preventDefault();
                /*if(this.published_facebook || this.published_twitter){
                    this.data_published = true;
                } else{
                    this.data_published = !this.data_published;
                }*/
                if(!this.published){
                    this.data_published = !this.data_published;
                }

            },

            'toggleStateFacebook': function(event){
                event.preventDefault();
                if(!this.published_facebook){
                    this.data_published_facebook = !this.data_published_facebook;
                }

                /*if(this.data_published_facebook){
                    this.data_published = true;
                }*/
            },

            'toggleStateTwitter': function(event){
                event.preventDefault();

                if(!this.published_twitter){
                    this.data_published_twitter = !this.data_published_twitter;
                }

                /*if(this.data_published_twitter){
                    this.data_published = true;
                }*/
            }
        }
    }
</script>
