const buttonGrowOneStraberry = document.querySelector('#growS');
const buttonGrowManyStraberry = document.querySelector('#growMS');
const buttonGrowOneBlueberry = document.querySelector('#growB');
const buttonGrowManyBlueberry = document.querySelector('#growMB');
const errorMsg = document.querySelector('#error');
const list = document.querySelector('#list');

const addNewList = () => {
    const BERRIES = document.querySelectorAll('.strawberry');
    BERRIES.forEach(BERRY => {
        BERRY.querySelector('[type=button]').addEventListener('click', () => {
            const idDel = BERRY.querySelector('.btn-s').value;
            axios.post(apiUrl+'/delete', {
                    id: idDel,
                    delete: 1
                })
                .then(function(response) {
                    console.log(response.data);
                    list.innerHTML = response.data.list;
                    addNewList();
                })
                .catch(function(error) {
                    console.log(error.response.data);
                    errorMsg.innerHTML = error.response.data;
                });
        });
    });
}

document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrl+'/list', {})
        .then(function(response) {
            // console.log(response.data);
            list.innerHTML = response.data.list;
            errorMsg.innerHTML = '';
            // augurku klases nodai, is naujo pasetint trynimo mygtuko eventus
            addNewList();
        })
        .catch(function(error) {
            // console.log(error.response.data.msg);
            // errorMsg.innerHTML = error.response.data.msg;
        });
    })

buttonGrowOneStraberry.addEventListener('click', () => {
    axios.post(apiUrl+'/plant_one_strawberry', {
            btnName: 'buttonGrowOneStraberry'
        })
        .then(function(response) {
            // console.log(response);
            list.innerHTML = response.data.list;
            addNewList();
        })
        .catch(function(error) {
            // console.log(error);
        });
});
buttonGrowManyStraberry.addEventListener('click', () => {
    const numberStr = document.querySelector('[name=howMany]').value;
    axios.post(apiUrl+'/plant_many_strawberries', {
            btnName: 'buttonGrowManyStraberry',
            amount: numberStr
        })
        .then(function(response) {
        //     console.log(response.data);
            list.innerHTML = response.data.list;
            errorMsg.innerHTML = '';
            addNewList();
        })
        .catch(function(error) {
            // console.log(error.response.data.msg);
            errorMsg.innerHTML = error.response.data.msg;
        });
});
buttonGrowOneBlueberry.addEventListener('click', () => {
    axios.post(apiUrl + '/plant_one_blueberry', {
            btnName: 'buttonGrowOneBlueberry'
        })
        .then(function(response) {
            // console.log(response);
            list.innerHTML = response.data.list;
            addNewList();
        })
        .catch(function(error) {
            // console.log(error);
        });
});
buttonGrowManyBlueberry.addEventListener('click', () => {
    const numberBlb = document.querySelector('[name=howMany]').value;
    axios.post(apiUrl+'/plant_many_blueberries', {
            btnName: 'buttonGrowManyBlueberry',
            amount: numberBlb
        })
        .then(function(response) {
            // console.log(response);
            list.innerHTML = response.data.list;
            errorMsg.innerHTML = '';
            addNewList();
        })
        .catch(function(error) {
            // console.log(error);
            errorMsg.innerHTML = error.response.data.msg;
        });
});

const listOfBerries = document.querySelector('#listOfBerries');

const buttonBerries = document.querySelector('#growBerries');
