<template>
    <div>
        This is file copy.
        <button @click.prevent="unzip"> unzip</button>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data(){
            return{

            }
        },
        mounted()
        {

        },
        methods:{
            unzip()
            {
                axios.post('/unzip-file/v1.0', {

                })
                    // .then(response => {})
                    // .catch(e => {
                    //     this.errors.push(e)
                    // })
            }
        }
    }
</script>