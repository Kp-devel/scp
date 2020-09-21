<template>
    <div class="">
        <div class="card bg-white p-3 border-top-blue">
            <div class="row">
                <div class="col-md-12">
                    <p class="font-weight-bold">Datos del Cliente</p>
                    <div class="table-responsive">
                        <table width="100%" v-for="(item,index) in datosCliente['cliente']" :key="index">
                                <tr class=""> 
                                    <td class="text-left ">Cedente</td>
                                    <td colspan=""><label class="form-control font-12 form-control-sm h-100 font-weight-bold">{{formatoVacio(item.cedente)}}</label></td>
                                    <td class="text-right ">Num. Doc.</td>
                                    <td class=""><label class="form-control font-12 form-control-sm h-100 font-weight-bold">{{formatoVacio(item.documento)}}</label></td>
                                    <td class="text-right pr-1">Tipo Doc.</td>
                                    <td class=""><label class="form-control font-12 form-control-sm h-100 font-weight-bold">{{formatoVacio(item.tipo_documento)}}</label></td>
                                </tr>
                            
                            
                                <tr class=""> 
                                    <td class="text-left ">Nombres</td>
                                    <td colspan="3"><label class="form-control font-12 form-control-sm h-100">{{formatoVacio(item.nombres)}}</label></td>
                                </tr>
                            
                            
                            <tr class=""> 
                                <td class="text-left ">Oficina</td>
                                <td ><label class="form-control font-12 form-control-sm h-100">{{formatoVacio(item.oficina)}}</label></td>
                                <td class="text-right ">Tramo</td>
                                <td class=""><label class="form-control font-12 form-control-sm h-100 w-100">{{formatoVacio(item.tramo)}}</label></td>
                                <td class="text-right ">Grupo</td>
                                <td class=""><label class="form-control font-12 form-control-sm h-100 ">{{formatoVacio(item.grupo)}}</label></td>
                                <td class="text-right ">Zona</td>
                                <td class=""><label class="form-control font-12 form-control-sm h-100 ">{{formatoVacio(item.zona)}}</label></td>
                            </tr>
                            <tr class=""> 
                                <td class="text-left">Dirección</td>
                                <td colspan="3"><label class="form-control font-12 form-control-sm h-100">{{formatoVacio(item.direccion)}}</label></td>
                                <td class="text-right">Distrito</td>
                                <td class=""><label class="form-control font-12 form-control-sm h-100 w-100">{{formatoVacio(item.distrito)}}</label></td>
                            </tr>
                            <tr class=""> 
                                <td class="text-left ">Teléfonos</td>
                                <td>
                                    <select class="form-control form-control-sm" v-model="gestion.telefono">
                                        <option v-for="(tel,indextel) in datosCliente['telefonos']" :key="indextel" :value="tel.telefono">{{tel.telefono}}</option>
                                    </select>
                                </td>

                                <td class="text-right pr-1">Provincia</td>
                                <td class=""><label class="form-control font-12 form-control-sm h-100">{{formatoVacio(item.provincia)}}</label></td>
                                <td class="text-right pr-1">Dpto. </td>
                                <td colspan="2"><label class="form-control font-12 form-control-sm h-100">{{formatoVacio(item.departamento)}}</label></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-12">
                    <br>
                    <p class="font-weight-bold">Operaciones</p>
                   <div class="table-responsive">
                       <table class="table table-hover">
                            <thead class="text-center bg-blue text-white">
                                <tr>
                                    <td class="align-middle">Producto</td>
                                    <td class="align-middle">Nro Cuenta</td>
                                    <td class="align-middle">Fecha Venc.</td>
                                    <td class="align-middle">Moneda</td>
                                    <td class="align-middle">Capital</td>
                                    <td class="align-middle">Interes</td>
                                    <td class="align-middle">Honorario</td>
                                    <td class="align-middle">Gast. Exc.</td>
                                    <td class="align-middle">Otros</td>
                                    <td class="align-middle">Total Deuda</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="datosCliente['cuentas']==''">
                                    <td colspan="10" class="text-center">No existen registros asociados al cliente</td>
                                </tr>
                                <tr v-for="(item,index) in datosCliente['cuentas']" :key="index" v-else>
                                    <td>{{item.producto}}</td>
                                    <td>{{item.num_cuenta}}</td>
                                    <td>{{item.fecha_venc}}</td>
                                    <td>{{item.moneda}}</td>
                                    <td>{{item.capital}}</td>
                                    <td>{{item.interes}}</td>
                                    <td>{{item.honorarios}}</td>
                                    <td>{{item.gasto_exc}}</td>
                                    <td>{{item.otros}}</td>
                                    <td>{{item.deuda}}</td>
                                </tr>
                            </tbody>
                       </table>
                   </div>
                </div>
                <div class="col-md-12">
                    <p class="font-weight-bold">Historial de Gestión</p>
                   <div class="table-responsive">
                       <table class="table table-hover">
                            <thead class="text-center bg-blue text-white">
                                <tr>
                                    <td class="align-middle">Usuario</td>
                                    <td class="align-middle">Telef.</td>
                                    <td class="align-middle">Fecha Ges.</td>
                                    <td class="align-middle">Fecha Comp.</td>
                                    <td class="align-middle">Respuesta</td>
                                    <td class="align-middle">Observaciones</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="datosCliente['gestiones']==''">
                                    <td colspan="6" class="text-center">No existen registros asociados al cliente</td>
                                </tr>
                                <tr v-for="(item,index) in datosCliente['gestiones']" :key="index" v-else>
                                    <td>{{item.usuario}}</td>
                                    <td>{{item.telefono}}</td>
                                    <td>{{item.fecha_gestion}}</td>
                                    <td>{{item.fecha_compromiso}}</td>
                                    <td>{{item.respuesta}}</td>
                                    <td>{{item.observacion}}</td>
                                </tr>
                            </tbody>
                       </table>
                   </div>
                </div>
            </div><hr>
            <div class="row py-2">
                <div class="col-md-12">
                    <p class="font-weight-bold">Ingreso de Gestión</p>
                    <div class="table-responsive">
                        <table class="mb-3">
                            <tr>
                                <td class="pr-1">Respuesta</td>
                                <td><select class="form-control" v-model="gestion.respuesta">
                                        <option value="">Seleccionar</option>
                                        <option v-for="(item,index) in respuestas" :key="index" :value="item.cod_respuesta">{{item.respuesta}}</option>
                                    </select>
                                </td>
                                <td> </td>
                                <td class="pr-1">Fecha</td>
                                <td><input type="date" class="form-control" v-model="gestion.fecha_comp"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-group">
                        <textarea  rows="3" class="form-control" v-model="gestion.observacion"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="alert alert-warning" v-if="errorsDatos!=''">
                        <p class="mb-0">Corriga el(los) siguiente(s) error(es):</p>
                        <ul class="text-left"><li v-for="(error,index) in errorsDatos" :key="index" >{{ error }}</li></ul>
                    </div>
                </div>
                <div class="col-md-12">
                    <a href="" class="btn btn-outline-blue" @click.prevent="registrar()">Guardar</a>
                    <a href="" class="btn btn-outline-blue">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    // import vuePaginate from '../../../../node_modules/vue-paginate';

    export default {
        props:["datosCliente"],
        data() {
            return {
                respuestas:[],
                gestion:{id:this.datosCliente['cliente'][0].id,telefono:'',respuesta:'',observacion:'',fecha_comp:''},
                errorsDatos:[]
            }
        },
        created(){
            this.listarespuestas();
        },
        methods:{
            listarespuestas(){
                axios.get("lista/respuestas").then(res=>{
                    if(res.data){
                        this.respuestas=res.data;
                    }
                })
            },
            validar(){
                this.errorsDatos=[];
                if(!this.gestion.telefono){
                    this.errorsDatos.push("Selecciona un número de teléfono");
                }
                if(!this.gestion.respuesta){
                    this.errorsDatos.push("Selecciona una respuesta");
                }
                if(!this.gestion.observacion){
                    this.errorsDatos.push("Escriba un detalle de gestión");
                }
            },
            registrar(){
                this.errorsDatos=[];
                this.validar();
                if(this.errorsDatos.length==0){
                    //this.gestion.id=this.datosCliente['cliente'].id;
                    axios.post("insertar/insertGestion",this.gestion).then(res=>{
                        if(res.data=="ok"){
                            this.$root.$emit('listaTrabajo');
                            $('html, body').animate({scrollTop:0}, 'slow');
                        }
                    })
                }
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
