<template>
    <div class="row">
        <div class="col-12 mb-2">
            <!-- llamamos al componente para Crear   -->
            <router-link :to='{name:"crearTechnician"}' class="btn btn-success"><i class="fas fa-plus-circle"></i></router-link>
        </div>
        <div class="col-12">             
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white">
                            <tr>
                            <th>Phone</th>
                            <th>Rating</th>
                            <th>Facebook</th>
                            <th>Twitter</th>
                            <th>Instagram</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="technician in technicians" :key="technician.id">
                            <td>{{ technician.phone }}</td>
                            <td>{{ technician.rating }}</td>
                            <td>{{ technician.facebook }}</td>
                            <td>{{ technician.twitter }}</td>
                            <td>{{ technician.instagram }}</td>
                            <td>
                                <!-- llamamos al componente para Editar     -->
                                <router-link :to='{name:"editarTechnician",params:{id:technician.id}}' class="btn btn-info"><i class="fas fa-edit"></i></router-link>
                                <a type="button" @click="borrarTechnician(technician.id)" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
    name:"technicians",
    data(){
        return {
            technicians:[]
        }
    },
    mounted(){
        this.mostrarTechnicians()
    },
    methods:{
        async mostrarTechnicians(){
            await this.axios.get('/api/technician').then(response=>{
                this.technicians = response.data
            }).catch(error=>{
                console.log(error)
                this.technicians = []
            })
        },
        borrarTechnician(id){
            if(confirm("¿Confirma eliminar el registro?")){
                this.axios.delete(`/api/technician/${id}`).then(response=>{
                    this.mostrarTechnicians()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>