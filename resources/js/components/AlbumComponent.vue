<template>
    <div>
        Album component

            <form @submit.prevent="createAlbum" enctype="multipart/form-data">
                <div class="form-group">
                <label for="">Name of Album</label>
                    <input type="text" name="name" v-model="name" class="form-control" maxlength="15">
                </div>

                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" name="description" v-model="description"  class="form-control" maxlength="15">
                </div>
                   <div class="form-group">
                    <label for="">Category</label>
                       <select class="form-control" name="category" v-model="category"  > 
                          <option v-for="(category,index) in categories":key="index":value="category.id" >{{category.name}}</option>  
                       </select> 
                </div>
          <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control"  maxlength="15" v-on:change="onImageChange">
                </div>
	<div class="form-group">
				<button class="btn btn-secondary" type="submit">Create Album</button>
			</div>
            </form>
    </div>
</template>
<script type="text/javascript">
import { error } from 'jquery';

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
                getCategories()
                {
                    axios.get('/api/categories').then((response)=>
                     {
                    this.categories=response.data
                       }).catch((error)=>{
                    alert('unable to fetch categories')
                      })
                },
                    onImageChange(e)
                    {
                        console.log(e)
                        this.image=e.target.files[0];
                    },
                    createAlbum()
                    {
                        const config ={
                            header:{
                                "content-type":"multipart/form-data"
                            }
                        }
                        let formdata= new FormData();
                        formdata.append('image',this.image);
                        formdata.append('name',this.name);
                        formdata.append('description',this.description);
                        formdata.append('category_id',this.category);
                        axios.post('/albums/store',formdata,config).then((
                            response)=>{
                                this.image='',
                                this.name='',
                                this.description='',
                                this.category=''
                             
                        }).catch((error)=>{
                            console.log(error)
                           
                        })


                    },
             
            }


}


</script>