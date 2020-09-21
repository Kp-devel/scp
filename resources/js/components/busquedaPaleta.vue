<template>
    <div class="">
        <div class="d-flex pb-4">
            <i class="fa fa-desktop pr-2 fa-lg pt-3 text-green"></i>
            <div>
                <p class="subheader-title mb-0">{{titulo}}</p>
                <p class="mb-0">Cantidad de Regsistros: <b>{{cantidad_registros}}</b></p>
            </div>
        </div>
        <!-- <div class="d-flex justify-content-center py-3" v-if="loading">
            <div class="spinner-border text-blue" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <div v-if="viewBusqueda">
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
                                <tr class="text-center" v-if="datos==''">
                                    <td colspan="4">No se encontraron datos</td>
                                </tr>
                                <tr v-for="(item,index) in datos" :key="index">
                                    <td>{{item.respuesta}}</td>
                                    <td class="text-right">{{formatoNumero(item.cuentas?item.cuentas:0,'entero')}}</td>
                                    <td class="text-right">{{formatoNumero(item.deuda?item.deuda:0,'monto')}}</td>
                                    <td class="align-middle text-center bg-gray border-0">
                                        <input type="checkbox" name="" :id="'check'+index" @change="seleccionCheck(index)">
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                    <tr class="bg-blue text-white">
                                        <td>Total General</td>
                                        <td class="text-right">{{rowTotal('cuentas')?formatoNumero(rowTotal('cuentas'),'entero'):0}}</td>
                                        <td class="text-right">{{rowTotal('deuda')?formatoNumero(rowTotal('deuda'),'monto'):'0.00'}}</td>
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
                                <select class="form-control" v-model="busqueda.campana" @change="btnEmpezar=false;cantidad_registros=0">
                                    <option value="">Seleccionar</option>
                                    <option v-for="(item,index) in filtros['campanas']" :key="index" :value="item.id">{{item.descripcion}}</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="pr-2">Zona</td>
                            <td>
                                <select class="form-control" v-model="busqueda.zona" @change="btnEmpezar=false;cantidad_registros=0">
                                    <option value="">Seleccionar</option>
                                    <option v-for="(item,index) in filtros['zonas']" :key="index" :value="item.id">{{item.descripcion}}</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="pr-2">Tramo Deuda</td>
                            <td>
                                <select class="form-control" v-model="busqueda.tramo_deuda" @change="btnEmpezar=false;cantidad_registros=0">
                                    <option value="">Seleccionar</option>
                                    <option v-for="(item,index) in filtros['tramoDeuda']" :key="index" :value="item.id">{{item.descripcion}}</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="pr-2">Tramo Atraso</td>
                            <td>
                                <select class="form-control" v-model="busqueda.tramo_atraso" @change="btnEmpezar=false;cantidad_registros=0">
                                    <option value="">Seleccionar</option>
                                    <option v-for="(item,index) in filtros['tramoAtraso']" :key="index" :value="item.id">{{item.descripcion}}</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row py-2">
                <div class="col-md-12">
                    <div class="alert alert-warning border-left" v-if="mensaje">
                        <p class="mb-0" >{{mensaje}}</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <a href="" class="btn btn-outline-blue waves-effect" @click.prevent="buscar()">
                        <span v-if="loadbuscar" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Buscar
                    </a>
                    <a href="" class="btn btn-outline-blue waves-effect" @click.prevent="limpiar()">Limpiar</a>
                    <a href="" class="btn btn-outline-blue waves-effect" @click.prevent="empezar()" v-if="btnEmpezar">Empezar campaña</a>
                </div>
            </div>
        </div>
        <div v-else>
            <div v-if="loadTrabajo" class="d-flex justify-content-center pt-5">
                <div class="spinner-border text-blue" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <div v-else>
                <operativo :datosCliente="dataTrabajo"/>
            </div>
        </div>
    </div>
</template>

<script>
    import operativo from './operativos';

    export default {
        props:["tipo","datos","filtros"],
        data() {
            return {
                titulo:'',
                cantidad_registros:0,
                cantidad_gestionada:0,
                respuestas:[],
                busqueda:{respuestas:'',campana:'',zona:'',tramo_deuda:'',tramo_atraso:''},
                viewBusqueda:true,
                dataTrabajo:[],
                mensaje:'',
                btnEmpezar:false,
                loadbuscar:false,
                loadTrabajo:false
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
            rowTotal(base) {
                return this.datos.reduce( (sum,cur) => sum+parseFloat(cur[base]) , 0);
            },
            buscar(){
                this.viewBusqueda=true;
                this.btnEmpezar=false;
                this.mensaje='';
                this.cantidad_registros=0;
                this.busqueda.respuestas=this.respuestas.toString();
                if(this.busqueda.respuestas!=''){
                    this.loadbuscar=true;
                    axios.post("buscar/buscarClientes",this.busqueda).then(res=>{
                        if(res.data){
                            this.cantidad_registros=res.data[0].cantidad;
                            this.loadbuscar=false;
                            if(this.cantidad_registros>0){
                                this.btnEmpezar=true;
                            }
                        }
                    })
                }else{
                    this.mensaje="Selecciona al menos una respuesta";
                }
            },
            seleccionCheck(index){
                this.btnEmpezar=false;
                this.cantidad_registros=0;
                if( $('#check'+index).prop('checked') ) {
                    this.respuestas.push(this.datos[index].cod_respuesta);
                    // this.cantidad_registros+=parseInt(this.datos[index].cuentas);
                    // console.log(this.respuestas);
                }else{
                    for(var i=0;i<this.respuestas.length;i++){
                        if(this.respuestas[i]==this.datos[index].cod_respuesta){
                            this.respuestas.splice(i,1);
                            // this.cantidad_registros-=parseInt(this.datos[index].cuentas);
                        }
                    }
                }
            },
            empezar(){
                this.dataTrabajo=[];
                this.viewBusqueda=false;
                this.loadTrabajo=true;
                if(this.cantidad_registros>0){
                    axios.post("buscar/dataCliente",this.busqueda).then(res=>{
                        if(res.data){
                            this.dataTrabajo=res.data
                            this.loadTrabajo=false;
                           // this.cantidad_gestionada=this.dataTrabajo.length;
                        }else{
                            this.viewBusqueda=true;
                            this.mensaje="Existen cLientes que ya han sido gestionados el día de hoy";
                            this.limpiar();
                        }
                    })
                }
            },
            limpiar(){
                this.respuestas=[];
                this.busqueda.respuestas='';
                this.busqueda.campana='';
                this.busqueda.zona='';
                this.busqueda.tramo_deuda='';
                this.busqueda.tramo_atraso='';
                this.cantidad_registros=0;
                this.btnEmpezar=false;
                $('input[type="checkbox"]').prop('checked', false); 
            },
            formatoNumero(nStr,tipo){
                if(tipo=='monto'){
                    var nStr=parseFloat(nStr).toFixed(2);
                }
                nStr += '';
                var x = nStr.split('.');
                var x1 = x[0];
                var x2 = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1)) {
                        x1 = x1.replace(rgx, '$1' + ',' + '$2');
                }
                return x1 + x2
            },

        },
        mounted(){
            this.$root.$on('listaTrabajo', () => {
                this.empezar();
            });
        },
        components:{
            operativo            
        }
    }
</script>
