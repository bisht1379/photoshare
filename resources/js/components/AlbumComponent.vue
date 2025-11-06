<template>
    <div>
        Album component

            <form action="">
                <div class="form-group">
                    <!-- <label for="">Name of Album</label> -->
                    <input type="text" name="name" class="form-control" maxlength="15">
                </div>

                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" name="name" class="form-control" maxlength="15">
                </div>
                   <div class="form-group">
                    <label for="">Category</label>
                       <select class="form-control" name="category"  id=""> 

                          <option value="">Select Category</option>  
                          <option value="">Select Category</option>  

                       </select> 


                </div>
          <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="name" class="form-control" maxlength="15">
                </div>



	<div class="form-group">
				
				<button class="btn btn-secondary" type="submit">Create Album</button>
			</div>
			



            </form>





    </div>




</template>