const listOfBerries = document.querySelector('#listOfBerries');
const buttonBerries = document.querySelector('#growBerries');

document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrl + '/list', {
            list: 1,
        })
        .then(function(response) {
            // console.log(response.data);
            listOfBerries.innerHTML = response.data.list;
        })
        .catch(function(error) {
            // console.log(error);
        });
    })
buttonBerries.addEventListener('click', () => {
    axios.post(apiUrl + '/growBerries', {
            btnGrow: 'growBerries'
        })
        .then(function(response) {
            console.log(response.berry);
            listOfBerries.innerHTML = response.data.berry;
            // listOfBerries.innerHTML = response.data.berry;
        })
        .catch(function(error) {
            console.log(error);
        });
});