<template>
    <div class="row">
        <div class="col-12 mb-2">
            <!-- llamamos al componente para Crear   -->
            <router-link :to='{name:"crearCategory"}' class="btn btn-success"><i class="fas fa-plus-circle"></i></router-link>
        </div>
        <div class="col-12">             
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Name</th>
                                    <th>Descripcion</th>
                                    <th>Imagen</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="category in categories" :key="category.id">
                                    <td>{{ category.name }}</td>
                                    <td>{{ category.description }}</td>
                                    <td>{{ category.image }}</td>
                                    <td>
                                        <!-- llamamos al componente para Editar     -->
                                        <router-link :to='{name:"editarCategory",params:{id:category.id}}' class="btn btn-info"><i class="fas fa-edit"></i></router-link>
                                        <a type="button" @click="borrarCategory(category.id)" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>                          
        </div>
    </div>
</template>

<script>
export default {
    name:"categories",
    data(){
        return {
            categories:[]
        }
    },
    mounted(){
        this.mostrarCategories()
    },
    methods:{
        async mostrarCategories(){
            await this.axios.get('/api/category').then(response=>{
                this.categories = response.data
            }).catch(error=>{
                console.log(error)
                this.categories = []
            })
        },
        borrarCategory(id){
            if(confirm("¿Confirma eliminar el registro?")){
                this.axios.delete(`/api/category/${id}`).then(response=>{
                    this.mostrarCategories()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>