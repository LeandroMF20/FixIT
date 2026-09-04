<template>
    <div class="page">
        <div class="base-content">
            <div id="fake-navbar">
                <h2>Equipamentos</h2>
            </div>
            <div v-if="alerta" :class="alerta.tipo">{{ alerta.msg }}</div>
            <form id="component-form" @submit.prevent="adicionar">
                <div class="default-input">
                    <label for="equipamento">Equipamento</label>
                    <input v-model="componentForm.equipamento" placeholder="Equipamento">
                </div>
                <div class="default-input">
                    <label for="fabricante">Fabricante</label>
                    <input v-model="componentForm.fabricante" placeholder="Fabricante">
                </div>
                <div class="default-input">
                    <label for="descricao">Descrição</label>
                    <input v-model="componentForm.descricao" placeholder="Descrição">
                </div>
                <button :disabled="carregando">Adicionar</button>
            </form>
            <div id="components-list">
                <table id="equipament-table" class="default-table">
                    <thead>
                        <tr>
                            <th>Equipamento</th>
                            <th>Fabricante</th>
                            <th>Descrição</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="e in equipamentos" :key="e.id" :testId="e.id">
                            <th>{{ e.equipamento }}</th>
                            <td>{{ e.fabricante }}</td>
                            <td>{{ e.descricao }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { ref, onMounted } from 'vue'

    const componentForm = ref({})
    const carregando = ref(false)
    const equipamentos = ref([])
    const alerta = ref(null)

    async function updateTable() {
        const list = await fetch('/equipamentos/get/list')
        equipamentos.value = await list.json()
    }

    //FIXME: Falta disparo de erros visual
    async function adicionar() {
        carregando.value = true
        const res = await fetch('/equipamentos/add', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(componentForm.value)
        })
        const data = await res.json()
        componentForm.value = {} // Não sei se é a melhor forma de fazer isso

        //FIXME: Falta Implementar timer para fechar o alerta
        if (res.ok) {
            alerta.value = { tipo: 'success', msg: data.message }
            await updateTable()
        } else {
            alerta.value = { tipo: data.status, msg: data.message }
            console.log(data.errors)
        }
        carregando.value = false
    }

    onMounted(updateTable)
</script>

<style scoped>
    body {
        margin: 0;
        padding: 0;
    }
    
    .page {
        justify-content: center;
        align-items: center;
    }

    .base-content {
        max-width: 1024px;
        margin: auto;
    }

    #fake-navbar {
        padding: 1px 15px;
        background-color: #51b38c;
        margin-bottom: 30px;
    }

    #component-form {
        padding: 5px;
        margin-bottom: 10px;
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    #components-list {
        padding-inline: 10px;
    }

    .default-input {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .default-table {
        border-collapse: collapse;
        font-family: sans-serif;
        font-size: 0.8rem;
        letter-spacing: 1px;
        width: 100%;
    }

    .default-table th, td 
    {
        border: 1px solid rgb(160 160 160);
        padding: 8px 10px;
    }

    .error {
        background-color: #ECC8C5;
        border: solid 1px #c92a42;
        border-radius: 5px;
        color: #c92a42;
        padding: 10px;
        margin-block: 10px;
    }

    .success {
        background-color: #DEF2D5;
        border: solid 1px #54a031;
        border-radius: 5px;
        color: #54a031;
        padding: 10px;
        margin-block: 10px;
    }

    .warning {
        background-color: #F9F4D6;
        border: solid 1px #ffe75d;
        border-radius: 5px;
        color: #714A16;
        padding: 10px;
        margin-block: 10px;
    }
</style>