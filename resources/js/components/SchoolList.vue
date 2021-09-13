<template>
    <div>
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Country</td>
                <td>Name</td>
                <td>Alpha Code</td>
                <td>Web Pages</td>
                <td>Domains</td>
            </tr>
            </thead>
            <tr :class="school.domains.length > 1 ?' multi-domain':''" v-for="school in schools">
                <td>{{school.country}}</td>
                <td>{{school.name}}</td>
                <td>{{school.alpha_two_code}}</td>
                <td>{{school.web_pages}}</td>
                <td >{{school.domains}}</td>
            </tr>
        </table>
    </div>
</template>
<script>
const default_layout = "default";


export default {

    mounted() {
        axios.get('http://universities.hipolabs.com/search')
        .then(function(response){
            response.data.forEach(function(el){

                /*
                    This is not a good way to store data, but for the sake of time and to prevent
                    manually adding data i decided to use Ajax it into the DB.
                 */
                if(el.country == "United States" || el.country == "Canada"){
                   axios.post("/schools/store",{
                       country: el.country,
                       name: el.name,
                       alpha_two_code: el.alpha_two_code,
                       web_pages: el.web_pages,
                       domains: el.domains
                   })
                }
            })
        }).catch(function(error){
            console.log(error);
        });

        this.fetchData();
    },
    methods: {
        async fetchData () {
            try {
                const response = await axios.get(
                    "schools/list"
                );
                this.schools = response.data;
            } catch (error) {
                console.log(error);
            }
        }
    },
    data() {
        return {
            schools: [],
        }
    }
};
</script>

<style>
    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 1rem;
        background-color: transparent;
        border-collapse: collapse;
    }

    .table th {
        font-weight: bold;
        text-transform: uppercase;
     }

    .table td {
        padding: .75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
        width:  calc(100% / 5);
    }

    .multi-domain {
        background-color: #6b7280;
        color: #fff;
    }
</style>
