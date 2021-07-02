<template>
    <div class="column justify-content-center mw-80">
        <h1>Lista de produtos</h1>
        <button type="button" class="btn btn-primary" v-on:click="openCreateModal()">
            Cadastrar produto
        </button>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Marca</th>
                <th scope="col">Preço</th>
                <th scope="col">Estoque</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in localItems" :key="item.id">
                    <td>{{item.id}}</td>
                    <td>{{item.name}}</td>
                    <td>{{item.brand}}</td>
                    <td>R$ {{item.price}}</td>
                    <td> <a href="#" v-on:click="changeStock(item, '-')">➖</a> {{item.stock}} <a href="#" v-on:click="changeStock(item, '+')">➕</a></td>
                    <td><a href="#" v-on:click="deleteProduct(item)">❌</a> <a href="#" v-on:click="openEditModal(item)">✏️</a> </td>
                </tr>
            </tbody>
        </table>

        <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="cadastrarProdutoModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 v-if="createModal" class="modal-title">Criar novo produto</h5>
        <h5 v-if="editModal" class="modal-title">Editar produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form>
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" v-model="editItem.name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Digite um nome" required>
                <small id="nameHelp" class="form-text text-muted">Nome descritivo de um produto</small>
            </div>

            <div class="form-group">
                <label for="brand">Marca</label>
                <input type="text" v-model="editItem.brand" class="form-control" id="brand" aria-describedby="brandHelp" placeholder="Digite uma marca" required>
                <small id="brandHelp" class="form-text text-muted">Marca do produto</small>
            </div>

            <div class="form-group">
                <label for="stock">Estoque</label>
                <input type="number" v-model="editItem.stock" class="form-control" id="stock" aria-describedby="stockHelp" placeholder="Digite quantidade Estoque" required>
                <small id="stockHelp" class="form-text text-muted">Estoque do produto</small>
            </div>

            <div class="form-group">
                <label for="price">Preço</label>
                <input type="number" v-on:blur="adjustPrice()" min="0" v-model="editItem.price" step=".01" class="form-control" id="price" aria-describedby="priceHelp" placeholder="Digite o preço" required>
                <small id="priceHelp" class="form-text text-muted">Preço do produto</small>
            </div>


        </form>
      </div>
      <div class="modal-footer">
        <button type="button" v-on:click="cleanModal()" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" v-on:click="submitForm()" class="btn btn-primary">Salvar</button>
      </div>
    </div>
  </div>
</div>


    </div>
</template>

<script>
export default {
    props:{
        items: []
    },
    data: function () {
        return{
            localItems: [],
            editItem: new Object,
            editModal: false,
            createModal: false
        }
    },
    mounted() {
        this.localItems = this.items;
    },
    watch:{
        items:{
            deep:true,
            handler: function(newValue){
                this.localItems = newValue;
            }
        }
    },
    methods:{
        adjustPrice(){
            this.editItem.price = this.editItem.price != undefined ? parseFloat(this.editItem.price).toFixed(2) : 0;
        },
        cleanModal(){
            this.editItem = new Object;
        },
        deleteProduct(item){
            axios.delete('products/'+item.id).then(e=>{
                let index = this.items.indexOf(item);
                this.items.splice(index, 1);
            }).catch(()=>{
                console.log('error');
            });
        },
        updateProduct(item){
            axios.put('products/'+item.id, item).then(e=>{
                if(this.editModal){
                    this.closeModal();
                }
            }).catch(()=>{
                console.log('error');
            });
        },
        changeStock(item, type){
            let index = this.items.indexOf(item);
            switch (type) {
                case '-':
                    this.items[index].stock--;
                    break;
                case '+':
                    this.items[index].stock++;
                    break
                default:
                    break;
            }
            this.updateProduct(this.items[index]);
        },
        createProduct(){
            let request = this.editItem;
            axios.post('products', request).then(e=>{
                this.items.push(e.data);
                this.closeModal();
            }).catch(()=>{

            });
        },
        submitForm(){
            if(this.editModal){
                this.updateProduct(this.editItem);
            }else if(this.createModal){
                this.createProduct();
            }
        },
        closeModal(){
            $('#cadastrarProdutoModal').modal('hide');
            this.createModal = false;
            this.editModal = false;
            this.cleanModal();
        },
        openCreateModal(){
            this.createModal = true;
            $('#cadastrarProdutoModal').modal('show');
        },
        openEditModal(item){
            this.editModal = true;
            this.editItem = item;
            $('#cadastrarProdutoModal').modal('show');
        }
    }
}
</script>
