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
    async savePlanAndAddMeal() {
        this.savePlan()
        this.addMeal()
    },
    async savePlan() {
        const form = this.$refs.planForm;
        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());
        data['id'] = this.plan.id ?? null

        let route = form.action
        let response = await axios.post(route, data);
        this.plan = response.data;
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
        await this.savePlan()
        for (let meal of this.meals) {
            meal['_token'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            let response = await axios.post(`/home/eatingplan/create/meal/${this.plan.id}`, meal, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
        }

        // axios.get(`/eatingplan/created/${this.plan.id}`);
        window.location = `/eatingplan/created/${this.plan.id}`
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
        for (let ep of this.eatingPlans) {
            ep.show = true
            ep.date_start = new Date(ep.date_start)
            ep.date_finish = new Date(ep.date_finish)
        }
        console.dir(this.eatingPlans)
        this.$watch('filterTitleEatingPlan', () => {
            this.eatingPlans.map(p => p.show = p.title.toLowerCase().includes(this.filterTitleEatingPlan.toLowerCase()))
        })
        this.$watch('filterDateStartEatingPlan', () => {
            let date = new Date(this.filterDateStartEatingPlan)
            this.eatingPlans.map(p => p.show = p.date_start >= date)
        })
        this.$watch('filterDateFinishEatingPlan', () => {
            let date = new Date(this.filterDateFinishEatingPlan)
            this.eatingPlans.map(p => p.show = p.date_finish <= date)
        })
    },
    orderBy(col) {
        this.eatingPlans = this.eatingPlans.sort((p1, p2) => p1[col].localeCompare(p2[col]))
    },
    reverseOrderBy(col) {
        this.eatingPlans = this.eatingPlans.sort((p1, p2) => p2[col].localeCompare(p1[col]))
    },
    deletePlan(planId){
        // console.log(planId)
        // axios.get(`/home/eatingplan/remove/${planId}`);
        window.location = `/home/eatingplan/remove/${planId}`
    }
}

window.phoneFormatter = {
    phone: '',
    watch() {
        this.$watch('phone', () => {
            let data = this.phone
            data = data.replace(/[^0-9]/g, '')
            let ddd = data.slice(0, 2)
            let part1 = data.slice(2, 6)
            let part2 = data.slice(6)
            let formatted = ''
            if (data.length > 2) {
                formatted = `(${ddd}) `
            } else {
                formatted = ddd
            }
            formatted += part1
            if (data.length > 6) {
                formatted += '-'
            }
            formatted += part2
            this.phone = formatted
        })
    }
}
