<template>
    <div>
        <button class=" ml-4 btn btn-primary" @click="followUser" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {
        props:['userId','follows'],//we intend to pass the user->id to our index file
        mounted() {
            console.log('Component mounted.')
        },
        data:function(){
            return{
                status: this.follows,
            }
        },
        methods: {
            followUser(){
                axios.post('/follow/'+this.userId)  //this is to return data from our db
                .then(response=>{
                    this.status=! this.status;
                    console.log(response.data);
                })
                    .catch(errors=>{//if the user has a 401 error(he is not logged )we redirect him to the login page
                        if (errors.response.status==401) {
                            window.location='/login';
                        }

                    });
            }
        },

        computed: {// when the user click the btn the text switches between follow and unfollow
            buttonText(){
                return (this.status) ?'Unfollow':'Follow';
            }
        }
    }
</script>
