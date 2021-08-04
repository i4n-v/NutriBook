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
    confirm: false,
    meals: [],
    plan: {},
    async savePlanAndAddMeal() {
        this.savePlan()
        this.addMeal()
    },
    async savePlan(planId) {
        const form = this.$refs.planForm;
        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());
        data['id'] = this.plan.id ?? planId ?? null;

        let route = form.action
        let response = await axios.post(route, data);
        this.plan = response.data;
    },
    addMeal() {
        this.meals.push({
            id: null,
            desc: '',
            carbo: '',
            carboWeight: '',
            protein: '',
            proteinWeight: '',
            fat: '',
            fatWeight: ''
        });
    },
    async removeMeal(i) {
        if (this.meals.length > 1) {
            let meal = this.meals[i];
            let response = axios.post(`/home/eatingplan/meal/delete/${meal.id}`);
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

        window.location = `/eatingplan/created/${this.plan.id}`
    },
    async loadMeals(planId){
        let response = await axios.get(`/loadMeals/${planId}`);
        let array = response.data;
        this.plan.id = planId;

        array.forEach( meal => {
            meal.deleteModal = false;
            this.meals.push(meal);
        });
    },
    async saveMealsCreated(planId) {
        await this.savePlan(planId);
        for (let meal of this.meals) {

            meal['_token'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            if(meal.id != null){
                let response = await axios.post(`/home/eatingplan/update/meal/${meal.id}`, meal, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });
            }else{
                let response = await axios.post(`/home/eatingplan/create/meal/${this.plan.id}`, meal, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });
            }
        }
        window.location = `/eatingplan/saved/${this.plan.id}`
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
        window.location = `/home/eatingplan/remove/${planId}`
    },
    redirectToEdit(planId){
        window.location = `/home/eatingplan/forms/edit/${planId}`
    },
    redirectToView(planId){
        window.location = `/home/eatingplan/view/${planId}`
    }
}

window.phoneFormatter = {
    phone: !!document.querySelector('#phone') ? document.querySelector('#phone').value : '',
    watch() {
        this.$watch('phone', () => {
            let data = this.phone;
            data = data.replace(/[^0-9]/g, '')
            let ddd = data.slice(0, 2)
            let part1 = data.slice(2, 7)
            let part2 = data.slice(7)
            let formatted = ''
            if (data.length > 2) {
                formatted = `(${ddd}) `
            } else {
                formatted = ddd
            }
            formatted += part1
            if (data.length > 7) {
                formatted += '-'
            }
            formatted += part2
            this.phone = formatted
        })
    }
}

window.cpfFormatter = {
    cpf: '',
    watch() {
        this.$watch('cpf', () => {
            let data = this.cpf;
            data = data.replace(/[^0-9]/g, '')
            let part1 = data.slice(0, 3);
            let part2 = data.slice(3, 6);
            let part3 = data.slice(6, 9);
            let part4 = data.slice(9);
            let formatted = '';

            formatted += part1;
            formatted += data.length > 3 ? '.' : '';
            formatted += part2;
            formatted += data.length > 6 ? '.' : '';
            formatted += part3;
            formatted += data.length > 9 ? '-' : '';
            formatted += part4
            this.cpf = formatted;
        })
    }
}

window.users = {
    users: [],
    searchUsers: [],
    showUsers: false,
    async loadUsers() {
        let response = await axios.get('/users')
        this.users = response.data
    }
}
