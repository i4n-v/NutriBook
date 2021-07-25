const { default: axios } = require('axios');

require('./bootstrap');

require('alpinejs');

(function(){
    
    let message = document.getElementById('message');

    if(!!message){
        setTimeout(()=>message.remove(), 5000);
    }

})();

window.eatingPlan = {
    refeicoes: [],
    async savePlan(route) {
        const form = this.$refs.planForm
        const formData = new FormData(form)
        const data = Object.fromEntries(formData.entries())

        let response = await axios.post(route, data)
        console.log(response)
        this.addRefeicao()
    },
    addRefeicao() {
        this.refeicoes.push({nome: '', carbo: '', protein: '', fat: ''})
    },
    saveRefeicoes() {
        for (let r of this.refeicoes) {
            console.log(`salvar os dados: ${r.nome} ${r.carbo}`) // axios.post
        }
    }
}

window.nutriPatients = {
    patients: [],
    filterNamePatient: [],
    filterCPFPatient: [],
    filter: false,
    async loadPatients() {
        let response = await axios.get('/nutri-patients')
        this.patients = response.data
        for (let patient of this.patients) {
            patient.show = true
        }
        this.$watch('filterNamePatient', () => {
            this.patients.map(p => p.show = p.name.toLowerCase().includes(this.filterNamePatient.toLowerCase()))
        })
        this.$watch('filterCPFPatient', () => {
            this.patients.map(p => p.show = p.CPF.includes(this.filterCPFPatient))
        })
    },
    orderBy(col) {
        this.patients = this.patients.sort((p1, p2) => p1[col].localeCompare(p2[col]))
    },
    reverseOrderBy(col) {
        this.patients = this.patients.sort((p1, p2) => p2[col].localeCompare(p1[col]))
    }
}
