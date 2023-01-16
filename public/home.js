//https://restcountries.com/v2/all
let countries;
let verifyBi='';
fetch("https://restcountries.com/v2/all")
.then(function (res) {
    return res.json()
})
.then(function (data) {
    //console.log(data)
    countryData(data)
})
.catch(function (err) {
    console.log('Error: '+err)
})

function countryData(data) {
    countries = data;
    let options ="";
    for (let i = 0; i < countries.length; i++) {
        options = options+'<option value="'+countries[i].alpha2Code+'">'+countries[i].name+'</option>';   
    }
    document.getElementById('nationality').innerHTML = options;
}