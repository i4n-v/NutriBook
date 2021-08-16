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
    remove: [],
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
    addMealToRemove(i){
        if (this.meals.length > 1) {
            this.remove.push(this.meals[i]);
            this.meals.splice(i, 1);
        }
    },
    async removeMeals(){
        for(let meal of this.remove){
            let response = axios.post(`/home/eatingplan/meal/delete/${meal.id}`);
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
        await this.removeMeals();
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
    filter: true,
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
            for (let patient of this.patients) {
                let first = patient.CPF.split(".")
                let last = first[2].split("-")
                let cpfFinal = first[0] + first [1] + last[0] + last[1]
                patient.cpfNoSpecialChar = cpfFinal
            }
            this.patients.map(p => p.show = p.cpfNoSpecialChar.includes(this.filterCPFPatient))
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
    filter: true,
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
        this.$watch('filterTitleEatingPlan', () => {
            this.eatingPlans.map(ep => ep.show = ep.title.toLowerCase().includes(this.filterTitleEatingPlan.toLowerCase()))
        })
        this.$watch('filterDateStartEatingPlan', () => {
            let date = new Date(this.filterDateStartEatingPlan)
            this.eatingPlans.map(ep => ep.show = ep.date_start >= date)
        })
        this.$watch('filterDateFinishEatingPlan', () => {
            let date = new Date(this.filterDateFinishEatingPlan)
            this.eatingPlans.map(ep => ep.show = ep.date_finish <= date)
        })
    },
    orderBy(col) {
        if (col == 'title') {
            this.eatingPlans = this.eatingPlans.sort((ep1, ep2) => ep1[col].localeCompare(ep2[col]))
        } else {
            this.eatingPlans = this.eatingPlans.sort((ep1, ep2) => ep1[col] - ep2[col])
        }
    },
    reverseOrderBy(col) {
        if (col == 'title') {
            this.eatingPlans = this.eatingPlans.sort((ep1, ep2) => ep2[col].localeCompare(ep1[col]))
        } else {
            this.eatingPlans = this.eatingPlans.sort((ep1, ep2) => ep2[col] - ep1[col])
        }
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
    findUser: [],
    async loadUsers() {
        let response = await axios.get('/users')
        this.users = response.data
        for (let user of this.users) {
            user.show = false
        }
        this.$watch('findUser', () => {
            let searchInput = document.getElementById('searchInput').value
            if (searchInput.length > 0) {
                this.users.map(u => u.show = u.name.toLowerCase().includes(this.findUser.toLowerCase()))
            } else {
                for (let user of this.users) {
                    user.show = false
                }
            }
        })
    },
}

window.foods = {
    open: true,
    foods: [],
    modal: false,
    confirm: false,
    filterFood: [],
    filterWMax: [],
    filterWMin: [],
    filter: true,
    async loadFoods() {
        let response = await axios.get('/all-foods')
        this.foods = response.data
        for (let food of this.foods) {
            food.show = true
        }
        this.$watch('filterFood', () => {
            this.foods.map(f => f.show = f.food.toLowerCase().includes(this.filterFood.toLowerCase()))
        }),
        this.$watch('filterWMin', () => {
            if (this.filterWMin.length == 0 && this.filterWMax.length == 0) {
                for (let food of this.foods) {
                    food.show = true
                }
            } else if (this.filterWMin.length == 0) {
                this.foods.map(f => f.show = f.weight <= this.filterWMax)
            } else if (this.filterWMax.length == 0) {
                this.foods.map(f => f.show = f.weight >= this.filterWMin)
            } else {
                this.foods.map(f => f.show = f.weight >= this.filterWMin && f.weight <= this.filterWMax)
            }
        }),
        this.$watch('filterWMax', () => {
            if (this.filterWMin.length == 0 && this.filterWMax.length == 0) {
                for (let food of this.foods) {
                    food.show = true
                }
            } else if (this.filterWMax.length == 0) {
                this.foods.map(f => f.show = f.weight >= this.filterWMin)
            } else if (this.filterWMin.length == 0) {
                this.foods.map(f => f.show = f.weight <= this.filterWMax)
            } else {
                this.foods.map(f => f.show = f.weight >= this.filterWMin && f.weight <= this.filterWMax)
            }
        })
    },
    orderBy(col) {
        if (col == 'food') {
            this.foods = this.foods.sort((f1, f2) => f1[col].localeCompare(f2[col]))
        } else {
            this.foods = this.foods.sort((f1, f2) => f1[col] - f2[col])
        }
    },
    reverseOrderBy(col) {
        if (col == 'food') {
            this.foods = this.foods.sort((f1, f2) => f2[col].localeCompare(f1[col]))
        } else {
            this.foods = this.foods.sort((f1, f2) => f2[col] - f1[col])
        }
    }
}

window.evaluations = {
    evaluations: [],
    confirm: false,
    filter: true,
    async loadEvaluations(patientId) {
        let response = await axios.get('/evaluations/' + patientId)
        this.evaluations = response.data
        for (let ev of this.evaluations) {
            ev.show = true
            ev.created_at = new Date(ev.created_at)
            ev.updated_at = new Date(ev.updated_at)
        }
    },
    orderBy(col) {
        this.evaluations = this.evaluations.sort((ev1, ev2) => ev1[col] - ev2[col])
    },
    reverseOrderBy(col) {
        this.evaluations = this.evaluations.sort((ev1, ev2) => ev2[col] - ev1[col])
    }
}