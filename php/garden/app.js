

const buttonGrowOneStraberry = document.querySelector('#growS');
const buttonGrowManyStraberry = document.querySelector('#growMS');
const buttonGrowOneBlueberry = document.querySelector('#growB');
const buttonGrowManyBlueberry = document.querySelector('#growMB');
const errorMsg = document.querySelector('#error');
const list = document.querySelector('#list');

buttonGrowOneStraberry.addEventListener('click', () => {
    axios.post(apiUrl, {
            btnName: 'buttonGrowOneStraberry'
        })
        .then(function(response) {
            // console.log(response);
            list.innerHTML = response.data.list;
        })
        .catch(function(error) {
            // console.log(error);
        });
});
buttonGrowManyStraberry.addEventListener('click', () => {
    const numberStr = document.querySelector('[name=howMany]').value;
    axios.post(apiUrl, {
            btnName: 'buttonGrowManyStraberry',
            amount: numberStr
        })
        .then(function(response) {
        //     console.log(response.data);
            list.innerHTML = response.data.list;
            errorMsg.innerHTML = '';
        })
        .catch(function(error) {
            // console.log(error.response.data.msg);
            errorMsg.innerHTML = error.response.data.msg;
        });
});
buttonGrowOneBlueberry.addEventListener('click', () => {
    axios.post(apiUrl, {
            btnName: 'buttonGrowOneBlueberry'
        })
        .then(function(response) {
            // console.log(response);
            list.innerHTML = response.data.list;
        })
        .catch(function(error) {
            // console.log(error);
        });
});
buttonGrowManyBlueberry.addEventListener('click', () => {
    const numberBlb = document.querySelector('[name=howMany]').value;
    axios.post(apiUrl, {
            btnName: 'buttonGrowManyBlueberry',
            amount: numberBlb
        })
        .then(function(response) {
            // console.log(response);
            list.innerHTML = response.data.list;
            errorMsg.innerHTML = '';
        })
        .catch(function(error) {
            // console.log(error);
            errorMsg.innerHTML = error.response.data.msg;
        });
});
// deleteBerry.forEach(element => {
//     element.addEventListener('click', () => {
//         const remove = deleteBerry.value;
//         axios.post(apiUrl, {
//                 btnName: 'delete',
//                 del: remove
//             })
//             .then(function(response) {
//                 console.log(response.data);
          
//             })
//             .catch(function(error) {
//                 console.log(error);
//             });
// });
// deleteBerry.addEventListener('click', () => {
//     const remove = deleteBerry.value;
//     axios.post(apiUrl, {
//             btnName: 'delete',
//             del: remove
//         })
//         .then(function(response) {
//             console.log(response);
//             window.location.reload();
//         })
//         .catch(function(error) {
//             console.log(error);
//         });
// });