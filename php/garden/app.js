

const buttonGrowOneStraberry = document.querySelector('#growS');
const buttonGrowManyStraberry = document.querySelector('#growMS');
const buttonGrowOneBlueberry = document.querySelector('#growB');
const buttonGrowManyBlueberry = document.querySelector('#growMB');
const deleteBerry = document.querySelector('#delete');
console.log(deleteBerry);

buttonGrowOneStraberry.addEventListener('click', () => {
    axios.post(apiUrl, {
            btnName: 'buttonGrowOneStraberry'
        })
        .then(function(response) {
            console.log(response);
            window.location.reload();
        })
        .catch(function(error) {
            console.log(error);
        });
});
buttonGrowManyStraberry.addEventListener('click', () => {
    const numberStr = document.querySelector('#howMany').value;
    
    axios.post(apiUrl, {
            btnName: 'buttonGrowManyStraberry',
            amount: numberStr
        })
        .then(function(response) {
            console.log(response);
            window.location.reload();
        })
        .catch(function(error) {
            console.log(error);
        });
});
buttonGrowOneBlueberry.addEventListener('click', () => {
    axios.post(apiUrl, {
            btnName: 'buttonGrowOneBlueberry'
        })
        .then(function(response) {
            console.log(response);
            window.location.reload();
        })
        .catch(function(error) {
            console.log(error);
        });
});
buttonGrowManyBlueberry.addEventListener('click', () => {
    const numberBlb = document.querySelector('#howMany').value;
    axios.post(apiUrl, {
            btnName: 'buttonGrowManyBlueberry',
            amount: numberBlb

        })
        .then(function(response) {
            console.log(response);
            window.location.reload();
        })
        .catch(function(error) {
            console.log(error);
        });
});
deleteBerry.addEventListener('click', () => {
    const remove = deleteBerry.value;
    axios.post(apiUrl, {
            btnName: 'delete',
            del: remove
        })
        .then(function(response) {
            console.log(response);
            window.location.reload();
        })
        .catch(function(error) {
            console.log(error);
        });
});