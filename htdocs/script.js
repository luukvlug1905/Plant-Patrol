//var for button and inputvalue for city
var button = document.querySelector('.button');
var inputValue = document.querySelector('.inputValue');
//var for forecast timestamp 1
var name = document.querySelector('.name');
var temp1 = document.querySelector('.temp1');
var weather1 = document.querySelector('.weather1');
var time1 = document.querySelector('.time1');
//var for forecast timestamp 2
var temp2 = document.querySelector('.temp2');
var weather2 = document.querySelector('.weather2');
var time2 = document.querySelector('.time2');
//var for forecast timestamp 3
var temp3 = document.querySelector('.temp3');
var weather3 = document.querySelector('.weather3');
var time3 = document.querySelector('.time3');


button.addEventListener('click',function(){
  fetch('https://api.openweathermap.org/data/2.5/forecast?q='+inputValue.value+'&units=metric'+'&appid=6a9d52c0a6bedb96dca3bcb7f3f3b6de')
  .then(response => response.json())
  .then(data => {
    //var for name of the city
    var nameValue = data['city']['name']
    //var to assign json information for timestamp 1
    var tempValue1 = data['list']['0']['main']['temp']
    var weatherValue1 = data['list']['0']['weather']['0']['description']
    var timeValue1 = data['list']['0']['dt_txt']
    //var to assign json information of timestamp 2
    var tempValue2 = data['list']['1']['main']['temp']
    var weatherValue2 = data['list']['1']['weather']['0']['description']
    var timeValue2 = data['list']['1']['dt_txt']
    //var to assign json information of timestamp 3
    var tempValue3 = data['list']['2']['main']['temp']
    var weatherValue3 = data['list']['2']['weather']['0']['description']
    var timeValue3 = data['list']['2']['dt_txt']

  //innerHTML to display -above assigned- data on the webpage
  name.innerHTML = nameValue
  //timestamp 1
  temp1.innerHTML = tempValue1
  weather1.innerHTML = weatherValue1
  time1.innerHTML = timeValue1
  //timestamp 2
  temp2.innerHTML = tempValue2
  weather2.innerHTML = weatherValue2
  time2.innerHTML = timeValue2
  //timestamp 3
  temp3.innerHTML = tempValue3
  weather3.innerHTML = weatherValue3
  time3.innerHTML = timeValue3
  })

})