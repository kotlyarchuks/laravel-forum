<template>
    <div class="alert alert-success alert-flash" v-show="this.isVisible" role="alert">
        {{this.message}}
    </div>
</template>

<script>
    export default {

        props: ['text'],

        data() {
            return {
                message: "Hello",
                isVisible: false
            }
        },

        created(){
            if(this.text){
                this.message = this.text

                this.isVisible = true
                setTimeout(
                    () => this.isVisible = false
                    , 3000)
                }
        }
    }
</script>

<style>
    .alert-flash {
        position: fixed;
        bottom: 50px;
        right: 50px;
    }
</style>