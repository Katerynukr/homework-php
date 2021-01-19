const removeEverything = document.querySelector('#removeEverything');
const listCollect = document.querySelector('#listCollect');
console.log(removeEverything);

const collectFromList = () => {
    const BERRIES = document.querySelectorAll('.strawberry');
    BERRIES.forEach(BERRY => {
        BERRY.querySelector('#collectAllBerries').addEventListener('click', () => {
            const collect = BERRY.querySelector('#collectAllBerries').value;
            axios.post(apiUrl + '/collect_all_berries', {
                    id: collect,
                    delete: 1
                })
                .then(function(response) {
                    console.log(response.data);
                    listCollect.innerHTML = response.data.list;
                    addNewList();
                })
                .catch(function(error) {
                    console.log(error.response.data);
                });
        });
    });
}
const collectSome = () => {
    const BERRIES = document.querySelectorAll('.strawberry');
    BERRIES.forEach(BERRY => {
        BERRY.querySelector('#collectSomeBerries').addEventListener('click', () => {
            const fromBush = BERRY.querySelector('#collectSomeBerries').value;
            const howMuchBerries = BERRY.querySelector('#berryNumbers').value;
            console.log(howMuchBerries);
            axios.post(apiUrl + '/collect_some_berries', {
                    id: fromBush,
                    delete: 2,
                    howMuch : howMuchBerries
                })
                .then(function(response) {
                    console.log(response.data);
                    listCollect.innerHTML = response.data.list;
                    addNewList();
                })
                .catch(function(error) {
                    console.log(error.response.data);
                });
        });
    });
}

document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrl + '/list', {
            list: 1,
        })
        .then(function(response) {
            // console.log(response.data);
            listCollect.innerHTML = response.data.list;
            collectFromList();
            collectSome();
        })
        .catch(function(error) {
            // console.log(error);
        });
    });
removeEverything.addEventListener('click', () => {
    axios.post(apiUrl + '/remove_everything', {
            btnCollect: 'removeEverything'
        })
        .then(function(response) {
            console.log(response.output);
            listCollect.innerHTML = response.data.output;
            collectFromList();
            collectSome();
        })
        .catch(function(error) {
            console.log(error);
        });
});