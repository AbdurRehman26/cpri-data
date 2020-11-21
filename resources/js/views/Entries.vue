<template>
    <div>
        <base-header class="pb-6 pb-8 pt-5 pt-md-8">
        </base-header>

        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <entries-form title="Log Entries"></entries-form>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
    
import EntriesForm from './Forms/EntriesForm'


  export default {
    name: 'tables',
    components: {
      EntriesForm
    },
    data(){
        return{
            
        }
    },
    methods: {

    },


  };
</script>
<style></style>
