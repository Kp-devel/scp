<template>
    <div class="">
        <!-- <div class="d-flex justify-content-center py-3" v-if="loading">
            <div class="spinner-border text-blue" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <div class="card bg-white p-3 border-top-blue">
            <div class="row">
                <div class="col-md-5">
                    <p class="font-weight-bold">Datos del Cliente</p>
                    <table width="100%">
                        <tr class=""> 
                            <td class="text-left pr-1">Nombre</td>
                            <td colspan=""><label class="form-control font-12 form-control-sm h-100 font-weight-bold">ZULMA OSCO PICHARDO</label></td>
                            <td class="text-right pr-1">Doc Ide.</td>
                            <td class=""><label class="form-control font-12 form-control-sm h-100 font-weight-bold">123456489</label></td>
                        </tr>
                        <tr class=""> 
                            <td class="text-left pr-1">Dirección</td>
                            <td colspan="4"><label class="form-control font-12 form-control-sm">xxxxxxx</label></td>
                        </tr>
                        <tr class=""> 
                            <td class="text-left pr-1">Referencia</td>
                            <td colspan="4"><label class="form-control font-12 form-control-sm">xxxxxxx</label></td>
                        </tr>
                        <tr class=""> 
                            <td class="text-left pr-1">Barrio</td>
                            <td colspan=""><label class="form-control font-12 form-control-sm h-100">xxxxxxxxxxxx</label></td>
                            <td class="text-right pr-1">Ciudad</td>
                            <td class=""><label class="form-control font-12 form-control-sm h-100">xxx</label></td>
                        </tr>
                        <tr class=""> 
                            <td class="text-left pr-1">Teléfono 1</td>
                            <td colspan=""><label class="form-control font-12 form-control-sm h-100 w-100 font-weight-bold">99999999</label></td>
                            <td class="text-right pr-1 pl-1">Teléfono 2</td>
                            <td class=""><label class="form-control font-12 form-control-sm h-100 w-100 font-weight-bold">99999999</label></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-7">
                   <p class="font-weight-bold">Histórico de Gestiones</p>
                   <table class="table table-hover">
                        <thead class="text-center bg-gray-2">
                            <tr>
                                <td class="align-middle">Fecha Gestión</td>
                                <td class="align-middle">Respuesta</td>
                                <td class="align-middle">Detalle</td>
                            </tr>
                        </thead>
                        <tbody>
                            <td>20/03/2020</td>
                            <td>Contacto con Titular</td>
                            <td>xxx xxxxxxxxxxx xxxxxx xxxxxxx</td>
                        </tbody>
                   </table>
                </div>
                <div class="col-md-12">
                    <hr>
                    <table class="mt-3">
                        <tr>
                            <td class="pr-1">Saldo</td>
                            <td class="pr-5 text-danger"><b>S/493.65</b></td>
                            <td></td>
                            <td class="pr-1">Campaña: </td>
                            <td class="pr-5"><b>202005</b></td>
                            <td class="pr-1">Fecha venc: </td>
                            <td class="pr-5"><b>25/03/2020</b></td>
                            <td class="pr-1">Usuario: </td>
                            <td class="">3317</td>
                        </tr>
                    </table>
                </div>
            </div><hr>
            <div class="row py-2">
                <div class="col-md-12">
                    <table class="mb-3">
                        <tr>
                            <td class="pr-1">Respuesta</td>
                            <td><select class="form-control">
                                    <option value="">Seleccionar</option>
                                    <option value="">Contacto con Titular</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <div class="form-group">
                        <textarea  rows="3" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <a href="" class="btn btn-outline-blue">Guardar</a>
                    <a href="" class="btn btn-outline-blue">Cancelar</a>
                </div>
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
