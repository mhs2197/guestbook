<template>
    <div>
       <div class="row">
           <div class="input-field col s12">
               <div class="file-field input-field">
                   <div class="btn whiteblack-text">
                       <span>Choose Zip File</span>
                       <input type="file" accept=".zip" @change="fileInput">
                   </div>
                   <div class="file-path-wrapper">
                       <input class="file-path validate" type="text" id="zip-file" placeholder="zip file only">
                       <label for="zip-file" style="left: auto;"></label>
                   </div>
               </div>
           </div>
       </div>
        <div class="row ">
            <div class="col s12">
                <button class="btn waves-effect waves-light bluish-back mob-btn" @click.prevent="uploadZip()"> Save  </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                zipFile:'',
            }
        },
        mounted()
        {

        },
        methods: {

            fileInput(event)
            {
                console.log(event);
                let instance = this;
                if(!event.target.files.length > 0) {
                    this.zipFile ='';
                    return;
                }
                else {
                    var file = event.target.files[0];
                    let reader = new FileReader();
                    let instance = this;
                    reader.onload = (e) => {
                        console.log(e);
                        instance.zipFile = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            },
            uploadZip()
            {
                axios.post('/zipUploadToS3', {
                    zip_file: this.zipFile,
                })
                    .then(function (response) {

                    })
                    .catch(({response}) => {

                    })
            },
        }
    }
</script>
