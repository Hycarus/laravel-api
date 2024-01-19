import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**", "../fonts/**"]);
import Chart from 'chart.js/auto';
import axios from 'axios';

const buttons = document.querySelectorAll(".cancel-button");
buttons.forEach((button) => {
    button.addEventListener("click", (event) => {
        event.preventDefault();
        const dataTitle = button.getAttribute("data-item-title");
        const modal = document.getElementById("deleteModal");

        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();
        const title = document.getElementById("modal-item-title");
        title.textContent = dataTitle;
        const buttonDelete = modal.querySelector("button.btn-danger");
        buttonDelete.addEventListener("click", (event) => {
            button.parentElement.submit();
        });
    });
});
const previewImage = document.getElementById("image");
previewImage.addEventListener("change", (event) => {
    let oFReader = new FileReader();
    oFReader.readAsDataURL(previewImage.files[0]);
    oFReader.onload = function (oFREvent) {
        document.getElementById("image-preview").src = oFREvent.target.result;
    }
})

const {createApp} = Vue
createApp({
    // contiene tutti i dati / le variabili
    data() {
        return {
            projects: [],
        }
    },
    // contiene le funzioni e i metodi
    methods: {
        getProjects() {
            console.log('ciuccia');
            axios.get('http://127.0.0.1:8000/api/projects').then((response) => {
                this.projects = response.data;
                console.log(this.projects);
            }).catch((err) => {

            });
        }
    },
    created() {

    }
}).mount('#app')
// (async function() {
//     const data = [
//       { year: 2010, count: 10 },
//       { year: 2011, count: 20 },
//       { year: 2012, count: 15 },
//       { year: 2013, count: 25 },
//       { year: 2014, count: 22 },
//       { year: 2015, count: 30 },
//       { year: 2016, count: 28 },
//     ];

//     new Chart
//         (
//             document.getElementById('acquisitions'),
//             {
//               type: 'bar',
//               options: {
//                 animation: false,
//                 plugins: {
//                   legend: {
//                     display: false
//                   },
//                   tooltip: {
//                     enabled: false
//                   }
//                 }
//               },
//               data: {
//                 labels: data.map(row => row.year),
//                 datasets: [
//                   {
//                     label: 'Acquisitions by year',
//                     data: data.map(row => row.count)
//                   }
//                 ]
//               }
//             }
//           );
//   })();
