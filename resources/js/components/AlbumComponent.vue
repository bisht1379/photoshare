<template>
    <div>
        Album component

            <form action="">
                <div class="form-group">
                    {{ categories }}
                <label for="">Name of Album</label>
                    <input type="text" name="name" v-model="name" class="form-control" maxlength="15">
                </div>

                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" name="description" v-model="description"  class="form-control" maxlength="15">
                </div>
                   <div class="form-group">
                    <label for="">Category</label>
                       <select class="form-control" name="category" v-model="category"    id=""> 

                          <option value="">Select Category</option>  
                          <option value="">Select Category</option>  

                       </select> 


                </div>
          <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control"    maxlength="15">
                </div>



	<div class="form-group">
				
				<button class="btn btn-secondary" type="submit">Create Album</button>
			</div>
			



            </form>





    </div>




</template>
<script type="text/javascript">
export default{
    data()
    {
        return{
            name:'',
            description:'',
            category:'',
            image:'',
            categories:[]

        }
    },
    created()
    {
        this.getCategories()
    },
    methods:{
                getCategories(){
                    axios.get('/api/categories').then((response)=>
                {
                    this.categories=response.data
                }).catch((error)=>{

                    alert('unable to fetch categories')
                })
                }
    }


}


</script>