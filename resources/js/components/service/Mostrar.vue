<template>
    <div class="row">
        <div class="col-12 mb-2">
            <!-- llamamos al componente para Crear   -->
            <router-link :to='{name:"crearService"}' class="btn btn-success"><i class="fas fa-plus-circle"></i></router-link>
        </div>
        <div class="col-12">             
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white">
                            <tr>
                            <th>Name</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="service in services" :key="service.id">
                            <td>{{ service.name }}</td>
                            <td>{{ service.description }}</td>
                            <td>{{ service.price }}</td>
                            <td>{{ service.image }}</td>
                            <td>
                                <!-- llamamos al componente para Editar     -->
                                <router-link :to='{name:"editarService",params:{id:service.id}}' class="btn btn-info"><i class="fas fa-edit"></i></router-link>
                                <a type="button" @click="borrarService(service.id)" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
    name:"services",
    data(){
        return {
            services:[]
        }
    },
    mounted(){
        this.mostrarServices()
    },
    methods:{
        async mostrarServices(){
            await this.axios.get('/api/service').then(response=>{
                this.services = response.data
            }).catch(error=>{
                console.log(error)
                this.services = []
            })
        },
        borrarService(id){
            if(confirm("¿Confirma eliminar el registro?")){
                this.axios.delete(`/api/service/${id}`).then(response=>{
                    this.mostrarServices()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>