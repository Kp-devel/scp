<template>
    <div class="">
        <div class="d-flex pb-4">
            <i class="fa fa-desktop pr-2 fa-lg pt-3 text-green"></i>
            <div>
                <p class="subheader-title mb-0">Compromisos {{titulo}}</p>
                <p class="mb-0">Cantidad de Regsistros: 1256</p>
            </div>
        </div>
        <!-- <div class="d-flex justify-content-center py-3" v-if="loading">
            <div class="spinner-border text-blue" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <div class="row">
            <div class="col-md-5">
                <table class="mb-3">
                    <tr>
                        <td class="pr-2">Campaña</td>
                        <td>
                            <select class="form-control">
                                <option value="">opcion1</option>
                                <option value="">opcion2</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="pr-2">Zona</td>
                        <td>
                            <select class="form-control">
                                <option value="">opcion1</option>
                                <option value="">opcion2</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="pr-2">Tramo Deuda</td>
                        <td>
                            <select class="form-control">
                                <option value="">opcion1</option>
                                <option value="">opcion2</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="pr-2">Tramo Atraso</td>
                        <td>
                            <select class="form-control">
                                <option value="">opcion1111111</option>
                                <option value="">opcion2</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-12">
                <a href="" class="btn btn-outline-blue" @click.prevent="detalleCliente()">Buscar</a>
                <a href="" class="btn btn-outline-blue">Limpiar</a>
            </div>
        </div>
    </div>
</template>

<script>
    // import vuePaginate from '../../../../node_modules/vue-paginate';

    export default {
        props:["tipo"],
        data() {
            return {
                titulo:''
            }
        },
        created(){
            if(this.tipo==1){
                this.titulo="Caídos";
            }else{
                this.titulo="Pendientes";
            }
        },
        methods:{
            detalleCliente(){
                window.location.href="cliente/detalle";
            },
            llamadasActivas(){
                // axios.get("llamarExtension").then(res=>{
                //     if(res.data){
                //         this.llamadas_activas=res.data;
                //     }
                // })
            },
            
            formatoVacio(item){
                if(item==null || item=="" ){
                    return "-";
                }else{
                    return item;
                }
            }
        },
        components:{
            
        }
    }
</script>
