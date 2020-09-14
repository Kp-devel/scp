<template>
    <div class="">
        <div class="d-flex pb-4">
            <i class="fa fa-desktop pr-2 fa-lg pt-3 text-green"></i>
            <div>
                <p class="subheader-title mb-0">{{titulo}}</p>
                <p class="mb-0">Cantidad de Regsistros: 1256</p>
            </div>
        </div>
        <!-- <div class="d-flex justify-content-center py-3" v-if="loading">
            <div class="spinner-border text-blue" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <div class="row">
            <div class="col-md-7 ">
               <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="text-center bg-blue text-white">
                            <tr>
                                <td class="align-middle">Respuesta</td>
                                <td class="align-middle">Cuentas</td>
                                <td class="align-middle">Monto</td>
                                <!-- <td class="align-middle bg-gray border-0"></td> -->
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr class="text-center" v-if="llamadas=='' && loading==false">
                                <td colspan="4">No se encontraron datos</td>
                            </tr> -->
                            <tr>
                                <td>Cancelado</td>
                                <td class="text-right">3</td>
                                <td class="text-right">581.75</td>
                                <td class="align-middle text-center bg-gray border-0" >
                                    <input type="checkbox" name="" id="">
                                </td>
                            </tr>
                            <tr>
                                <td>Compromiso</td>
                                <td class="text-right">199</td>
                                <td class="text-right">54,770.00</td>
                                <td class="align-middle text-center bg-gray border-0" >
                                    <input type="checkbox" name="" id="">
                                </td>
                            </tr>
                            <tr>
                                <td>Contacto Familiar</td>
                                <td class="text-right">199</td>
                                <td class="text-right">54,770.00</td>
                                <td class="align-middle text-center bg-gray border-0" >
                                    <input type="checkbox" name="" id="">
                                </td>
                            </tr>
                            <tr>
                                <td>Contacto Tercero</td>
                                <td class="text-right">199</td>
                                <td class="text-right">54,770.00</td>
                                <td class="align-middle text-center bg-gray border-0" >
                                    <input type="checkbox" name="" id="">
                                </td>
                            </tr>
                            <tr>
                                <td>Contacto Titular</td>
                                <td class="text-right">199</td>
                                <td class="text-right">54,770.00</td>
                                <td class="align-middle text-center bg-gray border-0" >
                                    <input type="checkbox" name="" id="">
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                                <tr class="bg-blue text-white">
                                    <td>Total General</td>
                                    <td class="text-right">199</td>
                                    <td class="text-right">54,770.00</td>
                                </tr>
                            </tfoot>
                    </table>
                </div>
            </div>
            <div class="col-md-5">
                <p class="font-weight-bold">Filtros Adicionales</p>
                <table>
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
                this.titulo="Contacto";
            }else{
                this.titulo="No Contacto";
            }
        },
        methods:{
            llamadasActivas(){
                // axios.get("llamarExtension").then(res=>{
                //     if(res.data){
                //         this.llamadas_activas=res.data;
                //     }
                // })
            },
            detalleCliente(){
                window.location.href="cliente/detalle";
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
