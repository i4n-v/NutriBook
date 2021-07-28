const { default: axios } = require('axios');

require('./bootstrap');

require('alpinejs');

(function () {

    let message = document.getElementById('message');

    if (!!message) {
        setTimeout(() => message.remove(), 5000);
    }

})();

window.eatingPlan = {
    meals: [],
    plan: {},
    async savePlan(route) {
        const form = this.$refs.planForm;
        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());

        let response = await axios.post(route, data);
        this.plan = response.data;
        this.addMeal();
    },
    addMeal() {
        this.meals.push({
            desc: '',
            carbo: '',
            carboWeight: '',
            protein: '',
            proteinWeight: '',
            fat: '',
            fatWeight: ''
        });
    },
    removeMeal(i) {
        if (this.meals.length > 1) {
            this.meals.splice(i, 1);
        }
    },
    async saveMeals() {
        for (let meal of this.meals) {
            meal['_token'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            let response = await axios.post(`/home/eatingplan/create/meal/${this.plan.id}`, meal, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
        }

        axios.get(`/eatingplan/created/${this.plan.id}`);
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

window.eatingPlansTable = {
    eatingPlans: [],
    confirm: false,
    modal: false,
    filter: false,
    filterTitleEatingPlan: [],
    filterDateStartEatingPlan: [],
    filterDateFinishEatingPlan: [],
    async loadEatingPlans(UserIdPatient) {
        let response = await axios.get('/eating-plans/' + UserIdPatient)
        this.eatingPlans = response.data
        for (let eP of this.eatingPlans) {
            eP.show = true
        }
        this.$watch('filterTitleEatingPlan', () => {
            this.eatingPlans.map(p => p.show = p.title.toLowerCase().includes(this.filterTitleEatingPlan.toLowerCase()))
        })
        this.$watch('filterDateStartEatingPlan', () => {
            this.eatingPlans.map(p => p.show = p.formatted_date_start.includes(this.filterDateStartEatingPlan))
        })
        this.$watch('filterDateFinishEatingPlan', () => {
            this.eatingPlans.map(p => p.show = p.formatted_date_finish.includes(this.filterDateFinishEatingPlan))
        })
    },
    orderBy(col) {
        this.eatingPlans = this.eatingPlans.sort((p1, p2) => p1[col].localeCompare(p2[col]))
    },
    reverseOrderBy(col) {
        this.eatingPlans = this.eatingPlans.sort((p1, p2) => p2[col].localeCompare(p1[col]))
    },
    deletePlan(planId){
        axios.get(`/home/eatingplan/remove/${planId}`);
    }
}
